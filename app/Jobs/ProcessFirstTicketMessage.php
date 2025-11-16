<?php

namespace App\Jobs;

use App\Models\Priority;
use App\Models\Status;
use App\Models\User;
use App\Models\UserAssignedTicket;
use App\Models\UserTicket;
use App\Services\GptService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessFirstTicketMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $ticketId,
        public string $messageText
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Reload ticket to ensure we have the latest data
            $ticket = UserTicket::find($this->ticketId);
            
            if (!$ticket) {
                Log::error('Ticket not found for GPT processing', [
                    'ticket_id' => $this->ticketId,
                ]);
                return;
            }

            // Call GPT service
            $gptService = new GptService();
            $analysis = $gptService->analyzeRequest($this->messageText);

            // Get IT user with least assignments
            $itUser = $this->getItUserWithLeastAssignments();

            // Get IN_PROGRESS status (type should be 'item' based on migration)
            $inProgressStatus = Status::where('id', Status::IN_PROGRESS)->first();
            if (!$inProgressStatus) {
                // Fallback: try to find any status with type 'item'
                $inProgressStatus = Status::where('type', 'item')->first();
            }

            // Update ticket with AI recommendation, priority, and status
            $updateData = [
                'ai_recommendation' => $analysis['ai_recommendation'],
                'priority_id' => $analysis['priority_id'],
            ];

            if ($inProgressStatus) {
                $updateData['status_id'] = $inProgressStatus->id;
            }

            $ticket->update($updateData);

            // Assign ticket to IT user
            if ($itUser) {
                UserAssignedTicket::create([
                    'user_id' => $itUser->id,
                    'user_ticket_id' => $ticket->id,
                ]);
            }

            Log::info('Successfully processed first ticket message with GPT', [
                'ticket_id' => $ticket->id,
                'priority_id' => $analysis['priority_id'],
                'assigned_to' => $itUser?->id,
            ]);

        } catch (\Exception $e) {
            Log::error('Error processing first message with GPT in job', [
                'ticket_id' => $this->ticketId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            // Re-throw to mark job as failed
            throw $e;
        }
    }

    /**
     * Get IT user with least assignments
     */
    protected function getItUserWithLeastAssignments(): ?User
    {
        try {
            // Get all users with 'it' role
            $itUsers = User::role('it')->get();

            if ($itUsers->isEmpty()) {
                Log::warning('No IT users found for ticket assignment');
                return null;
            }

            // Get assignment counts for each IT user
            $assignmentCounts = UserAssignedTicket::select('user_id', DB::raw('count(*) as count'))
                ->whereIn('user_id', $itUsers->pluck('id'))
                ->groupBy('user_id')
                ->pluck('count', 'user_id')
                ->toArray();

            // Find user with least assignments
            $minCount = PHP_INT_MAX;
            $selectedUser = null;

            foreach ($itUsers as $user) {
                $count = $assignmentCounts[$user->id] ?? 0;
                if ($count < $minCount) {
                    $minCount = $count;
                    $selectedUser = $user;
                }
            }

            return $selectedUser ?? $itUsers->first();

        } catch (\Exception $e) {
            Log::error('Error finding IT user with least assignments', [
                'error' => $e->getMessage(),
            ]);
            // Fallback to first IT user
            return User::role('it')->first();
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('ProcessFirstTicketMessage job failed', [
            'ticket_id' => $this->ticketId,
            'error' => $exception->getMessage(),
        ]);
    }
}


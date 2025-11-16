<?php

namespace App\Livewire;

use App\Jobs\ProcessFirstTicketMessage;
use App\Models\Status;
use App\Models\UserTicket;
use App\Models\UserTicketMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.main')]
#[Title('Help')]
class Help extends Component
{
    public $selectedTicketId = null;
    public $ticket;
    public $messages;
    public $newMessage = '';
    public $tickets;

    public function mount($ticket = null)
    {
        $this->loadTickets();
        
        // Check if ticket ID is in URL
        $ticketId = request()->query('ticket', $ticket);
        
        if ($ticketId) {
            $ticketModel = UserTicket::where('id', $ticketId)
                ->where('user_id', Auth::id())
                ->first();
            
            if ($ticketModel) {
                $this->ticket = $ticketModel;
                $this->selectedTicketId = $ticketModel->id;
                $this->loadMessages();
            } else {
                // Invalid ticket ID, load most recent
                $this->ticket = $this->tickets->first();
                if ($this->ticket) {
                    $this->selectedTicketId = $this->ticket->id;
                    $this->loadMessages();
                } else {
                    $this->messages = collect();
                }
            }
        } else {
            // No ticket in URL, select the most recent ticket
            $this->ticket = $this->tickets->first();
            if ($this->ticket) {
                $this->selectedTicketId = $this->ticket->id;
                $this->loadMessages();
            } else {
                $this->messages = collect();
            }
        }
    }

    public function loadTickets()
    {
        $this->tickets = UserTicket::where('user_id', Auth::id())
            ->with('messages')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function selectTicket($ticketId)
    {
        $this->selectedTicketId = $ticketId;
        $this->ticket = UserTicket::where('id', $ticketId)
            ->where('user_id', Auth::id())
            ->first();
        $this->loadMessages();
        
        // Update URL
        $this->dispatch('update-url', ['ticket' => $ticketId]);
    }

    public function loadMessages()
    {
        if ($this->ticket) {
            $this->messages = $this->ticket->messages()
                ->with('user')
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $this->messages = collect();
        }
    }

    public function newChat()
    {
        $this->selectedTicketId = null;
        $this->ticket = null;
        $this->messages = collect();
        $this->newMessage = '';
        
        // Update URL to remove ticket parameter
        $this->dispatch('update-url', ['ticket' => null]);
    }

    public function sendMessage()
    {
        if (empty(trim($this->newMessage))) {
            return;
        }

        $isFirstMessage = false;

        if (!$this->ticket) {
            // Create new ticket with pending status
            $pendingStatus = Status::where('type', 'request')->first();
            $this->ticket = UserTicket::create([
                'user_id' => Auth::id(),
                'status_id' => $pendingStatus ? $pendingStatus->id : Status::PENDING,
                'label' => substr($this->newMessage, 0, 50) . (strlen($this->newMessage) > 50 ? '...' : ''),
            ]);
            $this->selectedTicketId = $this->ticket->id;
            $isFirstMessage = true;
            
            // Update URL with new ticket ID
            $this->dispatch('update-url', ['ticket' => $this->ticket->id]);
        } else {
            // Check if this is the first message in the ticket
            $isFirstMessage = $this->ticket->messages()->count() === 0;
        }

        $messageText = trim($this->newMessage);
        $message = UserTicketMessage::create([
            'user_ticket_id' => $this->ticket->id,
            'user_id' => Auth::id(),
            'message' => $messageText,
        ]);

        // Update ticket label if it's the first message or if label is generic
        if (!$this->ticket->label || $this->ticket->label === 'IT Help Request') {
            $this->ticket->update([
                'label' => substr($messageText, 0, 50) . (strlen($messageText) > 50 ? '...' : ''),
            ]);
        }

        // Process first message with GPT asynchronously
        if ($isFirstMessage) {
            ProcessFirstTicketMessage::dispatch($this->ticket->id, $messageText);
        }

        $this->loadMessages();
        $this->loadTickets();
        $this->newMessage = '';
        
        // Dispatch event to scroll to bottom
        $this->dispatch('message-sent');
    }


    public function render()
    {
        return view('livewire.help');
    }
}

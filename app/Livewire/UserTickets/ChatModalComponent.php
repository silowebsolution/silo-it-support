<?php

namespace App\Livewire\UserTickets;

use Livewire\Component;
use App\Models\UserTicket;
use App\Models\UserTicketMessage;
use Illuminate\Support\Facades\Auth;
use Exception;

class ChatModalComponent extends Component
{
    public UserTicket $record;
    public ?string $message = '';

    public function mount(UserTicket $record): void
    {
        $this->record = $record;
    }

    public function sendMessage(): void
    {
        if (!trim($this->message)) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Message cannot be empty.']);
            return;
        }

        try {
            UserTicketMessage::create([
                'user_ticket_id' => $this->record->id,
                'user_id'        => Auth::id(),
                'message'        => $this->message,
            ]);

            $this->message = '';

            // Refresh the record to get the latest messages
            $this->record->refresh();

            // Dispatch a browser event to scroll to the bottom
            $this->dispatch('scroll-to-bottom');
            $this->dispatch('notify', ['type' => 'success', 'message' => 'Message sent successfully!']);

        } catch (Exception $e) {
            $this->dispatch('notify', ['type' => 'error', 'message' => 'Failed to send message: ' . $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.user-tickets.chat-modal-component');
    }
}

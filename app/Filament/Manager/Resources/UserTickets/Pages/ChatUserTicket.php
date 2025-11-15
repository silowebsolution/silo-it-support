<?php

namespace App\Filament\Manager\Resources\UserTickets\Pages;

use App\Filament\Manager\Resources\UserTickets\UserTicketResource;
use App\Models\UserTicket;
use App\Models\UserTicketMessage;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class ChatUserTicket extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = UserTicketResource::class;

    protected static ?string $label = 'Messages';

    protected static ?string $title = 'Messages';

    public function getTitle(): string
    {
        return __(self::$title);
    }

    public function getLabel(): string
    {
        return __(self::$title);
    }

    protected string $view = 'filament.manager.resources.user-tickets.pages.chat-user-ticket';

    public UserTicket $record;

    public ?string $message = '';

    public function mount(UserTicket $record): void
    {
        $this->record = $record;
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function sendMessage(): void
    {
        if (!trim($this->message)) {
            return;
        }

        UserTicketMessage::create([
            'user_ticket_id' => $this->record->id,
            'user_id'        => Auth::id(),
            'message'        => $this->message,
        ]);

        $this->message = '';

        // Refresh page so messages update
        $this->dispatch('$refresh');
    }
}

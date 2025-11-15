<?php

namespace App\Filament\Manager\Resources\UserTickets\Pages;

use App\Filament\Manager\Resources\UserTickets\UserTicketResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;
use App\Livewire\UserTickets\ChatModalComponent; // Import the new ChatModalComponent Livewire component

class EditUserTicket extends EditRecord
{
    protected static string $resource = UserTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            Action::make('chat')
                ->label('Chat')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->modalHeading(fn ($record) => 'Chat for Ticket #' . $record->id)
                ->modalContent(fn ($record) => view('livewire.user-tickets.chat-modal-wrapper', ['record' => $record]))
                ->modalSubmitAction(false)
                ->modalCancelAction(false)
                ->slideOver(),
        ];
    }
}

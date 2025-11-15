<?php

namespace App\Filament\Manager\Resources\UserTickets\Pages;

use App\Filament\Manager\Resources\UserTickets\UserTicketResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserTicket extends EditRecord
{
    protected static string $resource = UserTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

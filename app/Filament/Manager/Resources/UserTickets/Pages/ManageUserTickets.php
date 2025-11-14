<?php

namespace App\Filament\Manager\Resources\UserTickets\Pages;

use App\Filament\Manager\Resources\UserTickets\UserTicketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageUserTickets extends ManageRecords
{
    protected static string $resource = UserTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return UserTicketResource::getHeaderWidgets();
    }
}

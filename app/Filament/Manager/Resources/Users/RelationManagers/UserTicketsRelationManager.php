<?php

namespace App\Filament\Manager\Resources\Users\RelationManagers;

use App\Filament\Manager\Resources\UserTickets\UserTicketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class UserTicketsRelationManager extends RelationManager
{
    protected static string $relationship = 'UserTicket';

    protected static ?string $relatedResource = UserTicketResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}

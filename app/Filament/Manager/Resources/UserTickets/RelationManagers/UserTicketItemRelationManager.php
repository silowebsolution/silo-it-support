<?php

namespace App\Filament\Manager\Resources\UserTickets\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Manager\Resources\Items\ItemResource;

class UserTicketItemRelationManager extends RelationManager
{
    protected static string $relationship = 'userTicketItem';

    protected static ?string $title = 'Ticket Related Items';

    protected static ?string $label = 'Ticket Related Items';

    public static function getModelLabel(): string
    {
        return __('Ticket Related Item');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Ticket Related Items');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('item_id')
                    ->label(__('Item'))
                    ->relationship(
                        name: 'item',
                        titleAttribute: 'name',
                        modifyQueryUsing: function (Builder $query) {
                            $userTicket = $this->getOwnerRecord();
                            if ($userTicket?->user_id) {
                                $query->where('user_id', (int) $userTicket->user_id);
                            } else {
                                $query->whereRaw('false');
                            }
                        }
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('item.name')
                    ->searchable()
                    ->url(fn ($record) => ItemResource::getUrl('edit', ['record' => $record->item_id])),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

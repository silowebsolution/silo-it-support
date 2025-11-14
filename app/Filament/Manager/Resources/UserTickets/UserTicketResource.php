<?php

namespace App\Filament\Manager\Resources\UserTickets;

use App\Filament\Manager\Resources\UserTickets\Pages\ManageUserTickets;
use App\Filament\Manager\Resources\UserTickets\Widgets\UserTicketStatsOverview;
use App\Models\Status;
use App\Models\User;
use App\Models\UserTicket;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserTicketResource extends Resource
{
    protected static ?string $model = UserTicket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'label';

    public static function getNavigationGroup(): ?string
    {
        return __('IT Support');
    }

    public static function getModelLabel(): string
    {
        return __('Ticket');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Tickets');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status_id', Status::PENDING)->count();
    }

    public static function getHeaderWidgets(): array
    {
        return [
            UserTicketStatsOverview::class,
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label(__('User'))
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('status_id')
                    ->label(__('Status'))
                    ->relationship('status', 'name')
                    ->required(),
                TextInput::make('label')
                    ->label(__('Label'))
                    ->required(),
                Toggle::make('was_ai_correct')
                    ->label(__('Was AI correct?'))
                    ->onColor('success')
                    ->offColor('danger'),
                Textarea::make('ai_recommendation')
                    ->label(__('AI Recommendation'))
                    ->readOnly()
                    ->columnSpanFull(),
                Repeater::make('userAssignedTickets')
                    ->label(__('Assigned Tickets'))
                    ->relationship()
                    ->schema([
                        Select::make('user_id')
                            ->label(__('User'))
                            ->options(function (Get $get, $state) {
                                $assignedUserIds = collect($get('../../userAssignedTickets'))
                                    ->pluck('user_id')
                                    ->filter()
                                    ->all();

                                $userIdsToExclude = array_diff($assignedUserIds, [$state]);

                                return User::query()->whereNotIn('id', $userIdsToExclude)->pluck('name', 'id');
                            })
                            ->required(),
                    ])
                    ->grid(2)
                    ->columnSpanFull()
                    ->live(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('User'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status.name')
                    ->label(__('Status'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('label')
                    ->label(__('Label'))
                    ->searchable(),
                TextColumn::make('userAssignedTickets.user.name')
                    ->label(__('Assigned to'))
                    ->searchable(),
                IconColumn::make('was_ai_correct')
                    ->label(__('Was AI correct?'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->label(__('User')),
                SelectFilter::make('status')
                    ->relationship('status', 'name')
                    ->label(__('Status')),
                Filter::make('label')
                    ->form([
                        TextInput::make('label_value')->label(__('Label')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['label_value'],
                            fn (Builder $query, $label): Builder => $query->where('label', 'like', "%{$label}%")
                        );
                    }),
                SelectFilter::make('assigned_to')
                    ->relationship('userAssignedTickets.user', 'name')
                    ->label(__('Assigned to')),
                TernaryFilter::make('was_ai_correct')
                    ->label(__('Was AI correct?')),
            ], layout: FiltersLayout::AboveContentCollapsible)
            ->filtersFormColumns(4)
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageUserTickets::route('/'),
        ];
    }
}

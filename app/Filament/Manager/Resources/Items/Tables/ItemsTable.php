<?php

namespace App\Filament\Manager\Resources\Items\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ItemStatus.name')
                    ->label(__('Item Status'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('location.name')
                    ->label(__('Location'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label(__('User'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                TextColumn::make('description')
                    ->label(__('Description'))
                    ->searchable(),
                TextColumn::make('code')
                    ->label(__('Code'))
                    ->searchable(),
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
                SelectFilter::make('itemStatus')
                    ->relationship('itemStatus', 'name')
                    ->label(__('Item Status')),
                SelectFilter::make('location')
                    ->relationship('location', 'name')
                    ->label(__('Location')),
                SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->label(__('User')),
                Filter::make('name')
                    ->form([
                        TextInput::make('name_value')->label(__('Name')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['name_value'],
                            fn (Builder $query, $name): Builder => $query->where('name', 'like', "%{$name}%")
                        );
                    }),
                Filter::make('code')
                    ->form([
                        TextInput::make('code_value')->label(__('Code')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['code_value'],
                            fn (Builder $query, $code): Builder => $query->where('code', 'like', "%{$code}%")
                        );
                    }),
            ], layout: FiltersLayout::AboveContentCollapsible)
            ->filtersFormColumns(3)
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

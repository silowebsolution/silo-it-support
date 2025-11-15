<?php

namespace App\Filament\Manager\Resources\Items\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('item_status_id')
                    ->label(__('Item Status'))
                    ->relationship('itemStatus', 'name')
                    ->searchable()
                    ->required()
                    ->preload(),
                Select::make('location_id')
                    ->label(__('Location'))
                    ->relationship('location', 'name')
                    ->searchable()
                    ->required()
                    ->preload(),
                Select::make('user_id')
                    ->label(__('User'))
                    ->relationship('user', 'name')
                    ->searchable(),
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('description')
                    ->label(__('Description'))
                    ->required(),
                TextInput::make('code')
                    ->label(__('Code'))
                    ->required(),
                Textarea::make('image')
                    ->label(__('Image'))
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

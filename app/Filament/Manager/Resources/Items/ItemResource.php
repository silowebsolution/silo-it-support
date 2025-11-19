<?php

namespace App\Filament\Manager\Resources\Items;

use App\Filament\Manager\Resources\Items\Pages\CreateItem;
use App\Filament\Manager\Resources\Items\Pages\EditItem;
use App\Filament\Manager\Resources\Items\Pages\ListItems;
use App\Filament\Manager\Resources\Items\RelationManagers\UserTicketItemRelationManager;
use App\Filament\Manager\Resources\Items\Schemas\ItemForm;
use App\Filament\Manager\Resources\Items\Tables\ItemsTable;
use App\Models\Item;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArchiveBox;

    public static function getNavigationGroup(): ?string
    {
        return __('IT Support');
    }
    protected static bool $hasTitleCaseModelLabel = false;

    public static function getModelLabel(): string
    {
        return __('Inventory');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Inventories');
    }

    public static function form(Schema $schema): Schema
    {
        return ItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            UserTicketItemRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListItems::route('/'),
            //'create' => CreateItem::route('/create'),
            'edit' => EditItem::route('/{record}/edit'),
        ];
    }
}

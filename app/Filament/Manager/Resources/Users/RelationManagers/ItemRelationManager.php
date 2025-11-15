<?php

namespace App\Filament\Manager\Resources\Users\RelationManagers;

use App\Filament\Manager\Resources\Items\Schemas\ItemForm;
use App\Filament\Manager\Resources\Items\Tables\ItemsTable;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ItemRelationManager extends RelationManager
{
    protected static string $relationship = 'Item';

    protected static ?string $title = 'Items';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __(self::$title);
    }

    public static function getModelLabel(): string
    {
        return __('Item');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Items');
    }

    public function form(Schema $schema): Schema
    {
        return ItemForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return ItemsTable::configure($table)->headerActions([
            CreateAction::make(),
            AssociateAction::make(),
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

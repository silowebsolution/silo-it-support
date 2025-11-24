<?php

namespace App\Filament\Manager\Resources\MobileApps;

use App\Filament\Manager\Resources\MobileApps\Pages\ManageMobileApps;
use App\Models\MobileApp;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MobileAppResource extends Resource
{
    protected static ?string $model = MobileApp::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'App';

    public static function getNavigationGroup(): ?string
    {
        return __('IT Support');
    }

    public static function getModelLabel(): string
    {
        return __('Mobile App');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Mobile Apps');
    }


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('version'),
                TextInput::make('android'),
                TextInput::make('ios'),
                TextInput::make('apk'),
                Toggle::make('hidden')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('App')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('version')
                    ->searchable(),
                TextColumn::make('android')
                    ->searchable(),
                TextColumn::make('ios')
                    ->searchable(),
                TextColumn::make('apk')
                    ->searchable(),
                IconColumn::make('apk')
                    ->label('APK Link')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('primary')
                    ->url(function (MobileApp $record): ?string {
                        if (empty($record->apk)) {
                            return null;
                        }
                        if (str_starts_with($record->apk, 'http://') || str_starts_with($record->apk, 'https://')) {
                            return $record->apk;
                        }
                        return 'https://' . $record->apk;
                    })
                    ->openUrlInNewTab()
                    ->placeholder('-'),
                IconColumn::make('hidden')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
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
            'index' => ManageMobileApps::route('/'),
        ];
    }
}

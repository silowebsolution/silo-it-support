<?php

namespace App\Filament\Manager\Pages;

use App\Filament\Exports\ItemExporter;
use App\Filament\Exports\UserAssignedTicketExporter;
use App\Filament\Exports\UserTicketExporter;
use App\Models\Export;
use Filament\Actions\ActionGroup;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ManagerExports extends Page implements HasTable
{
    use InteractsWithTable;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-document-arrow-down';

    protected string $view = 'filament.manager.pages.manager-exports';

    public static function getNavigationGroup(): ?string
    {
        return __('Manager');
    }

    public static function getNavigationLabel(): string
    {
        return __('Exports');
    }

    public function getTitle(): string
    {
        return __('Exports');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Export::query())
            ->columns([
                TextColumn::make('file_name')->label(__('File Name'))->searchable()->sortable(),
                TextColumn::make('exporter')->label(__('Exporter'))->searchable()->sortable(),
                TextColumn::make('total_rows')->label(__('Total Rows'))->sortable(),
                TextColumn::make('created_at')->label(__('Created At'))->dateTime()->sortable(),
                TextColumn::make('completed_at')->label(__('Completed At'))->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                ExportAction::make('export_all_items')
                    ->label(__('All'))
                    ->exporter(ItemExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(fn() => \App\Models\Item::query())
                ,
                ExportAction::make('export_weekly_items')
                    ->label(__('Last Week'))
                    ->exporter(ItemExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\Item::query()->where('created_at', '>=', now()->subWeek());
                    }),
                ExportAction::make('export_monthly_items')
                    ->label(__('Last Month'))
                    ->exporter(ItemExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\Item::query()->where('created_at', '>=', now()->subMonth());
                    }),
                ExportAction::make('export_yearly_items')
                    ->label(__('Last Year'))
                    ->exporter(ItemExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\Item::query()->where('created_at', '>=', now()->subYear());
                    }),
            ])
                ->label(__('Export Items'))
                ->icon('heroicon-o-document-arrow-down')
                ->button(),
            ActionGroup::make([
                ExportAction::make('export_all_user_tickets')
                    ->label(__('All'))
                    ->exporter(UserTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(fn() => \App\Models\UserTicket::query()),
                ExportAction::make('export_weekly_user_tickets')
                    ->label(__('Last Week'))
                    ->exporter(UserTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\UserTicket::query()->where('created_at', '>=', now()->subWeek());
                    }),
                ExportAction::make('export_monthly_user_tickets')
                    ->label(__('Last Month'))
                    ->exporter(UserTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\UserTicket::query()->where('created_at', '>=', now()->subMonth());
                    }),
                ExportAction::make('export_yearly_user_tickets')
                    ->label(__('Last Year'))
                    ->exporter(UserTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\UserTicket::query()->where('created_at', '>=', now()->subYear());
                    }),
            ])
                ->label(__('Export User Tickets'))
                ->icon('heroicon-o-document-arrow-down')
                ->button(),
            ActionGroup::make([
                ExportAction::make('export_all_user_assigned_tickets')
                    ->label(__('All'))
                    ->exporter(UserAssignedTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(fn() => \App\Models\UserAssignedTicket::query()),
                ExportAction::make('export_weekly_user_assigned_tickets')
                    ->label(__('Last Week'))
                    ->exporter(UserAssignedTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\UserAssignedTicket::query()->where('created_at', '>=', now()->subWeek());
                    }),
                ExportAction::make('export_monthly_user_assigned_tickets')
                    ->label(__('Last Month'))
                    ->exporter(UserAssignedTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\UserAssignedTicket::query()->where('created_at', '>=', now()->subMonth());
                    }),
                ExportAction::make('export_yearly_user_assigned_tickets')
                    ->label(__('Last Year'))
                    ->exporter(UserAssignedTicketExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->modifyQueryUsing(function () {
                        return \App\Models\UserAssignedTicket::query()->where('created_at', '>=', now()->subYear());
                    }),
            ])
                ->label(__('Export Specialist Assigned Tickets'))
                ->icon('heroicon-o-document-arrow-down')
                ->button(),
        ];
    }
}

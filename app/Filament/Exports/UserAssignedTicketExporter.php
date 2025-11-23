<?php

namespace App\Filament\Exports;

use App\Models\UserAssignedTicket;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class UserAssignedTicketExporter extends Exporter
{
    protected static ?string $model = UserAssignedTicket::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user.name')->label('User'),
            ExportColumn::make('userTicket.status.name')
                ->state(function (UserAssignedTicket $record) {
                    return $record->userTicket->status?->name;
                })
                ->label('Status'),
            ExportColumn::make('userTicket.priority.name')->label('Priority'),
            ExportColumn::make('userTicket.label.name')->label('Label'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your user assigned ticket export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' have been exported.';

        if ($failedRowsCount = $export->total_rows - $export->successful_rows) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}

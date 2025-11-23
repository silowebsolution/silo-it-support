<?php

namespace App\Filament\Exports;

use App\Models\UserTicket;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class UserTicketExporter extends Exporter
{
    protected static ?string $model = UserTicket::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('user.name')->label('User'),
            ExportColumn::make('status.name')
                ->state(function (UserTicket $record) {
                    return $record->status?->name;
                })
                ->label('Status'),
            ExportColumn::make('priority.name')->label('Priority'),
            ExportColumn::make('label'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your user ticket export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' have been exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}

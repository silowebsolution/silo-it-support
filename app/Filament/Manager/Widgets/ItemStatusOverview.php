<?php

namespace App\Filament\Manager\Widgets;

use App\Models\Item;
use App\Models\ItemStatus;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ItemStatusOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $stats = [];
        $itemStatuses = ItemStatus::all();

        foreach ($itemStatuses as $status) {
            $count = Item::where('item_status_id', $status->id)->count();
            $description = $status->name;

            $stat = Stat::make($description, $count);

            if (strtolower($status->name) === 'under repair') {
                $stat->color('danger')
                     ->extraAttributes([
                         'class' => 'col-span-full md:col-span-6',
                         'style' => 'font-size: 1.5rem; font-weight: bold;',
                     ]);
            } else {
                $stat->extraAttributes([
                    'class' => 'col-span-full md:col-span-2',
                ]);
            }

            $stats[] = $stat;
        }

        return $stats;
    }

    public static function getWidgetWidth(): string
    {
        return '6/12';
    }
}

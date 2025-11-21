<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use App\Models\ItemStatus;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ItemStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $stats = [
            Stat::make('Total Items', Item::count()),
        ];

        $itemStatuses = ItemStatus::withCount('Item')->get();

        foreach ($itemStatuses as $status) {
            $stats[] = Stat::make($status->name, $status->item_count);
        }

        return $stats;
    }
}

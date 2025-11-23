<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use App\Models\ItemStatus;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache; // Add this line

class ItemStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $cacheKey = 'item_stats_overview_data_hourly'; // Unique cache key

        return Cache::remember($cacheKey, now()->addHour(), function () {
            $stats = [
                Stat::make(__('Total Items'), Item::count()),
            ];

            $itemStatuses = ItemStatus::withCount('Item')->get();

            foreach ($itemStatuses as $status) {
                $stats[] = Stat::make($status->name, $status->item_count);
            }

            return $stats;
        });
    }
}

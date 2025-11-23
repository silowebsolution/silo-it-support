<?php

namespace App\Filament\Widgets;

use App\Models\UserTicket;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Cache; // Add this line

class UserTicketChart extends ChartWidget
{
    public function getHeading(): string
    {
        return __('Ticket Summary');
    }

    protected function getData(): array
    {
        $cacheKey = 'user_ticket_chart_data_hourly';

        return Cache::remember($cacheKey, now()->addHour(), function () {
            $data = UserTicket::query()
                ->where('created_at', '>=', Carbon::now()->subMonth())
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->orderBy('date', 'ASC')
                ->get();

            return [
                'datasets' => [
                    [
                        'label' => __('Tickets'),
                        'data' => $data->map(fn ($value) => $value->count),
                    ],
                ],
                'labels' => $data->map(fn ($value) => Carbon::parse($value->date)->format('M d')),
            ];
        });
    }

    protected function getType(): string
    {
        return 'line';
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\Status;
use App\Models\UserTicket;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Cache; // Add this line

class TicketStatusChart extends ChartWidget
{
    public function getHeading(): string
    {
        return __('Daily Tickets by Status (Last Month)');
    }

    protected function getData(): array
    {
        $cacheKey = 'ticket_status_chart_data_hourly'; // Unique cache key

        return Cache::remember($cacheKey, now()->addHour(), function () {
            $startDate = Carbon::now()->subMonth()->startOfDay();
            $endDate = Carbon::now()->endOfDay();
            $statuses = Status::all();

            $ticketData = UserTicket::query()
                ->whereBetween('created_at', [$startDate, $endDate])
                ->selectRaw('DATE(created_at) as date, status_id, COUNT(*) as count')
                ->groupBy('date', 'status_id')
                ->orderBy('date', 'ASC')
                ->get();

            $period = CarbonPeriod::create($startDate, '1 day', $endDate);
            $labels = collect($period)->map(fn (Carbon $date) => $date->format('M d'))->all();
            $labelIndexMap = array_flip($labels);

            $colors = [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                '#9966FF', '#FF9F40', '#C9CBCF', '#7C83FD'
            ];

            $datasets = [];
            foreach ($statuses as $index => $status) {
                $statusData = array_fill(0, count($labels), 0);
                $statusTickets = $ticketData->where('status_id', $status->id);

                foreach ($statusTickets as $ticket) {
                    $dateLabel = Carbon::parse($ticket->date)->format('M d');
                    if (isset($labelIndexMap[$dateLabel])) {
                        $idx = $labelIndexMap[$dateLabel];
                        $statusData[$idx] = $ticket->count;
                    }
                }

                $datasets[] = [
                    'label' => $status->name,
                    'data' => $statusData,
                    'backgroundColor' => $colors[$index % count($colors)],
                    'borderColor' => $colors[$index % count($colors)],
                ];
            }

            return [
                'datasets' => $datasets,
                'labels' => $labels,
            ];
        });
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'stacked' => true,
                ],
                'y' => [
                    'stacked' => true,
                ],
            ],
        ];
    }
}

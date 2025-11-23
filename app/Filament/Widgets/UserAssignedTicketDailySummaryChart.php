<?php

namespace App\Filament\Widgets;

use App\Models\UserAssignedTicket;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\LineChartWidget;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache; // Add this line

class UserAssignedTicketDailySummaryChart extends ChartWidget
{
    public function getHeading(): string
    {
        return __('Daily Ticket Summary by IT Specialist');
    }

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $cacheKey = 'user_assigned_ticket_daily_summary_chart_data_hourly'; // Unique cache key

        return Cache::remember($cacheKey, now()->addHour(), function () {
            $tickets = UserAssignedTicket::query()
                ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
                ->with('user')
                ->get();

            $specialists = $tickets->map(fn ($ticket) => $ticket->user->name ?? 'Unassigned')
                                ->unique()
                                ->sort()
                                ->values();

            $datasets = [];

            foreach ($specialists as $specialistName) {
                $specialistData = $tickets->filter(fn ($ticket) => ($ticket->user->name ?? 'Unassigned') === $specialistName)
                                        ->groupBy(fn ($ticket) => Carbon::parse($ticket->created_at)->format('Y-m-d'))
                                        ->map(fn ($dailyTickets) => $dailyTickets->count());

                $dataForChart = [];
                $currentDay = now()->startOfMonth();
                // Iterate through each day of the month to ensure all days are represented, even if no tickets
                while ($currentDay->lte(now()->endOfMonth())) {
                    $dateString = $currentDay->format('Y-m-d');
                    $dataForChart[] = $specialistData->get($dateString, 0);
                    $currentDay->addDay();
                }

                $datasets[] = [
                    'label' => $specialistName,
                    'data' => $dataForChart,
                    'borderColor' => '#' . substr(md5(rand()), 0, 6), // Generate a random color
                    'fill' => false,
                ];
            }

            $labels = [];
            $currentDay = now()->startOfMonth();
            while ($currentDay->lte(now()->endOfMonth())) {
                $labels[] = $currentDay->format('M d');
                $currentDay->addDay();
            }

            return [
                'datasets' => $datasets,
                'labels' => $labels,
            ];
        });
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'line';
    }
}

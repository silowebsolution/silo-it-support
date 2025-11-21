<?php

namespace App\Filament\Widgets;

use App\Models\UserTicket;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class UserTicketChart extends ChartWidget
{
    public function getHeading(): string
    {
        return __('Ticket Summary');
    }

    protected function getData(): array
    {
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
    }

    protected function getType(): string
    {
        return 'line';
    }
}

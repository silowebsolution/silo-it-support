<?php

namespace App\Filament\Manager\Resources\UserTickets\Widgets;

use App\Models\Status;
use App\Models\UserTicket;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserTicketStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $openTickets = UserTicket::whereIn('status_id', [Status::PENDING, Status::IN_PROGRESS])->count();
        $totalTicketsLast7Days = UserTicket::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $closedTicketsLast7Days = UserTicket::where('status_id', Status::CLOSED)
            ->where('updated_at', '>=', Carbon::now()->subDays(7))
            ->count();

        return [
            Stat::make(__('Total Tickets (Last 7 Days)'), $totalTicketsLast7Days),
            Stat::make(__('Open Tickets'), $openTickets),
            Stat::make(__('In Progress Tickets'), UserTicket::where('status_id', Status::IN_PROGRESS)->count()),
            Stat::make(__('Closed Tickets (Last 7 Days)'), $closedTicketsLast7Days),
        ];
    }
}

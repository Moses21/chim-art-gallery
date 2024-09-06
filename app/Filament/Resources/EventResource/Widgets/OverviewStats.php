<?php

namespace App\Filament\Resources\EventResource\Widgets;

// namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Event;
use App\Models\EventTicket;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverviewStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Registered Users')
                ->color('primary'),

            Stat::make('Total Tickets Sold', EventTicket::count())
                ->description('All Tickets')
                ->color('success'),

            Stat::make('Total Events', Event::count())
                ->description('All Events')
                ->color('info'),

            Stat::make('Total Revenue', 'MWK ' . number_format(EventTicket::sum('price')))
                ->description('Revenue from Ticket Sales')
                ->color('warning'),
        ];
    }
}

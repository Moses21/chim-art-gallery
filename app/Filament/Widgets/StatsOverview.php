<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Event;
use App\Models\Items;
use PHPUnit\Framework\Attributes\Ticket;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Artworks added', Items::count()),
            Stat::make('Total Tickets Sold', Ticket::count()),
            Stat::make('Total Events', Event::count()),
            Stat::make('Total Revenue', 'MWK ' . number_format(Ticket::sum('price'))),


        ];
    }
}

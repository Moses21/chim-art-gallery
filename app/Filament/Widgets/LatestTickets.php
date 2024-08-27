<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\EventTicket;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestTickets extends BaseWidget
{
    protected static ?string $heading = 'Latest Tickets';

    protected function getTableQuery()
    {
        return EventTicket::query()
            ->latest() // Orders by the latest tickets first
            ->limit(20); // Adjust the limit as needed
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->label('Ticket ID')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('event.name')
                ->label('Event')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('user.name')
                ->label('User')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('price')
                ->label('Price')
                ->money('MWK') // Adjust the currency as needed
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
        ];
    }
}

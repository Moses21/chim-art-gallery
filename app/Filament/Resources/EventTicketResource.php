<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventTicketResource\Pages;
use App\Filament\Resources\EventTicketResource\RelationManagers;
use App\Models\EventTicket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventTicketResource extends Resource
{
    protected static ?string $model = EventTicket::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->relationship('event', 'name')
                    ->required(),
                Forms\Components\Select::make('ticket_type_id')
                    ->relationship('ticketType', 'name')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('ticketType.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventTickets::route('/'),
            'create' => Pages\CreateEventTicket::route('/create'),
            'edit' => Pages\EditEventTicket::route('/{record}/edit'),
        ];
    }
}

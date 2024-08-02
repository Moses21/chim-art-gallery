<?php

namespace App\Filament\Resources\ItemsResource\Pages;

use App\Filament\Resources\ItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateItems extends CreateRecord
{
    protected static string $resource = ItemsResource::class;


protected function getCreatedNotification(): ?Notification
{
    return Notification::make()
        ->success()
        ->title('Item Created')
        ->body('The Item been created successfully.');
}
}

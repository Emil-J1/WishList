<?php

namespace App\Filament\User\Resources\WishListResource\Pages;

use App\Filament\User\Resources\WishListResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateWishList extends CreateRecord
{
    protected static string $resource = WishListResource::class;

    protected static ?string $title = 'Opret ønskeliste';

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('En ny ønskeliste blev oprettet!');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    protected static bool $canCreateAnother = false;
}

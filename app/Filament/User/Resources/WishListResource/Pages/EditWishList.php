<?php

namespace App\Filament\User\Resources\WishListResource\Pages;

use App\Filament\User\Resources\WishListResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditWishList extends EditRecord
{
    protected static string $resource = WishListResource::class;

    protected static ?string $title = 'Rediger ønskelisten';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('Slet ønskelisten')->successNotification(
                Notification::make()
                ->success()
                ->title('Ønskelisten blev slettet.')
            ),
        ];
    }
}

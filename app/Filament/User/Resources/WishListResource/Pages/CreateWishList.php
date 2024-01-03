<?php

namespace App\Filament\User\Resources\WishListResource\Pages;

use App\Filament\User\Resources\WishListResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWishList extends CreateRecord
{
    protected static string $resource = WishListResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}

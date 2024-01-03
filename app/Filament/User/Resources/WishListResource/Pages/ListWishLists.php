<?php

namespace App\Filament\User\Resources\WishListResource\Pages;

use App\Filament\User\Resources\WishListResource;
use App\Models\WishList;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWishLists extends ListRecords
{
    protected static string $resource = WishListResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create new wish list'),
        ];
    }
};

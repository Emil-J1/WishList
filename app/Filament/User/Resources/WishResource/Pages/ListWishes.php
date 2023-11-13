<?php

namespace App\Filament\User\Resources\WishResource\Pages;

use App\Filament\User\Resources\WishResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWishes extends ListRecords
{
    protected static string $resource = WishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

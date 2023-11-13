<?php

namespace App\Filament\User\Resources\WishResource\Pages;

use App\Filament\User\Resources\WishResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWish extends CreateRecord
{
    protected static string $resource = WishResource::class;
}

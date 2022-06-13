<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Filament\Traits\HasDeleteButton;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    use HasDeleteButton;

    protected static string $resource = UserResource::class;
}

<?php

namespace App\Filament\Resources\SubjectResource\Pages;

use App\Filament\Resources\SubjectResource;
use App\Filament\Traits\HasDeleteButton;
use Filament\Resources\Pages\ListRecords;

class ListSubjects extends ListRecords
{
    use HasDeleteButton;

    protected static string $resource = SubjectResource::class;
}

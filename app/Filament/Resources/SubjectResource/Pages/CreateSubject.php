<?php

namespace App\Filament\Resources\SubjectResource\Pages;

use App\Filament\Resources\SubjectResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateSubject extends CreateRecord
{
    protected static string $resource = SubjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['professor_id'] = auth()->id();
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        $subjectResource = static::getResource();

        return $subjectResource::getUrl('index');
    }
}

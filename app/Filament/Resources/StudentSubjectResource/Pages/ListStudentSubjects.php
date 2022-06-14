<?php

namespace App\Filament\Resources\StudentSubjectResource\Pages;

use App\Filament\Resources\StudentSubjectResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class ListStudentSubjects extends ListRecords
{
    protected static string $resource = StudentSubjectResource::class;

    protected function getViewAction(): Action
    {
        $resource = static::getResource();

        return config('filament.layout.tables.actions.type')
            ::make('view')
            ->label(__('filament::resources/pages/list-records.table.actions.view.label'))
            ->url(fn(Model $record): string => $resource::getUrl('view', ['record' => $record]))
            ->icon('heroicon-o-eye')
            ->hidden(fn(Model $record): bool => !$record->registered);
    }
}

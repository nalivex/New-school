<?php

namespace App\Filament\Resources\StudentSubjectResource\Pages;

use App\Filament\Resources\StudentSubjectResource;
use App\Models\Subject;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;

class ViewStudentSubject extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $title = 'Tópicos da Matéria ';

    public Subject $record;

    protected static string $resource = StudentSubjectResource::class;

    protected static string $view = 'filament.pages.student-topic';

    protected function getTableQuery(): Builder
    {
        return $this->record->topics()->getQuery();
    }

    protected function getTableColumns(): array
    {
        return [TextColumn::make('name')->label('Nome'), TextColumn::make('description')->label('Descrição')];
    }
}

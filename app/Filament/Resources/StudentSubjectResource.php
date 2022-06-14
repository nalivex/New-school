<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentSubjectResource\Pages;
use App\Models\Subject;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;

class StudentSubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $label = 'Matérias';

    protected static ?string $navigationGroup = 'ALUNO';

    protected static ?string $slug = 'student-subjects';

    public static function form(Form $form): Form
    {
        return $form->schema([
            //
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nome'),
                TextColumn::make('description')->label('Descrição'),
                BooleanColumn::make('registered')
                    ->trueIcon('bi-clipboard2-check-fill')
                    ->falseIcon('bi-clipboard2-x')
                    ->label('Inscrito')
                    ->getStateUsing(fn(Subject $record) => (bool) $record->registered),
            ])
            ->prependActions([
                IconButtonAction::make('edit')
                    ->label('Editar')
                    ->action(fn(Subject $record) => $record->students()->attach(auth()->id()))
                    ->icon('heroicon-s-badge-check')
                    ->visible(fn(Subject $record) => !$record->registered),

                IconButtonAction::make('delete')
                    ->label('Desinscrever')
                    ->action(fn(Subject $record) => $record->students()->detach(auth()->id()))
                    ->icon('heroicon-s-badge-check')
                    ->color('secondary')
                    ->visible(fn(Subject $record) => $record->registered),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return Subject::query()
            ->select('subjects.*', 'student_subject.user_id as registered')
            ->leftJoin(
                'student_subject',
                fn(JoinClause $join) => $join
                    ->on('student_subject.subject_id', 'subjects.id')
                    ->where('student_subject.user_id', auth()->id()),
            );
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudentSubjects::route('/'),
            'view' => Pages\ViewStudentSubject::route('/{record}'),
        ];
    }
}

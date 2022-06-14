<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Filament\Resources\SubjectResource\RelationManagers\TopicsRelationManager;
use App\Models\Subject;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class SubjectResource extends Resource
{
    protected static ?int $navigationSort = 2;

    protected static ?string $model = Subject::class;

    protected static ?string $label = 'Matérias';

    protected static ?string $navigationIcon = 'far-folder';

    protected static ?string $navigationGroup = 'PROFESSOR';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('description')->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([TextColumn::make('name')->label('Nome'), TextColumn::make('description')->label('Descrição')])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [TopicsRelationManager::class];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }
}

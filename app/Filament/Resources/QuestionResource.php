<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers\AnswersRelationManager;
use App\Models\Question;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $label = 'Questões';

    protected static ?string $navigationIcon = 'ri-bill-line';

    protected static ?string $navigationGroup = 'PROFESSOR';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('text')
                ->label('Texto')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([TextColumn::make('text')->label('Texto')])->filters([
            //
        ]);
    }

    public static function getRelations(): array
    {
        return [AnswersRelationManager::class];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}

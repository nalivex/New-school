<?php

namespace App\Filament\Resources\QuestionResource\RelationManagers;

use App\Models\Answer;
use App\Models\Question;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class AnswersRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'answers';

    protected static ?string $title = 'Respostas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('letter')
                ->label('Letra')
                ->required()
                ->maxLength(1),
            TextInput::make('text')
                ->label('Texto')
                ->required()
                ->maxLength(255),
            Toggle::make('is_correct')
                ->label('Resposta correta?')
                ->disabled(
                    fn($record, $livewire) => Answer::query()
                        ->when($record, fn($q) => $q->where('id', '!=', $record->id))
                        ->whereBelongsTo($livewire->ownerRecord)
                        ->where('is_correct', true)
                        ->exists(),
                )
                ->helperText('Não é possível duas respostas corretas para a mesma pergunta!')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('letter')->label('Letra'),
                TextColumn::make('text')->label('Texto'),
                BooleanColumn::make('is_correct')->label('Correta'),
            ])
            ->filters([
                //
            ]);
    }
}

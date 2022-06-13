<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnswerResource\Pages;
use App\Models\Answer;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?int $navigationSort = 5;

    protected static ?string $label = 'Respostas';

    protected static ?string $navigationIcon = 'ri-bill-fill';

    protected static ?string $navigationGroup = 'PROFESSOR';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('letter')
                ->label('Letra')
                ->required()
                ->maxLength(2),
            TextInput::make('text')
                ->label('Texto')
                ->required()
                ->maxLength(255),
            Toggle::make('is_correct')->required(),
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

    public static function getRelations(): array
    {
        return [
                //
            ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnswers::route('/'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }
}

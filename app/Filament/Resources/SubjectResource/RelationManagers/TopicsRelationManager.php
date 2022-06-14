<?php

namespace App\Filament\Resources\SubjectResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class TopicsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'topics';

    protected static ?string $title = 'Tópicos';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Nome')
                ->required()
                ->maxLength(255),
            TextInput::make('video_link')
                ->label('Link do Vídeo')
                ->required()
                ->maxLength(255),
            TextInput::make('grade_value')
                ->label('Valor')
                ->numeric()
                ->minValue(1)
                ->maxValue(100)
                ->required(),
            TextInput::make('description')
                ->label('Descrição')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('video_link'),
                TextColumn::make('grade_value'),
                TextColumn::make('description'),
            ])
            ->filters([
                //
            ]);
    }
}

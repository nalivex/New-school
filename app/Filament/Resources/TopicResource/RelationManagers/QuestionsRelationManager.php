<?php

namespace App\Filament\Resources\TopicResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyThroughRelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class QuestionsRelationManager extends HasManyThroughRelationManager
{
    protected static string $relationship = 'questions';

    protected static ?string $title = 'Questões';

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

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['test_id'] = $this->ownerRecord->test->id;

        return $data;
    }
}

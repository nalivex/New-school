<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicResource\Pages;
use App\Filament\Resources\TopicResource\RelationManagers\QuestionsRelationManager as TopicResourceRelationManagersQuestionsRelationManager;
use App\Models\Topic;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class TopicResource extends Resource
{
    protected static ?string $model = Topic::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $label = 'Tópico';

    protected static ?string $navigationGroup = 'PROFESSOR';

    protected static ?string $navigationIcon = 'css-menu-left-alt';

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
                TextColumn::make('name')->label('Nome'),
                TextColumn::make('video_link')->label('Vídeo'),
                TextColumn::make('grade_value')->label('Valor'),
                TextColumn::make('description')->label('Descrição'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [TopicResourceRelationManagersQuestionsRelationManager::class];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopics::route('/'),
            'edit' => Pages\EditTopic::route('/{record}/edit'),
            'view' => Pages\ViewTopic::route('/{record}'),
        ];
    }
}

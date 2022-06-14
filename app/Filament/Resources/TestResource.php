<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestResource\Pages\ListTest;
use App\Filament\Resources\TestResource\Pages\ViewTest;
use App\Models\Topic;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class TestResource extends Resource
{
    protected static ?string $model = Topic::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'student-topic';

    protected static ?string $navigationGroup = 'ALUNO';

    protected static ?string $label = 'Testes';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Nome'),
            TextColumn::make('description')->label('Descrição'),
            TextColumn::make('grade_value')->label('Valor'),
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
            'index' => ListTest::route('/'),
            'view' => ViewTest::route('/{record}'),
        ];
    }
}

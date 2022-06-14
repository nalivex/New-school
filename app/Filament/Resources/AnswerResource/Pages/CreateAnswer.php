<?php

namespace App\Filament\Resources\AnswerResource\Pages;

use App\Filament\Resources\AnswerResource;
use App\Models\Answer;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAnswer extends CreateRecord
{
    protected static string $resource = AnswerResource::class;
}

<?php

namespace App\Filament\Resources\TopicResource\Pages;

use App\Filament\Resources\TopicResource;
use App\Models\Topic;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTopic extends CreateRecord
{
    protected static string $resource = TopicResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $topic = Topic::create($data);

        $topic->test()->create();

        return $topic;
    }
}

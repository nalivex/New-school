<?php

namespace App\Filament\Resources\TestResource\Pages;

use App\Filament\Resources\TestResource;
use App\Models\AnswerQuestion;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestResult;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Builder;

class ViewTest extends Page
{
    protected static ?string $title = 'Resolvendo Teste';

    public Test $record;

    public Question $question;

    public $answerId;

    protected static string $resource = TestResource::class;

    protected static string $view = 'filament.pages.respond-question';

    public function mount()
    {
        $testResult = $this->record->testResults()->firstOrCreate(['student_id' => auth()->user()->id], ['grade' => 0]);

        $result = $this->question($testResult);

        if (!$result) {
            return redirect()->route('filament.pages.test-result', $testResult);
        }

        $this->question = $result;
    }

    protected function question(TestResult $testResult)
    {
        return $this->record
            ->questions()
            ->whereDoesntHave('answerQuestions', function (Builder $query) use ($testResult) {
                $query->where('test_result_id', $testResult->id);
            })
            ->first();
    }

    public function submit()
    {
        $testResult = $this->record
            ->testResults()
            ->where('student_id', auth()->user()->id)
            ->first();

        AnswerQuestion::create([
            'answer_id' => $this->answerId,
            'question_id' => $this->question->id,
            'test_result_id' => $testResult->id,
        ]);

        $result = $this->question($testResult);

        if (!$result) {
            return redirect()->route('filament.resources.student-subjects.index');
        }

        $this->question = $result;
    }
}

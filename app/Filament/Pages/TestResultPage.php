<?php

namespace App\Filament\Pages;

use App\Models\TestResult;
use Closure;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

class TestResultPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $slug = 'test-result/{testeResult}';

    public TestResult $testeResult;

    protected static string $view = 'filament.pages.test-result';

    public static function getRouteName(): string
    {
        return 'filament.pages.test-result';
    }

    public static function getRoutes(): Closure
    {
        return function () {
            $slug = static::getSlug();

            Route::get($slug, static::class)
                ->middleware(static::getMiddlewares())
                ->name('test-result');
        };
    }

    public function getResultEndProperty()
    {
        $gradeValue = $this->testResult->test->topic->grade_value;

        $quantityQuestion = $this->testeResult->test->questions->count();

        $quantityQuestionCorrect = $this->testResult
            ->answerQuestions()
            ->whereHas('answer', function (Builder $query) {
                $query->where('is_correct', true);
            })
            ->count();

        return ($gradeValue / $quantityQuestion) * $quantityQuestionCorrect;
    }
}

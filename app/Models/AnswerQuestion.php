<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'answer_question_test_result';

    protected $guarded = ['id'];

    public function question()
    {
        return $this->belongsTo(question::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function testResult()
    {
        return $this->belongsTo(TestResult::class);
    }
}

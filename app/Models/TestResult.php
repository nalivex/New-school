<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function answerQuestions()
    {
        return $this->hasMany(AnswerQuestion::class);
    }
}

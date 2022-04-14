<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('answer_question_test_result', function (Blueprint $table) {
            $table->id();
            $table->foreignId('answer_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->foreignId('test_result_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('answer_question_test_result');
    }
}

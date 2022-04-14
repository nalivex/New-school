<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubjectTable extends Migration
{
    public function up()
    {
        Schema::create('student_subject', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('subject_id')->constrained();

            $table->primary(['user_id', 'subject_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_subject');
    }
}

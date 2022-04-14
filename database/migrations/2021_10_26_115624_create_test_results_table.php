<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained();
            $table->foreignId('student_id')->constrained('users');
            $table->float('grade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}

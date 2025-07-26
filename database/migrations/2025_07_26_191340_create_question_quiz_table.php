<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('question')->onDelete('cascade');
            $table->foreignId('quizzes_id')->constrained('quizzes')->onDelete('cascade');
            $table->timestamps();
            
            // Add unique constraint to prevent duplicate question-quiz pairs
            $table->unique(['question_id', 'quizzes_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_quiz');
    }
}
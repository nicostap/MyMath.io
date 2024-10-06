<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question', 512);
            $table->string('math_question', 512);
            $table->string('answer_formula', 512);
            $table->string('coefficients', 128);
            $table->string('image')->nullable()->default(null);
            $table->integer('round_to')->default(0);
            $table->integer('rating')->default(0);
            $table->enum('type', ['MULTIPLE_CHOICES', 'ESSAY']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
}

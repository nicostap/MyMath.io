<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('history_session_questions');
        Schema::create('history_session_questions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->default(Carbon::now());
            $table->timestamp('updated_at')->default(Carbon::now());
            $table->foreignId('history_game_id')->constrained('history_games');
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('user_id')->constrained('users');
            $table->json('coefficients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_session_questions');
    }
};

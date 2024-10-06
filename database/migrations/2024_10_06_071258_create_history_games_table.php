<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryGamesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('history_games', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->foreignId('first_player_id')->constrained('users');
            $table->foreignId('second_player_id')->constrained('users');
            $table->foreignId('winner_id')->nullable()->constrained('users');
            $table->integer('first_player_score');
            $table->integer('second_player_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_games');
    }
}

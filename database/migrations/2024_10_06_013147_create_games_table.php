<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->default(Carbon::now());
            $table->timestamp('matched_at');
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->foreignId('first_player_id')->constrained('user');
            $table->nullable()->foreignId('second_player_id')->constrained('user');
            $table->nullable()->foreignId('winner_id')->constrained('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};

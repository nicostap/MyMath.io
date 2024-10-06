<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryGame extends Model
{
    use HasFactory;
    protected $table = 'history_games';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'started_at',
        'finished_at',
        'first_player_id',
        'second_player_id',
        'winner_id',
        'first_player_score',
        'second_player_score',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'first_player_score' => 'integer',
        'second_player_score' => 'integer',
    ];

    public function firstPlayer()
    {
        return $this->belongsTo(User::class, 'first_player_id');
    }

    public function secondPlayer()
    {
        return $this->belongsTo(User::class, 'second_player_id');
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
}

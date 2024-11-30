<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'sessions';

    protected $fillable = [
        'player_id',
        'game_id',
        'score',
        'started_at',
        'finished_at',
        'active',
    ];

    protected $casts = [
        'score' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'started_at',
        'finished_at',
    ];

    public function questions()
    {
        return $this->hasMany(SessionQuestion::class, 'session_id');
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}

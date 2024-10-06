<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    protected $fillable = [
        'first_player_id',
        'second_player_id',
        'matched_at',
        'started_at',
        'finished_at',
        'avg_rating',
    ];

    protected $casts = [
        'avg_rating' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'matched_at',
        'started_at',
        'finished_at',
    ];

    public function firstPlayer()
    {
        return $this->belongsTo(User::class, 'first_player_id');
    }

    public function secondPlayer()
    {
        return $this->belongsTo(User::class, 'second_player_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'game_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'rating',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'active' => 'boolean',
        'rating' => 'integer',
        'created_at' => 'datetime',
    ];

    public function historyGames()
    {
        return $this->hasMany(HistoryGame::class)->where(function ($query) {
            $query->where('first_player_id', $this->id)
                ->orWhere('second_player_id', $this->id);
        });
    }
}

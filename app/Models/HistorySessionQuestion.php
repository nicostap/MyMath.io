<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorySessionQuestion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'history_session_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'history_game_id',
        'question_id',
        'coefficients',
        'user_id',
    ];

    protected $casts = [
        'coefficients' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the question associated with this session question.
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}

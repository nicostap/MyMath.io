<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionQuestion extends Model
{
    use HasFactory;

    protected $table = 'session_questions';

    protected $fillable = [
        'session_id',
        'question_id',
        'coefficients',
    ];

    protected $casts = [
        'coefficients' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

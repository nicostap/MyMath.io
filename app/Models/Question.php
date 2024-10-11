<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'question',
        'math_question',
        'answer_formula',
        'coefficients',
        'image',
        'round_to',
        'rating',
        'type',
    ];

    protected $casts = [
        'round_to' => 'integer',
        'rating' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

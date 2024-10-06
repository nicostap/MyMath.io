<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'question' => 'What is the result of this expression?',
                'math_question' => 'a + b',
                'answer_formula' => 'a + b',
                'coefficients' => 'a,b',
                'round_to' => 0,
                'rating' => 0,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression?',
                'math_question' => 'a - b',
                'answer_formula' => 'a - b',
                'coefficients' => 'a,b',
                'round_to' => 0,
                'rating' => 0,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression?',
                'math_question' => 'a x b',
                'answer_formula' => 'a * b',
                'coefficients' => 'a,b',
                'round_to' => 0,
                'rating' => 50,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression? (Round to nearest number)',
                'math_question' => 'a ÷ b',
                'answer_formula' => 'a / b',
                'coefficients' => 'a,b',
                'round_to' => 0,
                'rating' => 50,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression?',
                'math_question' => 'a + b',
                'answer_formula' => 'a + b',
                'coefficients' => 'a,b',
                'round_to' => 2,
                'rating' => 100,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression?',
                'math_question' => 'a - b',
                'answer_formula' => 'a - b',
                'coefficients' => 'a,b',
                'round_to' => 2,
                'rating' => 100,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression?',
                'math_question' => 'a x b',
                'answer_formula' => 'a * b',
                'coefficients' => 'a,b',
                'round_to' => 2,
                'rating' => 150,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression?',
                'math_question' => 'a³',
                'answer_formula' => 'a * a * a',
                'coefficients' => 'a',
                'round_to' => 0,
                'rating' => 150,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the result of this expression? (Round to 2 decimals place)',
                'math_question' => 'a ÷ b',
                'answer_formula' => 'a / b',
                'coefficients' => 'a,b',
                'round_to' => 2,
                'rating' => 200,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the value of x?',
                'math_question' => 'x + a = b',
                'answer_formula' => 'b - a',
                'coefficients' => 'a,b',
                'round_to' => 0,
                'rating' => 200,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the value of x?',
                'math_question' => '(x - a) ÷ b = c',
                'answer_formula' => 'c * b + a',
                'coefficients' => 'a,b,c',
                'round_to' => 0,
                'rating' => 200,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the value of x? (Separate by comma)',
                'math_question' => '(x - a)(x - b) = 0',
                'answer_formula' => 'a,b',
                'coefficients' => 'a,b',
                'round_to' => 0,
                'rating' => 200,
                'type' => 'ESSAY',
                'image' => null,
            ],
            [
                'question' => 'What is the value of the side of c? (Round to nearest number)',
                'math_question' => 'a = x and b = y',
                'answer_formula' => 'sqrt(x * x + y * y)',
                'coefficients' => 'x,y',
                'round_to' => 0,
                'rating' => 250,
                'type' => 'ESSAY',
                'image' => 'question_images/perpendicular_triangle.png',
            ],
        ]);
    }
}

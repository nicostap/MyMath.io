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
                'solution' => '"Add {a} by one {b} times, you will get ".({a} + 1)." ... ".({a} + {b})."!"',
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
                'solution' => '"Subtract {a} by one {b} times, you will get ".({a} - 1)." ... ".({a} - {b})."!"',
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
                'solution' => '"Add {a} by {a} {b} times, you will get {a} + {a} + ... = ".({a} * {b})."!"',
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
                'solution' => '"Subtract {a} by {b} until {a} becomes 0, keep tracks of the total count!"',
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
                'solution' => '"Add {a} by {b}\'s tens place and then add {b}\'s ones place"',
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
                'solution' => '"Subtract {a} by {b}\'s tens place and then subtract {b}\'s ones place"',
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
                'solution' => '"Multiply {a} by {b}\'s tens place, multiply {a} by {b}\'s ones place, add both of them together"',
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
                'solution' => '"Multiply {a} by {a} two times"',
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
                'solution' => '"Subtract {a} by {b} until {a} becomes 0, keep tracks of the total count!"',
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
                'solution' => '"x + {a} - {a} = {b} - {a}<br/>x = {b} - {a}"',
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
                'solution' => '"(x - {a}) ÷ {b} * {b} = {c} * {b}<br/>x - {a} = ".({b} * {c})."<br/>x - {a} + {a} = ".({b} * {c})." + {a}<br/>x = ".({b} * {c})." + {a}"',
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
                'solution' => '"Pythagoras Theorem"',
            ],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Session;
use App\Models\SessionQuestion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SessionQuestionController extends Controller
{
    public function getQuestion(Session $session)
    {
        $question = Question::inRandomOrder()->first();
        $text_question = $question->question;
        $math_question = $question->math_question;
        $image = $question->image;
        $coefficients = explode(',', $question->coefficients);
        $coefficientsInput = [];
        foreach ($coefficients as $coefficient) {
            $coefficientsInput[$coefficient] = round(2 + mt_rand() / mt_getrandmax() * 18, $question->round_to);
            $math_question = str_replace($coefficient, $coefficientsInput[$coefficient], $math_question);
        }
        SessionQuestion::insert([
            'session_id' => $session->id,
            'question_id' => $question->id,
            'coefficients' => $coefficientsInput,
        ]);
        $response = [
            'text_question' => $text_question,
            'math_question' => $math_question,
            'image' => $image,
        ];
        return response()->json($response);
    }

    public function answer(SessionQuestion $sessionQuestion, float $answer)
    {
        $game = $sessionQuestion->session->game;
        $session = $sessionQuestion->session;
        $question = $sessionQuestion->question;

        if (Carbon::now()->greaterThanOrEqualTo($session->finished_at)) {
            return;
        }

        $rating = $game->avg_rating;
        $formula = $question->answer_formula;
        $coefficients = explode(',', $question->coefficient);
        foreach ($coefficients as $coefficient) {
            $formula = str_replace($coefficient, $sessionQuestion->coefficients[$coefficient], $formula);
        }
        $true_answer = round(eval ("return ($formula);"), $question->round_to);
        if ($true_answer === round($answer, $question->round_to)) {
            $session->update([
                'score' => $session->score + 1
            ]);
        } else {
            $session->update([
                'score' => $session->score - 1
            ]);
        }
    }
}

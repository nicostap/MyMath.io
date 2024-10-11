<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Session;
use App\Models\SessionQuestion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Log;

class SessionQuestionController extends Controller
{
    public function getQuestion(Session $session)
    {
        $question = Question::inRandomOrder()->first();
        $text_question = $question->question;
        $math_question = $question->math_question;
        $image = isset($question->image) ? asset($question->image) : null;
        $coefficients = explode(',', $question->coefficients);
        $coefficientsInput = [];
        foreach ($coefficients as $coefficient) {
            $coefficientsInput[$coefficient] = round(2 + mt_rand() / mt_getrandmax() * 18, $question->round_to);
            $math_question = str_replace($coefficient, $coefficientsInput[$coefficient], $math_question);
        }
        $sessionQuestion = SessionQuestion::create([
            'session_id' => $session->id,
            'question_id' => $question->id,
            'coefficients' => $coefficientsInput,
        ]);
        $response = [
            'text_question' => $text_question,
            'math_question' => $math_question,
            'image' => $image,
            'session_question' => $sessionQuestion,
        ];
        return response()->json($response);
    }

    public function answer(SessionQuestion $sessionQuestion, Request $request)
    {
        $game = $sessionQuestion->session->game;
        $session = $sessionQuestion->session;
        $question = $sessionQuestion->question;
        $answer = $request->input('answer');

        if (Carbon::now()->greaterThanOrEqualTo(Carbon::parse($session->finished_at))) {
            return;
        }

        $rating = $game->avg_rating;
        $formula = $question->answer_formula;
        $coefficients = explode(',', $question->coefficients);
        foreach ($coefficients as $coefficient) {
            $formula = str_replace($coefficient, $sessionQuestion->coefficients[$coefficient], $formula);
        }
        $true_answer = round(eval ("return ($formula);"), $question->round_to);
        if ($true_answer === round($answer, $question->round_to)) {
            $session->update([
                'score' => $session->score + 1
            ]);
            $response = [
                'status' => 'wrong',
            ];
        } else {
            $session->update([
                'score' => $session->score - 1
            ]);
            $response = [
                'status' => 'correct',
            ];
        }
        return response()->json($response);
    }
}

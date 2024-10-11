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
        $activeQuestion = SessionQuestion::where('session_id', $session->id)->where('active', 1)->first();
        if (isset($activeQuestion)) {
            $selected_question = $activeQuestion->question;
        } else {
            $avg_rating = $session->game->avg_rating;
            $questions = Question::all()->map(function ($question) use ($avg_rating) {
                $question->weight = 1 / (abs($question->rating - $avg_rating) + 1);
                return $question;
            });

            $total_weight = $questions->sum('weight');
            $random = mt_rand(0, $total_weight * 10000) / 10000;
            $current_sum = 0;
            $selected_question = null;

            foreach ($questions as $question) {
                $current_sum += $question->weight;
                if ($random <= $current_sum) {
                    $selected_question = $question;
                    break;
                }
            }
        }

        $text_question = $selected_question->question;
        $math_question = $selected_question->math_question;
        $image = isset($selected_question->image) ? asset($selected_question->image) : null;
        $coefficients = explode(',', $selected_question->coefficients);
        $coefficientsInput = isset($activeQuestion) ? $activeQuestion->coefficients : [];
        foreach ($coefficients as $coefficient) {
            if (!isset($activeQuestion)) {
                $coefficientsInput[$coefficient] = round(2 + mt_rand() / mt_getrandmax() * 18, $selected_question->round_to);
            }
            $math_question = str_replace($coefficient, $coefficientsInput[$coefficient], $math_question);
        }
        if (!isset($activeQuestion)) {
            $activeQuestion = SessionQuestion::create([
                'session_id' => $session->id,
                'question_id' => $selected_question->id,
                'coefficients' => $coefficientsInput,
            ]);
        }
        $response = [
            'text_question' => $text_question,
            'math_question' => $math_question,
            'image' => $image,
            'session_question' => $activeQuestion,
        ];
        return response()->json($response);
    }

    public function answer(SessionQuestion $sessionQuestion, Request $request)
    {
        $game = $sessionQuestion->session->game;
        $session = $sessionQuestion->session;
        $question = $sessionQuestion->question;
        $answer = $request->input('answer');

        $sessionQuestion->update(['active' => 0]);

        if (Carbon::now()->greaterThanOrEqualTo(Carbon::parse($session->finished_at)) || $session->active == 0) {
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

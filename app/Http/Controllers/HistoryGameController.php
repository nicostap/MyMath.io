<?php

namespace App\Http\Controllers;

use App\Models\HistoryGame;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryGameController
{
    public function index(User $user)
    {
        return view('history.index', ['user' => $user]);
    }

    public function getUserHistoryGames(Request $request)
    {
        $userId = $request->input('userId');
        $pageSize = $request->input('page_size');
        $pageIndex = $request->input('page_index');
        $historyGames = HistoryGame::where('first_player_id', $userId)
            ->orWhere('second_player_id', $userId)
            ->skip($pageIndex * $pageSize)
            ->take($pageSize)
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($historyGames as $game) {
            $first_player = $game->firstPlayer;
            $second_player = $game->secondPlayer;
            $vs = $first_player->id != $userId ? $first_player->name : $second_player->name;

            $sessions = $game->sessions;
            $questions = [];
            foreach ($sessions as $session) {
                if ($session->user_id != $userId) {
                    continue;
                }
                $question = $session->question;
                $coefficients = explode(',', $question->coefficients);
                foreach ($coefficients as $coefficient) {
                    $question->math_question = str_replace($coefficient, $session->coefficients[$coefficient], $question->math_question);
                    $question->answer_formula = str_replace($coefficient, $session->coefficients[$coefficient], $question->answer_formula);
                    $question->solution = str_replace('{' . $coefficient . '}', $session->coefficients[$coefficient], $question->solution);
                }
                $question->solution = eval("return ".$question->solution.";");
                $question->true_answer = round(eval ("return ($question->answer_formula);"), $question->round_to);
                if ($question) {
                    $questions[] = $question;
                }
            }
            $game->questions = $questions;
            $game->vs = $vs;
            unset($game->sessions);
            unset($game->firstPlayer);
            unset($game->secondPlayer);
        }
        return response()->json([
            'data' => $historyGames,
            'meta' => [
                'page_size' => $pageSize,
                'page_index' => $pageIndex,
            ],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\HistoryGame;
use App\Models\HistorySessionQuestion;
use App\Models\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SessionController extends Controller
{
    public function getGameStatus(Game $game, Session $session)
    {
        $sessions = $game->sessions;
        foreach ($sessions as $game_session) {
            if ($game_session->player_id == $game->first_player_id) {
                $first_player_session = $game_session;
            } else if ($game_session->player_id == $game->second_player_id) {
                $second_player_session = $game_session;
            }
        }
        $first_player_score = $first_player_session->score;
        $second_player_score = $second_player_session->score;

        if ($first_player_score > $second_player_score) {
            $winner = $game->firstPlayer;
            $loser = $game->secondPlayer;
        } elseif ($first_player_score < $second_player_score) {
            $winner = $game->secondPlayer;
            $loser = $game->firstPlayer;
        } else {
            $winner = null;
        }
        if (Carbon::now()->greaterThanOrEqualTo(Carbon::parse($session->finished_at))) {
            $status = 'Finished';
            if (isset($winner)) {
                $winner->update([
                    'rating' => $winner->rating + 10,
                ]);
                $loser->update([
                    'rating' => $loser->rating - 8,
                ]);
            }
            $game->update([
                'active' => 0,
            ]);
            $session->update([
                'active' => 0,
            ]);
            HistoryGame::upsert([
                'id' => $game->id,
                'started_at' => $session->started_at,
                'finished_at' => $session->finished_at,
                'first_player_id' => $game->first_player_id,
                'second_player_id' => $game->second_player_id,
                'winner_id' => is_null($winner) ? null : $winner->id,
                'first_player_score' => $first_player_score,
                'second_player_score' => $second_player_score,
            ], ['id']);
            $questions = $session->questions;
            foreach ($questions as $question) {
                HistorySessionQuestion::upsert([
                    'history_game_id' => $game->id,
                    'question_id' => $question->question_id,
                    'coefficients' => json_encode($question->coefficients),
                    'user_id' => $session->player_id,
                ], ['history_game_id', 'question_id', 'user_id']);
            }
        } else {
            $status = 'Ongoing';
        }
        $response = [
            'first_player_score' => $first_player_score,
            'second_player_score' => $second_player_score,
            'status' => $status,
            'winner' => $winner,
            'first_player_name' => $game->firstPlayer->name,
            'second_player_name' => $game->secondPlayer->name,
        ];
        return response()->json($response);
    }
}

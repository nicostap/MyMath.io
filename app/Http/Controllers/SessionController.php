<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\HistoryGame;
use App\Models\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SessionController extends Controller
{
    public function getGameStatus(Game $game, Session $session)
    {
        $sessions = $game->sessions;
        $second_player_session = $sessions[0]->id === $session->id ? $sessions[1] : $sessions[0];
        $first_player_score = $session->score;
        $second_player_score = $second_player_session->score;

        if ($first_player_score > $second_player_score) {
            $winner = $game->firstPlayer;
        } elseif ($first_player_score < $second_player_score) {
            $winner = $game->secondPlayer;
        } else {
            $winner = null;
        }
        if (Carbon::now()->greaterThanOrEqualTo($game->finishedAt)) {
            $status = 'Finished';
            HistoryGame::insert([
                'id' => $game->id,
                'started_at' => $game->started_at,
                'finished_at' => $game->finished_at,
                'first_player_id' => $game->first_player_id,
                'second_player_id' => $game->second_player_id,
                'winner_id' => is_null($winner) ? null : $winner->id,
                'first_player_score' => $first_player_score,
                'second_player_score' => $second_player_score,
            ]);
        } else {
            $status = 'Ongoing';
        }
        $response = [
            'first_player_score' => $first_player_score,
            'second_player_score' => $second_player_score,
            'status' => $status,
            'winner' => $winner,
        ];
        response()->json($response);
    }
}

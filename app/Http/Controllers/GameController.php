<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function connect(User $user)
    {
        $gameHosted = Game::join('users', 'games.first_player_id', '=', 'users.id')
            ->where('first_player_id', $user->id)
            ->first();
        $game = Game::join('users', 'games.first_player_id', '=', 'users.id')
            ->where('second_player_id', null)
            ->where('created_at', '>=', Carbon::now()->subSeconds(3))
            ->orderByRaw('ABS(users.rating - ?)', [$user->rating])
            ->lockForUpdate()
            ->first();
        if ($gameHosted && $gameHosted->second_player_id) {
            return response()->json($gameHosted);
        } else if ($game) {
            DB::transaction(function () use ($game, $user, $gameHosted) {
                if ($gameHosted) {
                    $gameHosted->delete();
                }

                $game->update([
                    'second_player_id' => $user->id,
                    'matched_at' => Carbon::now(),
                    'avg_rating' => ($user->rating + $game->firstPlayer->rating) / 2
                ]);
            });
            return response()->json($game);
        } else if (is_null($gameHosted)) {
            Game::insert([
                'first_player_id' => $user->id
            ]);
            return response()->noContent();
        } else {
            $gameHosted->update([
                'created_at' => Carbon::now()
            ]);
        }
        return response()->noContent();
    }

    public function start(Game $game, User $user)
    {
        $sessions = $game->sessions->toArray();
        $isSessionCreated = $sessions[0]->player_id === $user->id || $sessions[1]->player_id === $user->id;
        $session = $isSessionCreated ?
            ($sessions[0]->player_id === $user->id ?
                $sessions[0]
                : $sessions[1])
            : Session::create(['game_id' => $game->id, 'player_id' => $user->id]);
        if (count($sessions) > 1 || (count($sessions) === 1 && !$isSessionCreated)) {
            $session->update([
                'started_at' => Carbon::now(),
                'finished_at' => Carbon::now()->addMinute()->addSeconds(3),
            ]);
            $response = [
                'session' => $session,
                'status' => 'started'
            ];
        } else {
            if ($game->matched_at->lt(Carbon::now()->subSeconds(5))) {
                $game->delete();
                $response = [
                    'status' => 'aborted'
                ];
            } else {
                $response = [
                    'session' => $session,
                    'status' => 'waiting'
                ];
            }
        }
        return response()->json($response);
    }
}

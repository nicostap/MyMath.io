<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Game;
use App\Models\User;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index(User $user)
    {
        return view('game.index', ['user' => $user]);
    }

    public function connect(User $user)
    {
        return DB::transaction(function () use ($user) {
            $gameHosted = Game::all()
                ->where('first_player_id', $user->id)
                ->where('active', 1)
                ->first();

            $gameInProgress = Game::where(function ($query) use ($user) {
                $query->where('first_player_id', $user->id)
                    ->orWhere('second_player_id', $user->id);
            })
                ->where('matched_at', '>=', Carbon::now()->subMinute())
                ->where('active', 1)
                ->first();

            $game = Game::join('users', 'games.first_player_id', '=', 'users.id')
                ->select('games.*')
                ->where('first_player_id', '!=', $user->id)
                ->where('second_player_id', null)
                ->where('games.updated_at', '>=', Carbon::now()->subSeconds(3))
                ->where('games.active', 1)
                ->orderByRaw('ABS(users.rating - ?)', [$user->rating])
                ->first();

            if ($gameInProgress) {
                return response()->json($gameInProgress);
            } else if ($gameHosted && $gameHosted->second_player_id) {
                return response()->json($gameHosted);
            } else if ($game) {
                if ($gameHosted) {
                    $gameHosted->delete();
                }
                $game->update([
                    'second_player_id' => $user->id,
                    'matched_at' => Carbon::now(),
                    'avg_rating' => ($user->rating + $game->firstPlayer->rating) / 2
                ]);
                return response()->json($game);
            } else if (is_null($gameHosted)) {
                Game::insert([
                    'first_player_id' => $user->id
                ]);
                return response()->noContent();
            } else {
                $gameHosted->update([
                    'updated_at' => Carbon::now(),
                ]);
            }
            return response()->noContent();
        });
    }

    public function start(Game $game, User $user)
    {
        $sessions = $game->sessions;
        $isSessionCreated = false;
        $userSession = null;
        $count = 0;
        foreach ($sessions as $session) {
            if ($session->player_id == $user->id && !$isSessionCreated) {
                $isSessionCreated = true;
                $userSession = $session;
            }
            $count++;
        }
        if (!$isSessionCreated) {
            $userSession = Session::create(['game_id' => $game->id, 'player_id' => $user->id]);
        }
        if ($count > 1 || $count == 1 && !$isSessionCreated) {
            $firstOrSecond = $game->first_player_id == $user->id ? 'first' : 'second';

            $userSession->update([
                'started_at' => $userSession->started_at ? Carbon::parse($userSession->started_at) : Carbon::now(),
                'finished_at' => $userSession->finished_at ? Carbon::parse($userSession->finished_at) : Carbon::now()->addMinute()->addSecond(),
            ]);
            $response = [
                'session' => $userSession,
                'status' => 'started',
                'turn' => $firstOrSecond,
            ];
        } else {
            if (Carbon::parse($game->matched_at)->lt(Carbon::now()->subSeconds(5))) {
                $game->update([
                    'active' => 0,
                ]);
                $session->update([
                    'active' => 0,
                ]);
                $response = [
                    'status' => 'aborted'
                ];
            } else {
                $response = [
                    'session' => $userSession,
                    'status' => 'waiting'
                ];
            }
        }
        return response()->json($response);
    }
}

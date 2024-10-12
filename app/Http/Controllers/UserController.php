<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function leaderboard(User $user)
    {
        $players = User::where('active', 1)
            ->orderBy('rating', 'desc')
            ->limit(100)
            ->get(['id', 'name', 'rating']);
        return view('user.leaderboard', ['players' => $players, 'user' => $user]);
    }
}

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
        $ranks = ["Beginner", "Novice", "Advance", "Expert", "Legendary"];
        $beginners = User::where('active', 1)
            ->where('rating', '<=', 1499)
            ->orderBy('rating', 'desc')
            ->limit(100)
            ->get(['id', 'name', 'rating']);
        $novices = User::where('active', 1)
            ->where('rating', '>=', 1500)
            ->where('rating', '<=', 2499)
            ->orderBy('rating', 'desc')
            ->limit(100)
            ->get(['id', 'name', 'rating']);
        $advances = User::where('active', 1)
            ->where('rating', '>=', 2500)
            ->where('rating', '<=', 3999)
            ->orderBy('rating', 'desc')
            ->limit(100)
            ->get(['id', 'name', 'rating']);
        $experts = User::where('active', 1)
            ->where('rating', '>=', 4000)
            ->where('rating', '<=', 6499)
            ->orderBy('rating', 'desc')
            ->limit(100)
            ->get(['id', 'name', 'rating']);
        $legendaries = User::where('active', 1)
            ->where('rating', '>=', 6500)
            ->orderBy('rating', 'desc')
            ->limit(100)
            ->get(['id', 'name', 'rating']);
        $data = [
            $ranks[0] => $beginners, 
            $ranks[1] => $novices, 
            $ranks[2] => $advances, 
            $ranks[3] => $experts, 
            $ranks[4] => $legendaries
        ];
        return view('user.leaderboard', ["ranks" => $data, 'user' => $user]);
    }
}

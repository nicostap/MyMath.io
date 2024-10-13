<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.authentication.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
 
        return back()->with('loginError', 'Login Failed!');
    }

    public function registerView(){
        return view('user.authentication.register');
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'rating' => 'required'
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        

        User::create($validatedData);

        session()->flash('success', 'Registration successful! Please login');

        return redirect('/login');
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

    public function leaderboardAll()
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
        return view('user.leaderboardAll', ["ranks" => $data]);
    }
}

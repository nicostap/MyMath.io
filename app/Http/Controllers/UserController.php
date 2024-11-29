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
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function registerView()
    {
        return view('user.authentication.register');
    }

    public function register(Request $request)
    {
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

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'email' => 'email:dns|unique:users',
            'name' => '',
            'password' => ''
        ]);

        $user = User::find($user->id);

        if (isset($validatedData['name'])) $user->name = $validatedData['name'];
        if (isset($validatedData['email'])) $user->email = $validatedData['email'];
        if (isset($validatedData['password'])) $user->password = bcrypt($validatedData['password']);

        $user->save();

        session()->flash('success', 'Profile updated successfully!');
        return redirect()->back();
    }

    public function leaderboard(User $user)
    {
        $rank = "";
        if ($user->rating <= 1499) {
            $lowerBound = 0;
            $upperBound = 1499;
            $rank = "Beginner";
        } elseif ($user->rating >= 1500 & $user->rating <= 2499) {
            $lowerBound = 1500;
            $upperBound = 2499;
            $rank = "Novice";
        } elseif ($user->rating >= 2500 & $user->rating <= 3999) {
            $lowerBound = 2500;
            $upperBound = 3999;
            $rank = "Advance";
        } elseif ($user->rating >= 4000 & $user->rating <= 6499) {
            $lowerBound = 4000;
            $upperBound = 6499;
            $rank = "Expert";
        } elseif ($user->rating >= 6500) {
            $lowerBound = 6500;
            $upperBound = 999999999999;
            $rank = "Legendary";
        }
        $playerRank = User::where('rating', '>=', $lowerBound)
            ->where('rating', '<=', $upperBound)
            ->orderBy('rating', 'desc')
            ->get()->search(function ($player) use ($user) {
                return $player->id == $user->id;
            });
        $ranks = ["Beginner", "Novice", "Advance", "Expert", "Legendary"];
        $beginners = User::where('active', 1)
            ->where('rating', '<=', 1499)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $novices = User::where('active', 1)
            ->where('rating', '>=', 1500)
            ->where('rating', '<=', 2499)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $advances = User::where('active', 1)
            ->where('rating', '>=', 2500)
            ->where('rating', '<=', 3999)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $experts = User::where('active', 1)
            ->where('rating', '>=', 4000)
            ->where('rating', '<=', 6499)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $legendaries = User::where('active', 1)
            ->where('rating', '>=', 6500)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $data = [
            $ranks[0] => $beginners,
            $ranks[1] => $novices,
            $ranks[2] => $advances,
            $ranks[3] => $experts,
            $ranks[4] => $legendaries
        ];
        return view('user.leaderboard', ["ranks" => $data, 'user' => $user, 'player' => $playerRank, 'rank' => $rank]);
    }

    public function leaderboardAll()
    {
        $ranks = ["Beginner", "Novice", "Advance", "Expert", "Legendary"];
        $beginners = User::where('active', 1)
            ->where('rating', '<=', 1499)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $novices = User::where('active', 1)
            ->where('rating', '>=', 1500)
            ->where('rating', '<=', 2499)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $advances = User::where('active', 1)
            ->where('rating', '>=', 2500)
            ->where('rating', '<=', 3999)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $experts = User::where('active', 1)
            ->where('rating', '>=', 4000)
            ->where('rating', '<=', 6499)
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get(['id', 'name', 'rating']);
        $legendaries = User::where('active', 1)
            ->where('rating', '>=', 6500)
            ->orderBy('rating', 'desc')
            ->limit(10)
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

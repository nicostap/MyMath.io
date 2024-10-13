<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\HistoryGameController;
use App\Http\Controllers\SessionQuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::controller(GameController::class)->group(function () {
    Route::get('/game/{user}', 'index')->name('game.index');
    Route::post('/game/connect/{user}', 'connect')->name('game.connect');
    Route::post('/game/{game}/start/{user}', 'start')->name('game.start');
});

Route::get('/game/{game}/session/{session}/status', [SessionController::class, 'getGameStatus'])
    ->name('game.session.status');

Route::controller(SessionQuestionController::class)->group(function () {
    Route::get('/session/{session}/question', 'getQuestion')
        ->name('session.question.get');
    Route::post('/session-questions/{sessionQuestion}/answer', 'answer')
        ->name('session.question.answer');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/leaderboard/{user}', 'leaderboard')
        ->name('user.leaderboard.get');
    Route::get('/user/leaderboard', 'leaderboardAll')
        ->name('user.leaderboard.getAll');
});

Route::resource('history_game', HistoryGameController::class);
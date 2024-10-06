<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HistoryGameController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionQuestionController;
use Illuminate\Support\Facades\Route;

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

Route::resource('game', GameController::class);
Route::resource('session', SessionController::class);
Route::resource('session_question', SessionQuestionController::class);
Route::resource('history_game', HistoryGameController::class);
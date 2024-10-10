<?php

use App\Http\Controllers\API\GamesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GameTopScoresController;
use App\Http\Controllers\API\TopTotalScoresController;
use App\Http\Controllers\API\UserGameTopScoresController;
use App\Http\Controllers\API\UsersController;

Route::get('/games', [GamesController::class, 'index']);
Route::get('/games/{id}', [GamesController::class, 'show']);

Route::get('/game_scores', [GameTopScoresController::class, 'index']);
Route::get('/game_scores/{id}', [GameTopScoresController::class, 'show']);
Route::post('/game_scores', [GameTopScoresController::class, 'store']);

Route::get('/game_scores/user/{id}', [UserGameTopScoresController::class, 'show_by_user']);
Route::get('/game_scores/game/{id}', [UserGameTopScoresController::class, 'show_by_game']);

Route::get('/top_scores', [TopTotalScoresController::class, 'index']);

Route::get('/user/{id}', [UsersController::class, 'show']);

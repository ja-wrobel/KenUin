<?php

use App\Http\Controllers\API\GamesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GameTopScoresController;
use App\Http\Controllers\API\TopTotalScoresController;
use App\Http\Controllers\API\UsersController;

Route::get('/games', [GamesController::class, 'index']);
Route::get('/games/{id}', [GamesController::class, 'show']);

Route::get('/game_scores', [GameTopScoresController::class, 'index']);
Route::get('/game_scores/{id}', [GameTopScoresController::class, 'show']);
Route::post('/game_scores', [GameTopScoresController::class, 'store']);

Route::get('/top_scores', [TopTotalScoresController::class, 'index']);

Route::get('/user/{id}', [UsersController::class, 'show']);

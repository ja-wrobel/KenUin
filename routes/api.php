<?php

use App\Http\Controllers\API\GamesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GameTopScoresController;
use App\Http\Controllers\API\TopTotalScoresController;
use App\Http\Controllers\API\UserGameTopScoresController;
use App\Http\Controllers\API\UsersController;

    Route::middleware('cache.headers:public;max_age=600;etag')->group(function () {
        Route::get('/games', [GamesController::class, 'index']);
    });

    Route::get('/games/{game}', [GamesController::class, 'show']);

    Route::get('/game_scores', [GameTopScoresController::class, 'index']);
    Route::get('/game_scores/{game}', [GameTopScoresController::class, 'show']);
    Route::post('/game_scores', [GameTopScoresController::class, 'store']);

    Route::get('/game_scores/user/{user}', [UserGameTopScoresController::class, 'show']);

    Route::get('/top_scores', [TopTotalScoresController::class, 'index']);

    Route::get('/user/{user}', [UsersController::class, 'show']);

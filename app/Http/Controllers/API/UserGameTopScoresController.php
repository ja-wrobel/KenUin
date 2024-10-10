<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameTopScoreResource;
use App\Models\GameTopScore;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserGameTopScoresController extends Controller
{
    public function show_by_game(int $id): GameTopScoreResource|AnonymousResourceCollection|null
    {
        $scores = GameTopScore::where('game_id', $id)->get();

        if ($scores->count() <= 1) {
            $first = null;
            foreach ($scores as $score) {
                $first = $score;
            }
            return GameTopScoreResource::make($first);
        } else {
            return GameTopScoreResource::collection($scores);
        }
    }

    public function show_by_user(int $id): GameTopScoreResource|AnonymousResourceCollection|null
    {
        $scores = GameTopScore::where('user_id', $id)->get();

        if ($scores->count() <= 1) {
            $first = null;
            foreach ($scores as $score) {
                $first = $score;
            }
            return GameTopScoreResource::make($first);
        } else {
            return GameTopScoreResource::collection($scores);
        }
    }
}

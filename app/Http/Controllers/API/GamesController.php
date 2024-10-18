<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $games = Game::all();
        return GameResource::collection($games);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): GameResource
    {
        return GameResource::make($game);
    }
}

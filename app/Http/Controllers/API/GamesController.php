<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return GameResource::collection($games);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $game = Game::find($id);
        return GameResource::make($game);
    }
}

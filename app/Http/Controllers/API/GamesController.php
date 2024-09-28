<?php

namespace App\Http\Controllers\API;

use App\Models\Game;
use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // I don't think we need store, maybe it could be usefull if we create some admin role and panel for it
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $game = Game::find($id);
        return new GameResource($game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // same as with store
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // - || -
    }
}

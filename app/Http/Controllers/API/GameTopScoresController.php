<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Models\GameTopScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameTopScoreResource;
use App\Models\Game;
use App\Models\User;
use App\Rules\BetterThanWorstTopScore;
use App\Rules\BetterTimeOfEqualTopScore;
use App\Rules\LessTriesOfEqualTopScore;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GameTopScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $scores = GameTopScore::all();
        return GameTopScoreResource::collection($scores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): GameTopScoreResource
    {
        $entries = GameTopScore::where('game_id', $request->get('game_id'))->get();

        $rules = array(
            'user_id' => ['required', 'exists:users,id'],
            'game_id' => ['required', 'exists:games,id'],
            'score' => ['bail', 'required', 'decimal:0,2', 'between:1,9999999999.99', new BetterThanWorstTopScore($entries)],
            'time' => ['bail', 'required', 'integer', 'gte:0', new BetterTimeOfEqualTopScore($entries)],
            'tries' => ['bail', 'required', 'integer', 'gte:0', 'max:9', new LessTriesOfEqualTopScore($entries)],
            'score_date' => ['required', 'date', 'before:now'],
        );
        $request->validate($rules);

        $user = User::find($request->get('user_id'));
        $game = Game::find($request->get('game_id'));

        $new_score = new GameTopScore([
            'score' => $request->get('score'),
            'time' => $request->get('time'),
            'tries' => $request->get('tries'),
            'score_date' => $request->get('score_date'),
        ]);
        $new_score->user()->associate($user);
        $new_score->game()->associate($game);

        $new_score->save();

        return GameTopScoreResource::make($new_score);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): AnonymousResourceCollection
    {
        return GameTopScoreResource::collection($game->gameTopScores);
    }
}

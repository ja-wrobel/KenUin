<?php

namespace App\Http\Controllers\API;

use App\Models\GameTopScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameTopScoreResource;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class GameTopScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = GameTopScore::all();
        return GameTopScoreResource::collection($scores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entries = GameTopScore::where([
            ['user_id', '=', $request->get('user_id')],
            ['game_id', '=', $request->get('game_id')],
        ]);
        $entries_count = $entries->count();
        $request->merge([
            'worst_score' => '1',
            'worst_score_time' => '2147483647',
            'worst_score_tries' => '9',
        ]);
        if ($entries_count < 10 && $entries_count > 0) {
            $request['worst_score'] = $entries->min('score');
            $request['worst_score_time'] = $entries
                ->where('score', '=', $request->get('worst_score'))
                ->get('time')[0]->time;
            $request['worst_score_tries'] = $entries
                ->where('score', '=', $request->get('worst_score'))
                ->get('tries')[0]->tries;
        }

        $rules = array(
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:games,id',
            'score' => 'required|numeric|between:1,999999999999.99|gt:worst_score',
            'time' => 'required|integer|gte:1|lte:worst_score_time',
            'tries' => 'required|integer|gt:0|max:9|lte:worst_score_tries',
            'score_date' => 'required|date|before:now',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
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

            return redirect('/api/game_scores', 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $game_scores = GameTopScore::where('game_id', $id)->get();

        if ($game_scores->count() <= 1) {
            foreach ($game_scores as $game_score) {
                $first = $game_score;
            }
            return new GameTopScoreResource($first);
        } else {
            return GameTopScoreResource::collection($game_scores);
        }
    }
}

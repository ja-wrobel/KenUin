<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopTotalScoreResource;
use App\Models\TopTotalScore;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TopTotalScoresController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $scores = TopTotalScore::all();
        return TopTotalScoreResource::collection($scores);
    }
}

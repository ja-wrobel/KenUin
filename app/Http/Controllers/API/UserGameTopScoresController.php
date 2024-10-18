<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameTopScoreResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserGameTopScoresController extends Controller
{
    public function show(User $user): AnonymousResourceCollection
    {
        return GameTopScoreResource::collection($user->gameTopScores);
    }
}

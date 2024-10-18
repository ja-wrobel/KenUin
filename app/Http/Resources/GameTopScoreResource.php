<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameTopScoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => UserResource::make($this->user),
            'game_id' => GameResource::make($this->game),
            'score' => $this->score,
            'time' => $this->time,
            'tries' => $this->tries,
            'score_date' => $this->score_date->toISOString(),
        ];
    }
}

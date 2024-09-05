<?php

declare(strict_types=1);

namespace App\Models\RelationshipTraits;

use App\Models\UserGameScore;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read Collection<UserGameScore> $gameScores
 */
trait HasUserGameScores
{
    public function gameScores(): HasMany
    {
        return $this->hasMany(UserGameScore::class);
    }
}

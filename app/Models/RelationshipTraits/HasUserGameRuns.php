<?php

declare(strict_types=1);

namespace App\Models\RelationshipTraits;

use App\Models\UserGameRun;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read Collection<UserGameRun> $runs
 */
trait HasUserGameRuns
{
    public function userGameRuns(): HasMany
    {
        return $this->hasMany(UserGameRun::class);
    }
}

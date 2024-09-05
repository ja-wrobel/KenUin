<?php

declare(strict_types=1);

namespace App\Models\RelationshipTraits;

use App\Models\UserGameRun;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasUserGameRuns
{
    public function runs(): HasMany
    {
        return $this->hasMany(UserGameRun::class);
    }
}

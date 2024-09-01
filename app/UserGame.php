<?php
declare(strict_types=1);

namespace App;

use App\Models\UserGameRun;
use App\Models\UserGameScore;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserGame
{
    public function runs(): HasMany
    {
        return $this->hasMany(UserGameRun::class);
    }
    
    public function scores(): HasMany
    {
        return $this->hasMany(UserGameScore::class);
    }
}

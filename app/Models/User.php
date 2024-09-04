<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\RelationshipTraits\HasUserData;
use App\Models\RelationshipTraits\HasUserGameRuns;
use App\Models\RelationshipTraits\HasUserGameScores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use HasUserData;
    use HasUserGameRuns;
    use HasUserGameScores;
    use Notifiable;

    protected $fillable = [
        'nickname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function gameTopScores(): HasMany
    {
        return $this->hasMany(GameTopScore::class);
    }

    public function topTotalScores(): HasOne
    {
        return $this->hasOne(TopTotalScore::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

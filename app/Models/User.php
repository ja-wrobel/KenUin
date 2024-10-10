<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\RelationshipTraits\HasUserData;
use App\Models\RelationshipTraits\HasUserGameRuns;
use App\Models\RelationshipTraits\HasUserGameScores;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property-read int $id
 * @property string $nickname
 * @property string $email
 * @property-read Carbon|null $email_verified_at
 * @property string $password
 * @property-read string|null $remember_token
 * @property-read Carbon|null $created_at
 * @property-read Carbon|null $updated_at
 *
 * @property-read Collection<GameTopScore> $gameTopScores
 * @property-read null|TopTotalScore $topTotalScore
 */
class User extends Authenticatable
{
    use HasFactory;
    use HasUserData;
    use HasUserGameRuns;
    use HasUserGameScores;
    use Notifiable;
    use HasApiTokens;

    protected $fillable = [
        'nickname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function gameTopScores(): HasMany
    {
        return $this->hasMany(GameTopScore::class);
    }

    public function topTotalScore(): HasOne
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

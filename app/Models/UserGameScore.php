<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $user_id
 * @property-read int $game_id
 * @property float $score
 * @property int $score_time
 * @property int $score_tries
 * @property Carbon $score_date
 * @property-read Carbon|null $created_at
 * @property-read Carbon|null $updated_at
 *
 * @property-read User $user
 * @property-read Game $game
 */
class UserGameScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'score_time',
        'score_tries',
        'score_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
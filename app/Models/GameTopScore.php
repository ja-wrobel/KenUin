<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property-read int $user_id
 * @property-read int $game_id
 * @property float $score
 * @property int $time
 * @property int $tries
 * @property Carbon $score_date
 * @property-read Carbon|null $created_at
 * @property-read Carbon|null $updated_at
 *
 * @property-read User $user
 * @property-read Game $game
 */
class GameTopScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'time',
        'tries',
        'score_date',
    ];

    protected $casts = [
        'score_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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

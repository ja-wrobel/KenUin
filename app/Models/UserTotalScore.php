<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $user_id
 * @property float $total_score
 * @property-read Carbon|null $created_at
 * @property-read Carbon|null $updated_at
 *
 * @property-read User $user
 */
class UserTotalScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_score',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $user_id
 * @property bool $subscription
 * @property Carbon $subscription_until
 * @property-read Carbon|null $created_at
 * @property-read Carbon|null $updated_at
 *
 * @property-read User $user
 */
class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription',
        'subscription_until',
    ];

    protected $casts = [
        'subscription_until' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

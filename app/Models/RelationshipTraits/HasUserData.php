<?php

declare(strict_types=1);

namespace App\Models\RelationshipTraits;

use App\Models\UserSubscription;
use App\Models\UserTotalScore;
use App\Models\UserWallet;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasUserData
{
    public function subscriptions(): HasOne
    {
        return $this->hasOne(UserSubscription::class);
    }

    public function scores(): HasOne
    {
        return $this->hasOne(UserTotalScore::class);
    }

    public function wallets(): HasOne
    {
        return $this->hasOne(UserWallet::class);
    }
}

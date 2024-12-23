<?php

declare(strict_types=1);

namespace App\Models\RelationshipTraits;

use App\Models\UserSubscription;
use App\Models\UserTotalScore;
use App\Models\UserWallet;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read UserSubscription|null $userSubscription
 * @property-read UserTotalScore|null $userTotalScore
 * @property-read UserWallet|null $userWallet
 */
trait HasUserData
{
    public function userSubscription(): HasOne
    {
        return $this->hasOne(UserSubscription::class);
    }

    public function userTotalScore(): HasOne
    {
        return $this->hasOne(UserTotalScore::class);
    }

    public function userWallet(): HasOne
    {
        return $this->hasOne(UserWallet::class);
    }
}

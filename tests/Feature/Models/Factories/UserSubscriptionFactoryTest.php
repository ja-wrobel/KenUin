<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\User;
use App\Models\UserSubscription;
use Database\Factories\UserSubscriptionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use DateTime;

#[CoversClass(UserSubscriptionFactory::class)]
class UserSubscriptionFactoryTest extends TestCase
{
    use RefreshDatabase;

    private UserSubscriptionFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(UserSubscriptionFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        /** @var UserSubscription $model */
        $model = $this->factory
            ->for(User::factory())
            ->createOne();

        $this->assertInstanceOf(UserSubscription::class, $model);
        $this->assertIsBool($model->subscription);
        $this->assertInstanceOf(DateTime::class, $model->subscription_until);
    }
}

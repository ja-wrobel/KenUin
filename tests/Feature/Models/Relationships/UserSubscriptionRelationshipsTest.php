<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Relationships;

use App\Models\User;
use App\Models\UserSubscription;
use Database\Factories\UserSubscriptionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserSubscription::class)]
class UserSubscriptionRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    private UserSubscriptionFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = UserSubscription::factory()
            ->for(User::factory());
    }

    #[Test]
    public function test_user_belongs_to(): void
    {
        $this->user($this->factory);
    }
}

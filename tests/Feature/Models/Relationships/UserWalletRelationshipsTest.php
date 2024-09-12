<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Relationships;

use App\Models\User;
use App\Models\UserWallet;
use Database\Factories\UserWalletFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserWallet::class)]
class UserWalletRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    private UserWalletFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = UserWallet::factory()
            ->for(User::factory());
    }

    #[Test]
    public function test_user_belongs_to(): void
    {
        $this->user($this->factory);
    }
}

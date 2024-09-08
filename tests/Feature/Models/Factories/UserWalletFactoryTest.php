<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\User;
use App\Models\UserWallet;
use Database\Factories\UserWalletFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserWalletFactory::class)]
class UserWalletFactoryTest extends TestCase
{
    use RefreshDatabase;

    private UserWalletFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(UserWalletFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        $user = User::factory()->createOne();

        /** @var UserWallet $model */
        $model = $this->factory->createOne([
            'user_id' => $user->id,
        ]);
        $this->assertInstanceOf(UserWallet::class, $model);
        $this->assertIsInt($model->nuins_currency);
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserFactory::class)]
class UserFactoryTest extends TestCase
{
    use RefreshDatabase;

    private UserFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(abstract: UserFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        $now = now();
        Carbon::setTestNow(testNow: $now);

        /** @var User $model */
        $model = $this->factory->createOne();
        $this->assertInstanceOf(expected: User::class, actual: $model);
        $this->assertIsString(actual: $model->nickname);
        $this->assertIsString(actual: $model->email);
        $this->assertEquals(
            expected: $now->toIso8601String(),
            actual: $model->email_verified_at->toIso8601String()
        );
        $this->assertIsString(actual: $model->password);
        $this->assertIsString(actual: $model->remember_token);
    }
}

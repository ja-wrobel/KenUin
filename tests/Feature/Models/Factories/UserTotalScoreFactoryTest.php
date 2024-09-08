<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\User;
use App\Models\UserTotalScore;
use Database\Factories\UserTotalScoreFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserTotalScoreFactory::class)]
class UserTotalScoreFactoryTest extends TestCase
{
    use RefreshDatabase;

    private UserTotalScoreFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(UserTotalScoreFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        $user = User::factory()->createOne();

        /** @var UserTotalScore $model */
        $model = $this->factory->createOne([
            'user_id' => $user->id,
        ]);
        $this->assertInstanceOf(UserTotalScore::class, $model);
        $this->assertIsFloat($model->total_score);
    }
}

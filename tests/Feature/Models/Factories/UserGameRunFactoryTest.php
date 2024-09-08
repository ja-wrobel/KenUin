<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\Game;
use App\Models\User;
use App\Models\UserGameRun;
use Database\Factories\UserGameRunFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserGameRunFactory::class)]
class UserGameRunFactoryTest extends TestCase
{
    use RefreshDatabase;

    private UserGameRunFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(UserGameRunFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        $user = User::factory()->createOne();
        $game = Game::factory()->createOne();

        /** @var UserGameRun $model */
        $model = $this->factory->createOne([
            'user_id' => $user->id,
            'game_id' => $game->id,
        ]);
        $this->assertInstanceOf(UserGameRun::class, $model);
        $this->assertIsInt($model->official_runs);
        $this->assertIsInt($model->test_runs);
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Relationships;

use App\Models\Game;
use App\Models\GameTopScore;
use App\Models\User;
use Database\Factories\GameTopScoreFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GameTopScore::class)]
class GameTopScoreRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    private GameTopScoreFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = GameTopScore::factory()
            ->for(User::factory())
            ->for(Game::factory());
    }

    #[Test]
    public function user(): void
    {
        /** @var User $user */
        $user = User::factory()
            ->has($this->factory)
            ->createOne();
        $model = $this->factory->for($user)->createOne();

        $this->assertInstanceOf(
            User::class,
            $model->user,
        );
        $this->assertEquals(
            $model->user_id,
            $user->id,
        );
    }

    #[Test]
    public function game(): void
    {
        /** @var Game $game */
        $game = Game::factory()
            ->has($this->factory)
            ->createOne();
        $model = $this->factory->for($game)->createOne();

        $this->assertInstanceOf(
            Game::class,
            $model->game,
        );
        $this->assertEquals(
            $model->game_id,
            $game->id,
        );
    }
}

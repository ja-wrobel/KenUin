<?php

namespace Tests\Feature\Models\Relationships;

use App\Models\UserGameRun;
use App\Models\GameTopScore;
use App\Models\Game;
use App\Models\User;
use App\Models\UserGameScore;
use PHPUnit\Framework\Attributes\CoversClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(Game::class)]
class GameRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    private Game $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Game::factory()->createOne();
    }

    #[Test]
    public function game_top_scores(): void
    {
        /** @var GameTopScore $gameTopScore */
        $gameTopScore = GameTopScore::factory()
            ->for($this->model)
            ->for(User::factory())
            ->createOne();

        $this->assertInstanceOf(
            expected: GameTopScore::class,
            actual: $this->model->gameTopScore->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $gameTopScore->game_id
        );
    }

    #[Test]
    public function runs(): void
    {
        /** @var UserGameRun $userGameRun */
        $userGameRun = UserGameRun::factory()
            ->for($this->model)
            ->for(User::factory())
            ->createOne();

        $this->assertInstanceOf(
            UserGameRun::class,
            $this->model->runs->first()
        );
        $this->assertEquals(
            $this->model->id,
            $userGameRun->game_id
        );
    }

    #[Test]
    public function user_game_scores(): void
    {
        /** @var UserGameScore $userGameScore */
        $userGameScore = UserGameScore::factory()
            ->for($this->model)
            ->for(User::factory())
            ->createOne();

        $this->assertInstanceOf(
            UserGameScore::class,
            $this->model->userGameScores->first()
        );
        $this->assertEquals(
            $this->model->id,
            $userGameScore->game_id
        );
    }
}

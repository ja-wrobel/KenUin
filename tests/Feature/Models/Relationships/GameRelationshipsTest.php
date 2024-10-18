<?php

declare(strict_types=1);

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
        /** @var Collection<GameTopScore> $game_top_scores */
        $game_top_scores = GameTopScore::factory()
            ->for($this->model)
            ->for(User::factory())
            ->count(5)
            ->create();

        $this->assertInstanceOf(
            expected: GameTopScore::class,
            actual: $this->model->gameTopScores->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $game_top_scores[0]->game_id
        );
    }

    #[Test]
    public function runs(): void
    {
        /** @var Collection<UserGameRun> $user_game_runs */
        $user_game_runs = UserGameRun::factory()
            ->for($this->model)
            ->for(User::factory())
            ->count(5)
            ->create();

        $this->assertInstanceOf(
            UserGameRun::class,
            $this->model->userGameRuns->first()
        );
        $this->assertEquals(
            $this->model->id,
            $user_game_runs[0]->game_id
        );
    }

    #[Test]
    public function user_game_scores(): void
    {
        /** @var Collection<UserGameScore> $user_game_scores */
        $user_game_scores = UserGameScore::factory()
            ->for($this->model)
            ->for(User::factory())
            ->count(5)
            ->create();

        $this->assertInstanceOf(
            UserGameScore::class,
            $this->model->userGameScores->first()
        );
        $this->assertEquals(
            $this->model->id,
            $user_game_scores[0]->game_id
        );
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Relationships;

use App\Models\Game;
use App\Models\GameTopScore;
use App\Models\TopTotalScore;
use App\Models\User;
use App\Models\UserGameRun;
use App\Models\UserGameScore;
use App\Models\UserSubscription;
use App\Models\UserTotalScore;
use App\Models\UserWallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(User::class)]
class UserRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    private User $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = User::factory()->createOne();
    }

    #[Test]
    public function game_top_scores(): void
    {
        /** @var Collection<GameTopScore> $game_top_scores */
        $game_top_scores = GameTopScore::factory()
            ->for($this->model)
            ->for(Game::factory())
            ->count(5)
            ->create();

        $this->assertInstanceOf(
            expected: GameTopScore::class,
            actual: $this->model->gameTopScores->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $game_top_scores[0]->user_id
        );
    }

    #[Test]
    public function top_total_score(): void
    {
        /** @var TopTotalScore $top_total_score */
        $top_total_score = TopTotalScore::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: TopTotalScore::class,
            actual: $this->model->topTotalScore
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $top_total_score->user_id
        );
    }

    #[Test]
    public function user_subscription(): void
    {
        /** @var UserSubscription $subscription */
        $subscription = UserSubscription::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: UserSubscription::class,
            actual: $this->model->userSubscription
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $subscription->user_id
        );
    }

    #[Test]
    public function user_total_score(): void
    {
        /** @var UserTotalScore $score */
        $score = UserTotalScore::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: UserTotalScore::class,
            actual: $this->model->userTotalScore
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $score->user_id
        );
    }

    #[Test]
    public function user_wallet(): void
    {
        /** @var UserWallet $wallet */
        $wallet = UserWallet::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: UserWallet::class,
            actual: $this->model->userWallet
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $wallet->user_id
        );
    }

    #[Test]
    public function user_game_runs(): void
    {
        /** @var Collection<UserGameRun> $runs */
        $runs = UserGameRun::factory()
            ->for($this->model)
            ->for(Game::factory())
            ->count(5)
            ->create();

        $this->assertInstanceOf(
            expected: UserGameRun::class,
            actual: $this->model->userGameRuns->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $runs[0]->user_id
        );
    }

    #[Test]
    public function user_game_scores(): void
    {
        /** @var Collection<UserGameScore> $game_scores */
        $game_scores = UserGameScore::factory()
            ->for($this->model)
            ->for(Game::factory())
            ->count(5)
            ->create();

        $this->assertInstanceOf(
            expected: UserGameScore::class,
            actual: $this->model->userGameScores->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $game_scores[0]->user_id
        );
    }
}

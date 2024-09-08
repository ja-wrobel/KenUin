<?php

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
        /** @var GameTopScore $gameTopScore */
        $gameTopScore = GameTopScore::factory()
            ->for($this->model)
            ->for(Game::factory())
            ->createOne();

        $this->assertInstanceOf(
            expected: GameTopScore::class,
            actual: $this->model->gameTopScores->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $gameTopScore->user_id
        );
    }

    #[Test]
    public function top_total_score(): void
    {
        /** @var TopTotalScore $topTotalScore */
        $topTotalScore = TopTotalScore::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: TopTotalScore::class,
            actual: $this->model->topTotalScore
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $topTotalScore->user_id
        );
    }

    #[Test]
    public function subscription(): void
    {
        /** @var UserSubscription $subscription */
        $subscription = UserSubscription::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: UserSubscription::class,
            actual: $this->model->subscription
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $subscription->user_id
        );
    }

    #[Test]
    public function score(): void
    {
        /** @var UserTotalScore $score */
        $score = UserTotalScore::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: UserTotalScore::class,
            actual: $this->model->score
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $score->user_id
        );
    }

    #[Test]
    public function wallet(): void
    {
        /** @var UserWallet $wallet */
        $wallet = UserWallet::factory()
            ->for($this->model)
            ->createOne();

        $this->assertInstanceOf(
            expected: UserWallet::class,
            actual: $this->model->wallet
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $wallet->user_id
        );
    }

    #[Test]
    public function runs(): void
    {
        /** @var UserGameRun $run */
        $run = UserGameRun::factory()
            ->for($this->model)
            ->for(Game::factory())
            ->createOne();

        $this->assertInstanceOf(
            expected: UserGameRun::class,
            actual: $this->model->runs->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $run->user_id
        );
    }

    #[Test]
    public function userGameScores(): void
    {
        /** @var UserGameScore $gameScore */
        $gameScore = UserGameScore::factory()
            ->for($this->model)
            ->for(Game::factory())
            ->createOne();

        $this->assertInstanceOf(
            expected: UserGameScore::class,
            actual: $this->model->userGameScores->first()
        );
        $this->assertEquals(
            expected: $this->model->id,
            actual: $gameScore->user_id
        );
    }
}

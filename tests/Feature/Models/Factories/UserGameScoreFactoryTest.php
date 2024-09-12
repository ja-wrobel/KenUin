<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\Game;
use App\Models\User;
use App\Models\UserGameScore;
use Database\Factories\UserGameScoreFactory;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserGameScoreFactory::class)]
class UserGameScoreFactoryTest extends TestCase
{
    use RefreshDatabase;

    private UserGameScoreFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(UserGameScoreFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        /** @var UserGameScore $model */
        $model = $this->factory
            ->for(User::factory())
            ->for(Game::factory())
            ->createOne();

        $this->assertInstanceOf(UserGameScore::class, $model);
        $this->assertIsFloat($model->score);
        $this->assertIsInt($model->score_time);
        $this->assertIsInt($model->score_tries);
        $this->assertInstanceOf(DateTime::class, $model->score_date);
    }
}

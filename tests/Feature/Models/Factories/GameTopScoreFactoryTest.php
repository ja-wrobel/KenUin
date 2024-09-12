<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\GameTopScore;
use App\Models\User;
use App\Models\Game;
use Database\Factories\GameTopScoreFactory;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Support\Carbon;

#[CoversClass(GameTopScoreFactory::class)]
class GameTopScoreFactoryTest extends TestCase
{
    use RefreshDatabase;

    private GameTopScoreFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(GameTopScoreFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        /** @var GameTopScore $model */
        $model = $this->factory
            ->for(User::factory())
            ->for(Game::factory())
            ->createOne();

        $this->assertInstanceOf(GameTopScore::class, $model);
        $this->assertIsFloat($model->score);
        $this->assertIsInt($model->time);
        $this->assertIsInt($model->tries);
        $this->assertInstanceOf(DateTime::class, $model->score_date);
    }

}

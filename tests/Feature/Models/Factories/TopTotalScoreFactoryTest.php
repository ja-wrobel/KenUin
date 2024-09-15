<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\TopTotalScore;
use App\Models\User;
use Database\Factories\TopTotalScoreFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(TopTotalScoreFactory::class)]
class TopTotalScoreFactoryTest extends TestCase
{
    use RefreshDatabase;

    private TopTotalScoreFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(TopTotalScoreFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        /** @var TopTotalScore $model */
        $model = $this->factory
            ->for(User::factory())
            ->createOne();

        $this->assertInstanceOf(TopTotalScore::class, $model);
        $this->assertIsFloat($model->total_score);
    }
}

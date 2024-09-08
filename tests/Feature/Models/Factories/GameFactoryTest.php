<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Factories;

use App\Models\Game;
use Carbon\Carbon;
use Database\Factories\GameFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GameFactory::class)]
class GameFactoryTest extends TestCase
{
    use RefreshDatabase;

    private GameFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = $this->app->make(abstract: GameFactory::class);
    }

    #[Test]
    public function create_model(): void
    {
        /** @var Game $model*/
        $model = $this->factory->createOne();
        $this->assertInstanceOf(Game::class, $model);
        $this->assertIsString($model->name);
        $this->assertIsString($model->type);
        $this->assertIsString($model->description);
        $this->assertIsString($model->dir_path);
    }
}

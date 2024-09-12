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
    public function test_user_belongs_to(): void
    {
        $this->user($this->factory);
    }

    #[Test]
    public function test_game_belongs_to(): void
    {
        $this->game($this->factory);
    }
}

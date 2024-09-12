<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Relationships;

use App\Models\Game;
use App\Models\User;
use App\Models\UserGameScore;
use Database\Factories\UserGameScoreFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserGameScore::class)]
class UserGameScoreRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    private UserGameScoreFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = UserGameScore::factory()
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

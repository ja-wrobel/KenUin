<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Seeders;

use Database\Seeders\GameSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GameSeeder::class)]
class GameSeederTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    #[Test]
    public function game_seeder(): void
    {
        $this->expectsDatabaseQueryCount(12);
        $this->assertDatabaseEmpty('games');
        $this->seed(GameSeeder::class);
        $this->assertDatabaseCount('games', 10);
    }
}

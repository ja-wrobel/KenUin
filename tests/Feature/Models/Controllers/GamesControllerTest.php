<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\GamesController;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GamesController::class)]
class GamesControllerTest extends TestCase
{
    use RefreshDatabase;

    private Game $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Game::factory()->createOne();
    }

    #[Test]
    public function get_all_games(): void
    {
        $response = $this->get('/api/games');

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $response->assertDontSee('dir_path');
    }

    #[Test]
    public function get_game(): void
    {
        $response = $this->get('/api/games/1');

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $response->assertDontSee('dir_path');
    }
}

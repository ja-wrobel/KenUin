<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\GamesController;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GamesController::class)]
class GamesControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection $models;

    protected function setUp(): void
    {
        parent::setUp();
        $this->models = Game::factory()->count(10)->create();
    }

    #[Test]
    public function get_all_games(): void
    {
        $response = $this->get('/api/games');
        $collection = GameResource::collection($this->models);

        $response_json = json_decode($response->getContent(), true);
        $resource_json = json_decode($collection->toJson(), true);

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $this->assertEquals(
            $resource_json,
            $response_json['data'],
        );
    }

    #[Test]
    public function get_game(): void
    {
        $first_id = $this->models->first()->id;
        $response = $this->get('/api/games/'.strval($first_id));
        $resource = GameResource::make(Game::find($first_id));

        $response_json = json_decode($response->getContent(), true);
        $resource_json = json_decode($resource->toJson(), true);

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $this->assertEquals(
            $resource_json,
            $response_json['data'],
        );
    }
}

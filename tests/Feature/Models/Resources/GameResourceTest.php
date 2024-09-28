<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Resources;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Http\Request;

#[CoversClass(GameResource::class)]
class GameResourceTest extends TestCase
{
    use RefreshDatabase;

    private Game $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = Game::factory()->createOne();
    }
/*
    public function test_game_resource(): void
    {
        $game = Game::first();
        $resource = new GameResource($game);
        $request = Request::create('/api/games', 'GET');

        $data = $this->getJson('/api/games');
        dd($resource->response($request)->getData(true));
        $data->assertExactJson([
                $resource->response($request)->getData(true), // I don't understand why it doesn't return same as in dump&die
            ]); // also when I make it work as Resource::collection, then it doesn't match because in $resource there is one more array
    }*/
}

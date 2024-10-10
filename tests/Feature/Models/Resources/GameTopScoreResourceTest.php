<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Resources;

use App\Http\Resources\GameResource;
use App\Http\Resources\GameTopScoreResource;
use App\Http\Resources\UserResource;
use App\Models\Game;
use App\Models\GameTopScore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GameTopScoreResource::class)]
class GameTopScoreResourceTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Game $game;
    private GameTopScore $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->createOne();
        $this->game = Game::factory()->createOne();
        $this->model = GameTopScore::factory()
            ->for($this->user)
            ->for($this->game)
            ->createOne();
    }

    #[Test]
    public function game_top_score_resource(): void
    {
        $model_array = $this->model->toArray();
        $resource_array = GameTopScoreResource::make($this->model)->toArray(new Request);

        $this->assertIsArray($resource_array);
        $this->assertInstanceOf(
            UserResource::class,
            $resource_array['user_id'],
        );
        $this->assertInstanceOf(
            GameResource::class,
            $resource_array['game_id'],
        );
        $this->assertIsString($resource_array['score_date']);
        $this->assertArrayNotHasKey(
            'password',
            $resource_array['user_id']->toArray(new Request),
        );
        $this->assertArrayNotHasKey(
            'remember_token',
            $resource_array['user_id']->toArray(new Request),
        );
        $this->assertArrayNotHasKey(
            'dir_path',
            $resource_array['game_id']->toArray(new Request),
        );
        $this->assertArrayIsEqualToArrayIgnoringListOfKeys(
            $model_array,
            $resource_array,
            ['created_at', 'updated_at', 'user_id', 'game_id'],
        );
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Resources;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

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

    #[Test]
    public function game_resource(): void
    {
        $model_array = $this->model->toArray();
        $resource = GameResource::make($this->model);
        $resource_array = $resource->toArray(new Request);

        $this->assertIsArray($resource_array);
        $this->assertArrayNotHasKey(
            'dir_path',
            $resource_array,
        );
        $this->assertArrayIsEqualToArrayIgnoringListOfKeys(
            $model_array,
            $resource_array,
            ['created_at', 'updated_at'],
        );
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Resources;

use App\Http\Resources\TopTotalScoreResource;
use App\Http\Resources\UserResource;
use App\Models\TopTotalScore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(TopTotalScoreResource::class)]
class TopTotalScoreResourceTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private TopTotalScore $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->createOne();
        $this->model = TopTotalScore::factory()
            ->for($this->user)
            ->createOne();
    }

    #[Test]
    public function top_total_score_resource(): void
    {
        $model_array = $this->model->toArray();
        $resource_array = TopTotalScoreResource::make($this->model)->toArray(new Request());

        $this->assertIsArray($resource_array);
        $this->assertInstanceOf(
            UserResource::class,
            $resource_array['user_id'],
        );
        $this->assertArrayNotHasKey(
            'password',
            $resource_array['user_id']->toArray(new Request()),
        );
        $this->assertArrayIsEqualToArrayIgnoringListOfKeys(
            $model_array,
            $resource_array,
            ['user_id', 'created_at', 'updated_at'],
        );
    }
}

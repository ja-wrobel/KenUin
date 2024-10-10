<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\TopTotalScoresController;
use App\Http\Resources\TopTotalScoreResource;
use App\Models\TopTotalScore;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(TopTotalScoresController::class)]
class TopTotalScoresControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection $users;
    private Collection $models;

    protected function setUp(): void
    {
        parent::setUp();
        $this->models = new Collection();

        $this->users = User::factory()
            ->count(10)
            ->create();
        foreach($this->users as $user){
            $model = TopTotalScore::factory()
                ->for($user)
                ->createOne();
            $this->models->push($model);
        }
    }

    #[Test]
    public function get_all_top_scores(): void
    {
        $response = $this->get('/api/top_scores');
        $collection = TopTotalScoreResource::collection($this->models);

        $response_json = json_decode($response->getContent(), true);
        $resource_json = json_decode($collection->toJson(), true);

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $this->assertEquals(
            $resource_json,
            $response_json['data'],
        );
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\UserGameTopScoresController;
use App\Http\Resources\GameTopScoreResource;
use App\Models\Game;
use App\Models\GameTopScore;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserGameTopScoresController::class)]
class UserGameTopScoresControllerTest extends TestCase
{
    use RefreshDatabase;

    private Collection $users;
    private Collection $games;
    private Collection $models;

    protected function setUp(): void
    {
        parent::setUp();
        $this->models = new Collection();

        $this->users = User::factory()->count(3)->create();
        $this->games = Game::factory()->count(3)->create();
        foreach($this->users as $user){
            foreach($this->games as $game){
                $model = GameTopScore::factory()
                    ->for($user)
                    ->for($game)
                    ->count(10)
                    ->create();
                $this->models->push($model);
            }
        }

    }

    #[Test]
    public function get_scores_by_game(): void
    {
        $response = $this->get('api/game_scores/game/1');
        $all_game_scores = $this->get('api/game_scores');

        $find_by_game_id = GameTopScore::where('game_id', 1)->get();
        $collection = GameTopScoreResource::collection($find_by_game_id);

        $response_json = json_decode($response->getContent(), true);
        $all_as_json = json_decode($all_game_scores->getContent(), true);
        $resource_json = json_decode($collection->toJson(), true);

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $this->assertEquals(
            $resource_json,
            $response_json['data'],
        );
        $this->assertNotEquals(
            $response_json['data'],
            $all_as_json['data'],
        );
    }

    #[Test]
    public function get_scores_by_user(): void
    {
        $response = $this->get('api/game_scores/user/1');
        $all_game_scores = $this->get('api/game_scores');

        $find_by_user_id = GameTopScore::where('user_id', 1)->get();
        $collection = GameTopScoreResource::collection($find_by_user_id);

        $response_json = json_decode($response->getContent(), true);
        $all_as_json = json_decode($all_game_scores->getContent(), true);
        $resource_json = json_decode($collection->toJson(), true);

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $this->assertEquals(
            $resource_json,
            $response_json['data'],
        );
        $this->assertNotEquals(
            $response_json['data'],
            $all_as_json['data'],
        );
    }
}

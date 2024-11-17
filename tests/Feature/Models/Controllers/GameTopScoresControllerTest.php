<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\GameTopScoresController;
use App\Http\Resources\GameTopScoreResource;
use App\Models\Game;
use App\Models\GameTopScore;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(GameTopScoresController::class)]
class GameTopScoresControllerTest extends TestCase
{
    use RefreshDatabase;

    private Game $game;
    private User $user;
    private Collection $models;


    protected function setUp(): void
    {
        parent::setUp();
        $this->game = Game::factory()->createOne();
        $this->user = User::factory()->createOne();
        $this->models = GameTopScore::factory()
            ->for($this->game)
            ->for($this->user)
            ->count(15)->create();
    }

    #[Test]
    public function get_all_game_scores(): void
    {
        $response = $this->get('/api/game_scores');
        $collection = GameTopScoreResource::collection($this->models);

        $response_json = json_decode($response->getContent(), true);
        $collection_json = json_decode($collection->toJson(), true);

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $this->assertEquals(
            $collection_json,
            $response_json['data'],
        );
    }

    #[Test]
    public function post_game_score(): void
    {
        $before_post = $this->get('/api/game_scores');
        $request = $this->post('/api/game_scores', [
            'user_id' => strval($this->user->id),
            'game_id' => strval($this->game->id),
            'score' => '9999999999.99',
            'time' => '0',
            'tries' => '0',
            'score_date' => '1985-08-12 19:37:56',
        ]);

        $request->assertStatus(201);

        $after_post = $this->get('/api/game_scores');
        $this->assertNotEquals(
            $before_post->getContent(),
            $after_post->getContent(),
        );

        // test validation
        $bad_request = $this->post('/api/game_scores', [
            'user_id' => strval($this->user->id),
            'game_id' => strval($this->game->id),
            'score' => '1',
            'time' => '100',
            'tries' => '9',
            'score_date' => '1985-08-12 19:37:56',
        ]);
        $bad_request->assertStatus(302);

        $after_bad_post = $this->get('api/game_scores');
        $this->assertEquals(
            $after_post->getContent(),
            $after_bad_post->getContent(),
        );
    }

    #[Test]
    public function get_game_scores_by_game(): void
    {
        $response = $this->get('/api/game_scores/'.strval($this->game->id));
        $resource = GameTopScoreResource::collection(
            $this->game->gameTopScores
        );

        $resource_json = json_decode($resource->toJson(), true);
        $response_json = json_decode($response->getContent(), true);

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
        $this->assertEquals(
            $resource_json,
            $response_json['data'],
        );
    }
}

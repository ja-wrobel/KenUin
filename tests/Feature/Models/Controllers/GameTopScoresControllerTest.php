<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\GameTopScoresController;
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

    private Game $game_one_model;
    private User $user_model;
    private Collection $models;


    protected function setUp(): void
    {
        parent::setUp();
        $this->game_one_model = Game::factory()->createOne();
        $this->user_model = User::factory()->createOne();
        GameTopScore::factory()
            ->for($this->game_one_model)
            ->for($this->user_model)
            ->count(5)->create();
    }

    #[Test]
    public function get_all_game_scores(): void
    {
        $response = $this->get('/api/game_scores');

        $response->assertStatus(200);
        $this->assertJson($response->getContent());
    }

    #[Test]
    public function post_game_score(): void
    {
        $before_post = $this->get('/api/game_scores');
        $request = $this->post('/api/game_scores', [
            'user_id' => '1',
            'game_id' => '1',
            'score' => '999999999999.99',
            'time' => '1',
            'tries' => '1',
            'score_date' => '1985-08-12 19:37:56',
        ]);

        $request->assertStatus(201);

        $after_post = $this->get('/api/game_scores');
        $this->assertNotEquals(
            $before_post->getContent(),
            $after_post->getContent(),
        );
    }

    #[Test]
    public function get_game_scores(): void
    {
        $response_one = $this->get('/api/game_scores/1');

        $response_one->assertStatus(200);
        $this->assertJson($response_one->getContent());

    }
}

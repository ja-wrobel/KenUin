<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\TopTotalScoresController;
use App\Models\TopTotalScore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

#[CoversClass(TopTotalScoresController::class)]
class TopTotalScoresControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user_model;
    private TopTotalScore $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user_model = User::factory()->createOne();
        $this->model = TopTotalScore::factory()
            ->for($this->user_model)
            ->createOne();
    }

    #[Test]
    public function get_all_top_scores(): void
    {
        $response = $this->get('/api/top_scores');

        $response->assertStatus(200);
        assertJson($response->getContent());
    }
}

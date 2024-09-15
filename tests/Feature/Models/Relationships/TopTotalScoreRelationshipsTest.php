<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Relationships;

use App\Models\TopTotalScore;
use App\Models\User;
use Database\Factories\TopTotalScoreFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(TopTotalScore::class)]
class TopTotalScoreRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    private TopTotalScoreFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = TopTotalScore::factory()
            ->for(User::class);
    }

    #[Test]
    public function user(): void
    {
        /** @var User $user */
        $user = User::factory()
            ->has($this->factory)
            ->createOne();
        $model = $this->factory->for($user)->createOne();

        $this->assertInstanceOf(
            User::class,
            $model->user,
        );
        $this->assertEquals(
            $model->user_id,
            $user->id,
        );
    }
}

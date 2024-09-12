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
    public function test_user_belongs_to(): void
    {
        $this->user($this->factory);
    }
}

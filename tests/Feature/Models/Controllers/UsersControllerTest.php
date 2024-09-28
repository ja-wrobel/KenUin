<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\UsersController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UsersController::class)]
class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        User::factory()->createOne();
    }

    #[Test]
    public function get_user(): void
    {
        $request = $this->get('/api/user/1');

        $request->assertStatus(200);
        $this->assertJson($request->getContent());
    }
}

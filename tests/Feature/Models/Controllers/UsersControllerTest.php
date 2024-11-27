<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Controllers;

use App\Http\Controllers\API\UsersController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UsersController::class)]
class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = User::factory()->createOne();
    }

    #[Test]
    public function get_user(): void
    {
        $request = $this->get('/api/user/'.strval($this->model->id));
        $resource = UserResource::make($this->model);

        $request_json = json_decode($request->getContent(), true);
        $resource_json = json_decode($resource->toJson(), true);

        $request->assertStatus(200);
        $this->assertJson($request->getContent());
        $this->assertEquals(
            $resource_json,
            $request_json['data'],
        );
    }
}

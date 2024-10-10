<?php

declare(strict_types=1);

namespace Tests\Feature\Models\Resources;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UserResource::class)]
class UserResourceTest extends TestCase
{
    use RefreshDatabase;

    private User $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = User::factory()->createOne();
    }

    #[Test]
    public function user_resource(): void
    {
        $model_array = $this->model->toArray();
        $resource_array = UserResource::make($this->model)->toArray(new Request);

        $this->assertIsArray($resource_array);
        $this->assertArrayNotHasKey(
            'password',
            $resource_array,
        );
        $this->assertArrayNotHasKey(
            'remember_token',
            $resource_array,
        );
        $this->assertArrayIsEqualToArrayIgnoringListOfKeys(
            $model_array,
            $resource_array,
            ['created_at', 'updated_at', 'email_verified_at', 'email', 'remember_token'],
        );
    }
}

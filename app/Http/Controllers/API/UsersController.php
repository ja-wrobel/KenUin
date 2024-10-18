<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
    public function show(User $user): UserResource
    {
        return UserResource::make($user);
    }
}

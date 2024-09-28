<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
    public function show(int $id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }
}

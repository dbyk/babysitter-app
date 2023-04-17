<?php

namespace App\Http\Controllers;

use App\Http\Filters\UsersGetFilterManager;
use App\Http\Requests\UsersGetRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(private readonly UsersGetFilterManager $usersGetFilterManager)
    {
    }

    public function index(UsersGetRequest $request)
    {
        $users = $this->usersGetFilterManager->applyFilters(User::query(), $request);

        $filteredUsers = UserResource::collection($users->paginate());

        return response()->json($filteredUsers);
    }

}

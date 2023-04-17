<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->has('name')) {
            $name = $request->input('name');
            $users->where('name', 'like', '%' . $name . '%');
        }

        if ($request->has('email')) {
            $email = $request->input('email');
            $users->where('name', 'like', '%' . $email . '%');
        }

        // todo convert into a proper Form object with loading data from request and validation
        // that would also allow to accept wider range of conditions, like =, <, >=, etc.
        // Even better would be to use some existing tool for that, e.g. GraphQL
        if ($request->has('personality-phlegmatic')) {
            $phlegmatic = $request->input('personality-phlegmatic');
            $users->whereRelation('personality', 'phlegmatic', '=', $phlegmatic);
        }

        $filteredUsers = UserResource::collection($users->paginate());

        return response()->json($filteredUsers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

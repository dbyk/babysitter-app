<?php

namespace App\Http\Filters;

use App\Http\Requests\UsersGetRequest;
use Illuminate\Database\Eloquent\Builder;

class NameFilter implements UsersGetFilterInterface
{
    public function apply(Builder $builder, UsersGetRequest $request): void
    {
        if ($request->has('name')) {
            $name = $request->input('name');
            $builder->where('name', 'like', '%' . $name . '%');
        }
    }

}

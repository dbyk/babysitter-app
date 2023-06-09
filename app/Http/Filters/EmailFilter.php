<?php

namespace App\Http\Filters;

use App\Http\Requests\UsersGetRequest;
use Illuminate\Database\Eloquent\Builder;

class EmailFilter implements UsersGetFilterInterface
{
    public function apply(Builder $builder, UsersGetRequest $request): void
    {
        if ($request->has('email')) {
            $builder->where('email', 'like', "%{$request->input('email')}%");
        }
    }

}

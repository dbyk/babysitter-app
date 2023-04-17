<?php

namespace App\Http\Filters;
use App\Http\Requests\UsersGetRequest;
use Illuminate\Database\Eloquent\Builder;

interface UsersGetFilterInterface
{
    public function apply(Builder $builder, UsersGetRequest $request): void;
}

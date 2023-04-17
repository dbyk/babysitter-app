<?php

namespace App\Http\Filters;

use App\Http\Requests\UsersGetRequest;
use Illuminate\Database\Eloquent\Builder;

class PersonalityFilter implements UsersGetFilterInterface
{
    public function apply(Builder $builder, UsersGetRequest $request): void
    {
        if ($request->has('personality')) {
            $personality = $request->input('personality');

            foreach ($personality as $characteristic => $value) {
                $builder->whereRelation('personality', $characteristic, '=', $value);
            }
        }
    }
}

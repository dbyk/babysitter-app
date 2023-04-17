<?php

namespace App\Http\Filters;

use App\Http\Requests\UsersGetRequest;
use Illuminate\Database\Eloquent\Builder;

class UsersGetFilterManager
{

    public function applyFilters(Builder $builder, UsersGetRequest $request): Builder
    {
        foreach($this->getPipes() as $pipe) {
            app($pipe)->apply($builder, $request);
        }
        return $builder;
    }

    /**
     * @return string[]|UsersGetFilterInterface[]
     */
    private function getPipes(): array
    {
        return [
            NameFilter::class,
            EmailFilter::class,
            PersonalityFilter::class,
        ];
    }
}

<?php

namespace App\Http\Filters;

use App\Http\Requests\UsersGetRequest;
use Illuminate\Database\Eloquent\Builder;

class UsersGetFilterManager
{

    public function __construct(
        public Builder $builder,
        public UsersGetRequest $request)
    {
    }

    public function applyFilters(): Builder
    {
        foreach($this->getPipes() as $pipe) {
            app($pipe)->apply($this->builder, $this->request);
        }
        return $this->builder;
    }

    /**
     * @return string[]|UsersGetFilterInterface[]
     */
    private function getPipes(): array
    {
        return [
            NameFilter::class,
            PersonalityFilter::class,
        ];
    }
}

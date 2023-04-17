<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPersonality>
 */
class UserPersonalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phlegmatic' => fake()->numberBetween(0, 100),
            'melancholic' => fake()->numberBetween(0, 100),
            'sanguine' => fake()->numberBetween(0, 100),
            'choleric' => fake()->numberBetween(0, 100),
        ];
    }
}

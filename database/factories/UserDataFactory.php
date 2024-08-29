<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserData>
 */
class UserDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_score' => fake()->randomFloat(2, 0, 1000000),
            'nuins_currency' => fake()->randomNumber(15),
            'subscription' => fake()->numberBetween(0, 1),
            'subscription_until' => fake()->creditCardExpirationDate()
        ];
    }
}

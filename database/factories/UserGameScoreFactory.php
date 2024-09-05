<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserGameScore>
 */
class UserGameScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'score' => $this->faker->randomFloat(2, 0, 100000),
            'score_time' => $this->faker->randomNumber(6),
            'score_tries' => $this->faker->randomNumber(1),
            'score_date' => $this->faker->dateTime(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameTopScore>
 */
class GameTopScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'score' => $this->faker->randomFloat(2, 1000, 100000),
            'time' => $this->faker->randomNumber(6),
            'tries' => $this->faker->randomNumber(1),
            'score_date' => $this->faker->dateTime(),
        ];
    }
}

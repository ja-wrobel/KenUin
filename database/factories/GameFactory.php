<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Games>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement(['arcade', 'quiz', 'shooter', 'strategy', 'racing', 'pvp', 'fighting', 'casual']),
            'description' => $this->faker->realText(),
            'difficulty' => $this->faker->randomElement(['easy', 'medium-easy', 'medium', 'medium-hard', 'hard']),
            'dir_path' => $this->faker->filePath(),
        ];
    }
}

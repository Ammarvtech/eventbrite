<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'type' => $this->faker->randomElement(['online', 'offline']),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'time' => $this->faker->time,
            'address' => $this->faker->address,
            'overview' => $this->faker->paragraph,
            'rules' => $this->faker->paragraph,
        ];
    }
}

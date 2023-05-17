<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TournamentImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tournament_id' => \App\Models\Tournament::factory(),
            'image' => $this->faker->word,
            'caption' => $this->faker->word,
            'is_primary' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'is_deleted' => $this->faker->boolean,
        ];
    }
}

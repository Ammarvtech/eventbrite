<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mem_name' => $this->faker->word(),
            'mem_email' => $this->faker->word(),
            'mem_phone' => $this->faker->word(),
            'role' => $this->faker->word(),
            'emergency_name' => $this->faker->word(),
            'emergency_phone' => $this->faker->word(),
            'team_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

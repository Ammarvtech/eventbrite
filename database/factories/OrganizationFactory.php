<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => $this->faker->company,
            'website' => $this->faker->url,
            'email' => $this->faker->email,
            'communication_method' => $this->faker->randomElement(['email', 'phone', 'mail']),
            'timezone' => $this->faker->timezone,
        ];
    }
}

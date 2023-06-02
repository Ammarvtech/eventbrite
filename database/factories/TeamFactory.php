<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // $table->id();
    // $table->foreignId('user_id')->constrained('users');
    // $table->string('team_name');
    // $table->string('affiliation');
    // $table->string('team_color');
    // $table->string('skill');
    // $table->string('logo');
    // $table->string('full_name');
    // $table->string('email');
    // $table->string('phone');
    // $table->string('payment_method');
    // $table->string('payment_prof');
    // $table->string('waivers_email');
    // $table->string('waivers_file');
    // $table->timestamps();
    public function definition(): array
    {
        return [
            'tournament_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'team_name' => $this->faker->word(),
            'affiliation' => $this->faker->word(),
            'team_color' => $this->faker->word(),
            'skill' => $this->faker->word(),
            'logo' => $this->faker->word(),
            'full_name' => $this->faker->word(),
            'email' => $this->faker->word(),
            'phone' => $this->faker->word(),
            'payment_method' => $this->faker->word(),
            'payment_prof' => $this->faker->word(),
            'waivers_email' => $this->faker->word(),
            'waivers_file' => $this->faker->word(),
        ];
    }
}

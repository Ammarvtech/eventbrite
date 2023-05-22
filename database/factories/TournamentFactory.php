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
            'title' => 'Tournament-' . $this->faker->numberBetween(1, 10). ' ' . $this->faker->word,
            'slug' => 'tournament-' . $this->faker->numberBetween(1, 10). ' ' . $this->faker->word,
            'category_id' => \App\Models\Category::factory(),
            'type' => \App\Models\TournamentType::factory(),
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'end_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'), 
            'registration_dead_line' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'event_type' => $this->faker->numberBetween(1, 10),
            'country_id' => \App\Models\Country::factory(),
            'city' => $this->faker->city,
            'postal_code' => $this->faker->word,
            'address' => $this->faker->text,
            'number_of_teams' => $this->faker->numberBetween(1, 100),
            'format' => $this->faker->word,
            'prize_distribution' => $this->faker->word,
            'level' => $this->faker->word,
            'entry_fee' => $this->faker->word,
            'rules' => $this->faker->word,
            'code_of_conduct' => $this->faker->word,
            'age' => $this->faker->word,
            'equipment_requirements' => $this->faker->word,
            'schedule_date' => $this->faker->word,
            'schedule_time' => $this->faker->word,
            'schedule_breaks' => $this->faker->word,
            'venue_availability' => $this->faker->word,
            'second_match_date' => $this->faker->word,
            'second_match_time' => $this->faker->word,
            'second_match_breaks' => $this->faker->word,
            'second_venue_availability' => $this->faker->word,
            'third_match_date' => $this->faker->word,
            'third_match_time' => $this->faker->word,
            'third_match_breaks' => $this->faker->word,
            'third_venue_availability' => $this->faker->word,
            'fourth_match_date' => $this->faker->word,
            'fourth_match_time' => $this->faker->word,
            'fourth_match_breaks' => $this->faker->word,
            'fourth_venue_availability' => $this->faker->word,
            'contact_information' => $this->faker->word,
            'roles_and_responsibilities' => $this->faker->word,
            'sponsor_information' => $this->faker->word,
            'overview' => $this->faker->text,
            'is_active' => $this->faker->word,
        ];
    }
}

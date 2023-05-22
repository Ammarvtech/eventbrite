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
            'title' => $this->faker->word,
            'slug' => $this->faker->word,
            'category_id' => $this->faker->word,
            'type' => $this->faker->word,
            'start_date' => $this->faker->word,
            'end_date' => $this->faker->word,
            'registration_dead_line' => $this->faker->word,
            'event_type' => $this->faker->word,
            'country_id' => $this->faker->word,
            'city' => $this->faker->word,
            'postal_code' => $this->faker->word,
            'address' => $this->faker->text,
            'number_of_teams' => $this->faker->word,
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

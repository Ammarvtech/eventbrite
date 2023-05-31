<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'otp' => $this->faker->numberBetween(1000, 9999),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'tournament_title' => 'Tournament-' . $this->faker->numberBetween(1, 10). ' ' . $this->faker->word,
            'country_id' => $this->faker->numberBetween(1, 10),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'zip_code' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'description' => $this->faker->text(),
        ];
    }
}

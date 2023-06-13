<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => $this->faker->randomNumber(),
            'wallet_id' => $this->faker->numberBetween(1, 10),
            'tournament_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->randomNumber(),
            'payment_method' => $this->faker->randomElement(['paypal', 'stripe']),
            'type' => $this->faker->randomElement(['debit', 'credit']),
        ];
    }
}

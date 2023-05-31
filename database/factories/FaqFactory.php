<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence,
            'answer' => $this->faker->sentence,
            'is_active' => true,
            'order' => 0,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'meta_keywords' => $this->faker->sentence,
        ];
    }
}

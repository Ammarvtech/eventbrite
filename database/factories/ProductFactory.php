<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->word,
            'slug' => fake()->unique()->slug,
            'description' => fake()->sentence,
            'category_id' => null,
            'status' => 'active',
            'meta_title' => fake()->sentence,
            'meta_description' => fake()->sentence,
            'meta_keywords' => fake()->word,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'deleted_at' => null,
            'created_ip' => fake()->ipv4,
            'updated_ip' => fake()->ipv4,
            'deleted_ip' => null,
        ];
    }
}

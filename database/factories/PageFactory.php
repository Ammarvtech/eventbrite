<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'slug' => $this->faker->slug,
            'content' => $this->faker->text,
            'image' => $this->faker->word,
            'is_active' => $this->faker->boolean,
            'meta_title' => $this->faker->word,
            'meta_description' => $this->faker->word,
            'meta_keywords' => $this->faker->word,
        ];
    }
}

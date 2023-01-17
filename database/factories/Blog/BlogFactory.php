<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,3),
            'judul' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(4),
            'isi' => $this->faker->sentence(200),
            'created_by' => 1
        ];
    }
}
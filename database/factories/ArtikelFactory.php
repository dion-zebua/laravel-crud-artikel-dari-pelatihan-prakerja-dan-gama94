<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(7),
            'slug'  => fake()->unique()->slug(7),
            'thumbnail' => fake()->unique()->imageUrl(1600, 900, 'animals', true, 'dogs', true, 'jpg'),
            'description'  => fake()->paragraph(10),
        ];
    }
}

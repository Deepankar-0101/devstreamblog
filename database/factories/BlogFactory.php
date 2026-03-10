<?php

namespace Database\Factories;
use App\Models\Blogers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blogers_id' => Blogers::factory(), // creates blogger automatically
            'title' => $this->faker->sentence(6),
            'desc' => $this->faker->sentence(20),
            'heading' => $this->faker->sentence(4),
            'paragraph' => $this->faker->paragraph(5),
            'conclusion' => $this->faker->paragraph(2),
            'likes' => $this->faker->numberBetween(0, 500),
            'featured' => $this->faker->boolean(20),
        ];
    }
}

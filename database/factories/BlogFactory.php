<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Admin;
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
    protected $model = Blog::class;
    public function definition(): array
    {
        return [
            //
            'BlogContent' => $this->faker->paragraphs(3, true),
            'BlogTilte' => $this->faker->sentence,
            'TilteImage' => $this->faker->imageUrl(),
            'AdminID' => Admin::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

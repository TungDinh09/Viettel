<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Service;
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
    public function definition(): array
    {
        return [
            //
            'ProductName' => $this->faker->uuid,
            'Speed' => $this->faker->word,
            'Bandwidth' => $this->faker->word,
            'Price' => $this->faker->randomFloat(2, 10, 1000),
            'Gift' => $this->faker->sentence,
            'Description' => $this->faker->sentence,
            'IPstatic' => $this->faker->ipv4,
            'UseDay' => $this->faker->numberBetween(1, 30),
            'CategoryID'=> $this->faker->numberBetween(1, 20),
            'ServiceID' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
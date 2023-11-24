<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Service::class;
    public function definition(): array
    {
        return [
            //
            'ServiceName' => $this->faker->unique()->word,
            'Price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}

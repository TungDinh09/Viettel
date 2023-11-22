<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Channel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Channel::class;
    public function definition(): array
    {
        return [
            //
            'ChannelName' => $this->faker->unique()->word,
            'Price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}

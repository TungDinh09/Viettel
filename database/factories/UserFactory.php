<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password for testing
            'Phone' => $this->faker->phoneNumber,
            'Avatar' => $this->faker->imageUrl(),
            'Gender' => $this->faker->randomElement(['M', 'F']),
            'Address' => $this->faker->address,
            'DateOfBirth' => $this->faker->date,
            'FirstName' => $this->faker->firstName,
            'LastName' => $this->faker->lastName,
            'CityID' => $this->faker->numberBetween(1, 10), // Assuming you have 10 cities
            'DistrictID' => $this->faker->numberBetween(1, 20), // Assuming you have 20 districts
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

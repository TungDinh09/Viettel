<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Admin::class;
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Default password for testing
            'Phone' => $this->faker->phoneNumber,
            'Avatar' => $this->faker->imageUrl(),
            'Gender' => $this->faker->randomElement(['M', 'F']),
            'Address' => $this->faker->address,
            'DateOfBirth' => $this->faker->date,
            'Firstname' => $this->faker->firstName,
            'LastName' => $this->faker->lastName,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\Models\User;

class RentalRequestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'user_id' => User::factory(),
            'name' => fake()->name,
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'comment' => fake()->paragraph,
            'status' => fake()->randomElement(['expectation', 'approved', 'rejected']),
        ];
    }
}

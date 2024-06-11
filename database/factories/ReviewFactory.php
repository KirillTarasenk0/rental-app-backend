<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\Models\User;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'user_id' => User::factory(),
            'rating' => fake()->numberBetween(1, 5),
            'cleanliness' => fake()->numberBetween(1, 5),
            'amenities' => fake()->numberBetween(1, 5),
            'location' => fake()->address,
            'comment' => fake()->paragraph,
        ];
    }
}

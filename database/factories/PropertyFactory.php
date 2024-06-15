<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence,
            'address' => fake()->address,
            'price' => fake()->randomNumber(5),
            'description' => fake()->paragraph,
            'property_type' => fake()->randomElement(['flat', 'house', 'commercial']),
            'rooms' => fake()->numberBetween(1, 10),
            'area' => fake()->numberBetween(10, 500),
            'floor' => fake()->numberBetween(1, 20),
            'total_floors' => fake()->numberBetween(1, 30),
            'furnished' => fake()->boolean,
            'parking' => fake()->boolean,
            'internet' => fake()->boolean,
            'city' => fake()->randomElement(['Minsk', 'Grodno', 'Brest', 'Gomel', 'Mogilev', 'Vitebsk'])
        ];
    }
}

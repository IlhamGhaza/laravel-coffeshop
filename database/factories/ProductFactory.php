<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'description' => fake()->text(),
            'image'=> fake()->imageUrl(),
            'price'=> fake()->randomNumber(2),
            // 'stock'=> fake()->randomNumber(2),
            'category_id'=> fake()->numberBetween(1,4)
        ];
    }
}

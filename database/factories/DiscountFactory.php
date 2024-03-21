<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
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
            'description' => $this->faker->text,
            'type' => $this->faker->randomElement(['percentage', 'fixed']),
            'value' => $this->faker->numberBetween(1, 100), // Memilih angka acak antara 1 dan 100
            'status' => $this->faker->randomElement(['active', 'inactive']), // Memilih secara acak antara 'active' dan 'inactive'
            'expired_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d')

        ];
    }
}

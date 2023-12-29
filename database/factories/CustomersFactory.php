<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $counter = 1;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'ci' => fake()->numberBetween(1000000, 5000000),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
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
            'phone' => fake()->numberBetween(1000000000, 9999999999),
            'email' => fake()->email(),
            'status' => 'active',
            'customer_since' =>fake()->dateTime(),
            'assigned_employee' => 1
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FollowUp>
 */
class FollowUpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lead_id' =>fake()->numberBetween(1,40),
            'employee_id' => 1,
            'follow_up_date' => fake()-> dateTime(),
            'type' => 'call',
            'status' => 'pending'
        ];
    }
}

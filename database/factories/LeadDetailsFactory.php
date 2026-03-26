<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LeadDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lead_id' => fake()->numberBetween(1,20),
            'chat_time' =>fake()->dateTime(),
            'chat_source' => 'call',
            'chat_status' => 'no answer',
            'chat_text' => fake()->paragraph()
        ];
    }
}

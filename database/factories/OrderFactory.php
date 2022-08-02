<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_ref' => strtoupper(Str::random(14)),
            'user_id' => fake()->numberBetween(1,10),
            'course_id' => fake()->numberBetween(1,5),
            'order_status' => fake()->numberBetween(0,1),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => fake()->numberBetween(1,30),
            'payment_method_id' => fake()->numberBetween(1,2),
            'payment_ref' => strtoupper(Str::random(10)),
            'payment_picture' => 'https://picsum.photos/300?random='.fake()->randomNumber(3, false),
            'payment_status' => fake()->numberBetween(0,2),
        ];
    }
}

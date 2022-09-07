<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_name' => fake()->name(),
            'slug' => Str::random(10),
            'course_picture' => 'https://picsum.photos/300?random='.fake()->randomNumber(3, false),
            'category_id' => fake()->numberBetween(1,2),
            'desc' => fake()->paragraph(),
            'price_old' => fake()->randomNumber(6, true),
            'price_new' => fake()->randomNumber(6, true),
            'enroll' => fake()->randomNumber(4, true),
            'is_active' => 1,
        ];
    }
}

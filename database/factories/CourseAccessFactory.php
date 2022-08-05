<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseAccess>
 */
class CourseAccessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_id' => fake()->numberBetween(1,15),
            'user_id' => fake()->numberBetween(1,50),
            'last_access' => 0,
        ];
    }
}

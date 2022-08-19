<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseList>
 */
class CourseListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no' => fake()->numberBetween(1,10),
            'course_id' => 1,
            'list_name' => fake()->name(),
            'link' => Str::random(10),
        ];
    }
}

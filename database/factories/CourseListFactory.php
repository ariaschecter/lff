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
            'id' => fake()->randomNumber(4, true),
            'course_sub_list_id' => fake()->numberBetween(1,3),
            'no' => fake()->numberBetween(1,10),
            'course_id' => 1,
            'list_name' => fake()->name(),
            'time' => fake()->numberBetween(1,10),
            'link' => 'J2PP0822jFM',
        ];
    }
}

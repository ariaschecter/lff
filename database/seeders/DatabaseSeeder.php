<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Role;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        Course::factory(15)->create();

        Role::factory()->create(['role_name' => 'Admin']);
        Role::factory()->create(['role_name' => 'User']);

        Category::factory()->create(['category_name' => 'Design']);
        Category::factory()->create(['category_name' => 'Front-End']);
    }
}

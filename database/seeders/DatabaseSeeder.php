<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\CourseAccess;
use App\Models\Role;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Category;
use App\Models\PaymentMethod;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Course::factory(15)->create();
        CourseList::factory(20)->create();
        CourseAccess::factory(30)->create();
        Order::factory(30)->create();
        Payment::factory(5)->create();

        Role::factory()->create(['role_name' => 'Admin']);
        Role::factory()->create(['role_name' => 'User']);

        Category::factory()->create(['category_name' => 'Design']);
        Category::factory()->create(['category_name' => 'Front-End']);

        User::factory()->create([
            'name' => 'Aria Maulana',
            'email' => 'admin',
            'password' => '$2y$10$YYvY2j6E.h53BMlYtxBI7e6tiwxMriOhq8Un1PtEKdDzWuOzwzVMW',
            'role_id' => '1',
            'active' => '1',
        ]);
        User::factory()->create([
            'name' => 'Aria Maulana',
            'email' => 'user',
            'password' => '$2y$10$UV83EkAa7s.RyDm0tncUf..cOEzLBK4i2s8niLs03yRxFGVCHiw4q',
            'role_id' => '2',
            'active' => '1',
        ]);
        User::factory(30)->create();

        PaymentMethod::factory()->create([
            'payment_method' => 'BRI',
            'payment_name' => 'Aria Maulana Eka Mahendra',
            'rekening' => '45623999',
        ]);
        PaymentMethod::factory()->create([
            'payment_method' => 'DANA',
            'payment_name' => 'Aria Maulana Eka Mahendra',
            'rekening' => '081235375978',
        ]);
    }
}

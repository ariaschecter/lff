<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Course;
use App\Models\Category;
use App\Models\Order;
use App\Models\CourseAccess;

class PersonController extends Controller
{
    public function progres(){

    }

    public function course(){
        $id = Auth::user()->id;

        $data = CourseAccess::with('course')->where('user_id', $id)->get();

        $courses = Course::all();
        $categories = Category::all();

        return view('person.course', [
            'title' => 'My Courses',
            'categories' => $categories,
            'courses' => $data,
        ]);
    }

    public function order(){
        $id = Auth::user()->id;
        $orders = Order::with('course')->where('user_id', $id)->orderBy('order_status', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        return view('person.order', [
            'title' => 'Order',
            'orders' => $orders,
        ]);
    }

    public function payment(){

    }

}

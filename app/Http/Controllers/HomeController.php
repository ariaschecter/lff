<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\Category;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['dashboard']]);
        // $this->middleware('auth', ['except' => ['confirmPage', 'confirmOrder', 'invoice']]);
    }

    public function index(){
        $categories = Category::all();
        $popularCourse = Course::with(['courselist', 'category'])->orderBy('view', 'DESC')->take(6)->get();
        // dd($popularCourse);
        return view('home.dashboard', [
            'title' => 'Home',
            'categories' => $categories,
            'courses' => $popularCourse,
            'students' => User::where('role_id', 2)->get(),
        ]);
    }

    public function dashboard(){
        $role = Auth::user()->role_id;

        switch($role){
            case 1: return view('admin.dashboard', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
            ]);
            case 2: return view('user.dashboard',[
                'title' => 'Dashboard',
            ]);
        }
    }

    public function courses(Request $request){
        $search = $request->keyword;
        if($search){
            $courses = Course::where('course_name', 'LIKE', "%{$search}%")->get();
        } else {
            $courses = Course::all();
        }
        $categories = Category::all();

        return view('home.courses', [
            'title' => 'All Courses',
            'categories' => $categories,
            'courses' => $courses,
        ]);
    }

    public function course(Course $course){
        $id = $course->id;
        $lists = CourseList::where('course_id', $id)->orderBy('no', 'ASC')->get();
        if($course->discount == null){
            $price = [
                'old' => null,
                'new' => $course->price,
            ];
        } else {
            $price = [
                'old' => $course->price,
                'new' => $course->price - ($course->price * $course->discount),
            ];
        }
        $time = round(CourseList::where('course_id', $id)->sum('time')/60, 2);

        return view('home.course', [
            'title' => $course->course_name,
            'course' => $course,
            'price' => $price,
            'lists' => $lists,
            'time' => $time,
        ]);
    }

    public function categories(){

    }

    public function category(){

    }
}

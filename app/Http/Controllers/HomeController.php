<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $popularCourse = Course::with(['courselist', 'category'])->orderBy('enroll', 'DESC')->take(6)->get();
        return view('home.dashboard', [
            'title' => 'Home',
            'categories' => $categories,
            'courses' => $popularCourse,
            'students' => User::where('role_id', 2)->get(),
        ]);
    }

    public function dashboard(){
        $role = Auth::user()->role_id;

        $course = Course::where('id', 1)->first();
        $lists = CourseList::where('course_id', 1)->orderBy('no', 'ASC')->get();
        $time = round(CourseList::where('course_id', 1)->sum('time')/60, 2);

        switch($role){
            case 1: return view('admin.dashboard', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
            ]);
            case 2: return view('person.dashboard',[
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
            'all' => true,
        ]);
    }

    public function course(Course $course){
        $id = $course->id;
        $lists = CourseList::where('course_id', $id)->orderBy('no', 'ASC')->get();
        $time = round(CourseList::where('course_id', $id)->sum('time')/60, 2);

        return view('home.course', [
            'title' => $course->course_name,
            'course' => $course,
            'lists' => $lists,
            'time' => $time,
        ]);
    }

    public function categories(){
        return view('home.categories', [
            'title' => 'All Categories',
            'categories' => Category::all(),
        ]);
    }

    public function category(Category $category){
        $courses = Course::where('category_id', $category->id)->get();
        $categories = Category::all();
        return view('home.courses', [
            'title' => $category->category_name,
            'categories' => $categories,
            'courses' => $courses,
            'all' => false
        ]);
    }
}

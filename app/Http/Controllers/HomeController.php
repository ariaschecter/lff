<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\CourseAccess;
use App\Models\Category;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['dashboard']]);
    }

    public function index(){
        $categories = Category::with('course')->take(5)->get();
        $popularCourse = Course::with(['courselist', 'category'])->where('is_active', 1)->orderBy('enroll', 'DESC')->take(6)->get();
        return view('home.dashboard', [
            'title' => 'Home',
            'categories' => $categories,
            'courses' => $popularCourse,
            'students' => User::where('role_id', 2)->get(),
        ]);
    }

    public function dashboard(){
        $role = Auth::user()->role_id;
        $courses = CourseAccess::with('course')->where('user_id', Auth::id())->orderBy('updated_at', 'DESC')->take(3)->get();
        $categories = Category::all();

        switch($role){
            case 1: return view('admin.dashboard', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
            ]);
            case 2: return view('person.dashboard',[
                'title' => 'Dashboard',
                'courses' => $courses,
                'categories' => $categories,
            ]);
        }
    }

    public function courses(Request $request){
        $search = $request->keyword;
        if($search){
            $courses = Course::where('course_name', 'LIKE', "%{$search}%")
                            ->where('is_active', 1)->get();
        } else {
            $courses = Course::where('is_active', 1)->get();
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
        if(!$course->is_active) return abort(404, 'Page Not Found');
        $id = $course->id;
        $list = CourseList::where('course_id', $id)->orderBy('no', 'ASC')->first();
        $time = round(CourseList::where('course_id', $id)->sum('time')/60, 2);
        $payed = CourseAccess::where('user_id', Auth::id())->where('course_id', $course->id)->first();

        $payed ? $link = url('course/access/'.$course->slug) : $link = url('course/order/'.$course->slug);

        return view('home.course', [
            'title' => $course->course_name,
            'course' => $course,
            'list' => $list,
            'time' => $time,
            'payed' => $payed,
            'link' => $link,
        ]);
    }

    public function categories(){
        return view('home.categories', [
            'title' => 'All Categories',
            'categories' => Category::all(),
        ]);
    }

    public function category(Category $category){
        $courses = Course::where('category_id', $category->id)->where('is_active', 1)->get();
        $categories = Category::all();
        return view('home.courses', [
            'title' => $category->category_name,
            'categories' => $categories,
            'courses' => $courses,
            'all' => false,
        ]);
    }

    public function about() {
        return view('home.about', [
            'title' => 'About Us',
        ]);
    }
}

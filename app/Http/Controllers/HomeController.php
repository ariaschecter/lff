<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\CourseSubList;
use App\Models\CourseAccess;
use App\Models\Category;
use App\Models\Finance;


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

        switch($role){
            case 1:
                $user = count(User::where('role_id', 2)->get());
                // $category = count(Category::all());
                $course = count(Course::all());
                $courselist = count(CourseList::all());

                return view('admin.dashboard', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'total_user' => $user,
                'detail' => Finance::getDetail(),
                'total_course' => $course,
                'total_courselist' => $courselist,
            ]);
            case 2:
                $courses = CourseAccess::with('course')->where('user_id', Auth::id())->orderBy('updated_at', 'DESC')->take(3)->get();
                $categories = Category::all();

                return view('person.dashboard',[
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

        $subCourse = CourseSubList::where('course_id', $course->id)->orderBy('sub_list_no', 'ASC')->get();
        $played = CourseList::where('course_id', $course->id)->orderBy('no', 'ASC')->get();
        $time = round(CourseList::where('course_id', $course->id)->sum('time')/60, 2);
        $payed = CourseAccess::where('user_id', Auth::id())->where('course_id', $course->id)->first();

        $payed ? $link = url('course/access/'.$course->slug) : $link = url('course/order/'.$course->slug);

        return view('home.course', [
            'title' => $course->course_name,
            'course' => $course,
            'subCourse' => $subCourse,
            'courselist' => $played,
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
        $data = [
            [
                'nama' => 'Prayuda Riansyah',
                'img' => 'prayuda-riansyah.JPG',
                'position' => 'CEO',
                'instagram' => 'yudarynsh',
                'linkedin' => 'muhammad-prayuda-riansyah-820b62213',
            ],
            [
                'nama' => 'Aria Maulana',
                'img' => 'aria-maulana.JPG',
                'position' => 'DEVELOPER',
                'instagram' => 'acielana',
                'linkedin' => 'aria-maulana-eka-mahendra-5a2843193',
            ],
            [
                'nama' => 'Moh Ainur',
                'img' => 'moh-ainur.JPG',
                'position' => 'DEVELOPER',
                'instagram' => 'ainurbrr',
                'linkedin' => 'moh-ainur-bahtiar-rohman-a1333b1b3',
            ],
            [
                'nama' => 'Nabil Ihza',
                'img' => 'nabil-ihza.JPG',
                'position' => 'CREATIVE & MARKETING',
                'instagram' => 'nabilihzaa',
                'linkedin' => 'nabil-ihza-ambariyono-12585224b',
            ],
        ];
        return view('home.about', [
            'title' => 'About Us',
            'data' => $data,
        ]);
    }
}

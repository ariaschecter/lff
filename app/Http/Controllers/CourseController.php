<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\Category;
use Alert;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = Course::join('categories', 'courses.category_id', '=', 'categories.id')
                        ->where('course_name', 'LIKE', "%{$search}%")
                        ->orWhere('price_old', 'LIKE', "%{$search}%")
                        ->orWhere('price_new', 'LIKE', "%{$search}%")
                        ->orWhere('enroll', 'LIKE', "%{$search}%")
                        ->orWhere('category_name', 'LIKE', "%{$search}%")
                            ->paginate(10);
        } else {
            $data = Course::paginate(10);
        }
        return view('admin.course.index', [
            'active' => 'course',
            'title' => 'Course',
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.course.add', [
            'active' => 'course',
            'title' => 'Add Course',
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name' => 'required|unique:courses,course_name',
            'course_picture' => 'required|image|file|max:1024',
            'category_id' => 'required',
            'desc' => 'required',
            'price_old' => 'required',
            'price_new' => 'required',
        ]);

        $upload = $request->file('course_picture')->store('img/course');
        $slug = Str::slug($request->course_name, '-');

        $data = [
            'course_name' => $request->course_name,
            'slug' => $slug,
            'course_picture' => $upload,
            'category_id' => $request->category_id,
            'desc' => $request->desc,
            'price_old' => $request->price_old,
            'price_new' => $request->price_new,
            'enroll' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Course::insert($data);
        Alert::success('Congrats', 'You\'ve Add New Course!');
        return redirect('admin/course');
    }

    public function edit(Course $course)
    {
        return view('admin.course.edit', [
            'active' => 'course',
            'title' => 'Edit Course',
            'data' => Course::with('category')->where('id',$course->id)->first(),
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        if($course->course_name != $request->course_name){
            $validated = $request->validate([
                'course_name' => 'required|unique:courses,course_name',
                'course_picture' => 'image|file|max:1024',
                'category_id' => 'required',
                'desc' => 'required',
                'price_old' => 'required',
                'price_new' => 'required',
            ]);
        } else {
            $validated = $request->validate([
                'course_name' => 'required',
                'course_picture' => 'image|file|max:1024',
                'category_id' => 'required',
                'desc' => 'required',
                'price_old' => 'required',
                'price_new' => 'required',
            ]);
        }

        $slug = Str::slug($request->course_name, '-');

        if($request->course_picture){
            Storage::delete($course->course_picture);
            $upload = $request->file('course_picture')->store('img/course');
        } else {
            $upload = $course->course_picture;
        }


        $update = [
            'course_name' => $request->course_name,
            'slug' => $slug,
            'course_picture' => $upload,
            'category_id' => $request->category_id,
            'desc' => $request->desc,
            'price_old' => $request->price_old,
            'price_new' => $request->price_new,
            'updated_at' => now(),
        ];
        Course::where('id', $course->id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Course!');
        return redirect('admin/course');
    }

    public function destroy(Course $course)
    {
        Storage::delete($course->course_picture);
        Course::where('id', $course->id)->delete();
        CourseList::where('course_id', $course->id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Course!');
        return redirect('admin/course');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\Category;
use Alert;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = Course::where('course_name', 'LIKE', "%{$search}%")
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
            'course_picture' => 'required',
            'category_id' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data = [
            'course_name' => $request->course_name,
            'course_picture' => $request->course_picture,
            'category_id' => $request->category_id,
            'desc' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
            'view' => 0,
        ];

        Course::insert($data);
        Alert::success('Congrats', 'You\'ve Add New Course!');
        return redirect('admin/course');
    }

    public function edit($id)
    {
        return view('admin.course.edit', [
            'active' => 'course',
            'title' => 'Edit Course',
            'data' => Course::with('category')->where('id',$id)->first(),
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Course::where('id',$id)->first();

        if($data->course_name != $request->course_name){
            $validated = $request->validate([
                'course_name' => 'required|unique:courses,course_name',
                'course_picture' => 'required',
                'category_id' => 'required',
                'desc' => 'required',
                'price' => 'required',
            ]);
        } else {
            $validated = $request->validate([
                'course_name' => 'required',
                'course_picture' => 'required',
                'category_id' => 'required',
                'desc' => 'required',
                'price' => 'required',
            ]);
        }

        $update = [
            'course_name' => $request->course_name,
            'course_picture' => $request->course_picture,
            'category_id' => $request->category_id,
            'desc' => $request->desc,
            'price' => $request->price,
            'discount' => $request->discount,
            'updated_at' => now(),
        ];
        Course::where('id', $id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Course!');
        return redirect('admin/course');
    }

    public function destroy($id)
    {
        Course::where('id', $id)->delete();
        CourseList::where('course_id', $id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Course!');
        return redirect('admin/course');
    }
}

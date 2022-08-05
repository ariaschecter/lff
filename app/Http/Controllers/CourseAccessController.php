<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseAccess;
use Alert;

class CourseAccessController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = CourseAccess::search($search);
        } else {
            $data = CourseAccess::getAll();
        }
        return view('admin.course_access.index', [
            'active' => 'course_access',
            'title' => 'Course Access',
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.course_access.add', [
            'active' => 'course_access',
            'title' => 'Add Course Access',
            'users' => User::where('role_id','!=',1)->get(),
            'courses' => Course::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
        ]);
        $course_access = CourseAccess::where($validated)->first();

        if($course_access){
            Alert::error('Error', 'Course Access has been Added!');
            return back();
        } else {
            CourseAccess::insert($validated);
            Alert::success('Congrats', 'You\'ve Add New Course Access!');
        }
        return redirect('admin/course_access');
    }

    public function edit($id)
    {
        return view('admin.course_access.edit', [
            'active' => 'course_access',
            'title' => 'Edit Course Access',
            'data' => CourseAccess::where('id',$id)->first(),
            'users' => User::where('role_id','!=',1)->get(),
            'courses' => Course::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = CourseAccess::where('id',$id)->first();

        if($data->category_name != $request->category_name){
            $validated = $request->validate([
                'category_name' => 'required|unique:categories,category_name',
            ]);
        }
        $update = [
            'category_name' => $request->category_name,
            'updated_at' => now(),
        ];
        CourseAccess::where('id', $id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Course Access!');
        return redirect('admin/course_access');
    }

    public function destroy($id)
    {
        CourseAccess::where('id', $id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Course Access!');
        return redirect('admin/course_access');
    }
}


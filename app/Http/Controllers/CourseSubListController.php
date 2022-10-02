<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\CourseSubList;
use Alert;

class CourseSubListController extends Controller
{
    public function create(Course $course)
    {
        $last = count(CourseSubList::where('course_id', $course->id)->get());
        return view('admin.course_sub_list.add', [
            'active' => 'course',
            'title' => 'Add Sub Course List',
            'course' => $course,
            'last_number' => $last + 1,
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $list = CourseSubList::where('course_id', $course->id)->where('sub_list_no', $request->sub_list_no)->first();
        if($list){
            $validated = $request->validate([
                'sub_list_no' => 'required|unique:course_sub_lists,sub_list_no',
                'sub_list_name' => 'required',
            ]);
        } else {
            $validated = $request->validate([
                'sub_list_no' => 'required',
                'sub_list_name' => 'required',
            ]);
        }

        $data = [
            'course_id' => $course->id,
            'sub_list_no' => $request->sub_list_no,
            'sub_list_name' => $request->sub_list_name,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        CourseSubList::insert($data);
        Alert::success('Congrats', 'You\'ve Add New Sub Course List!');
        return redirect('admin/course_list/'.$course->slug);
    }

    public function edit(Course $course, CourseSubList $coursesublist){
        return view('admin.course_sub_list.edit', [
            'active' => 'course',
            'title' => 'Edit Sub Course List',
            'course' => $course,
            'data' => $coursesublist,
        ]);
    }

    public function update(Request $request, Course $course, CourseSubList $coursesublist){
        if($coursesublist->sub_list_no != $request->sub_list_no){
            $lagi = CourseSubList::where('course_id', $course->id)->where('sub_list_no', $request->sub_list_no)->first();
            if($lagi){
                $validated = $request->validate([
                    'sub_list_no' => 'required|unique:course_sub_lists,sub_list_no',
                    'sub_list_name' => 'required',
                ]);
            } else {
                $validated = $request->validate([
                    'sub_list_no' => 'required',
                    'sub_list_name' => 'required',
                ]);
            }
        } else {
            $validated = $request->validate([
                'sub_list_no' => 'required',
                'sub_list_name' => 'required',
            ]);
        }

        $data = [
            'sub_list_no' => $request->sub_list_no,
            'sub_list_name' => $request->sub_list_name,
            'updated_at' => now(),
        ];

        CourseSubList::where('id', $coursesublist->id)->update($data);
        Alert::success('Congrats', 'You\'ve Update Sub Course List!');
        return redirect('admin/course_list/'.$course->slug);
    }

    public function destroy(Course $course, CourseSubList $coursesublist)
    {
        CourseSubList::where('id', $coursesublist->id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Sub Course List!');
        return redirect('admin/course_list/'.$course->slug);
    }
}

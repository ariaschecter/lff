<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseList;
use App\Models\CourseSubList;
use Alert;

class CourseListController extends Controller
{
    public function index(Request $request, Course $course)
    {
        $search = $request->keyword;
        if($search){
            $data = CourseList::where('no', 'LIKE', "%{$search}%")
                        ->orWhere('list_name', 'LIKE', "%{$search}%")
                        ->orWhere('link', 'LIKE', "%{$search}%")
                        ->orderBy('no', 'ASC')
                        ->paginate(10);
        } else {
            $data = CourseList::where('course_id', $course->id)->orderBy('no', 'ASC')->paginate(10);
        }
        $dataSubList = CourseSubList::where('course_id', $course->id)->orderBy('sub_list_no', 'ASC')->get();

        return view('admin.course_list.index', [
            'active' => 'course',
            'title' => 'Add Course',
            'course' => $course,
            'courseList' => $data,
            'subCourseList' => $dataSubList,
        ]);
    }

    public function create(Course $course)
    {
        $last = count(CourseList::where('course_id', $course->id)->get());
        $dataSubList = CourseSubList::where('course_id', $course->id)->orderBy('sub_list_no', 'ASC')->get();
        return view('admin.course_list.add', [
            'active' => 'course',
            'title' => 'Add Course List',
            'course' => $course,
            'last_number' => $last + 1,
            'subCourseList' => $dataSubList,
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $list = CourseList::where('course_id', $course->id)->where('no', $request->no)->first();
        if($list){
            $validated = $request->validate([
                'no' => 'required|unique:course_lists,no',
                'list_name' => 'required',
                'time' => 'required',
                'link' => 'required|unique:course_lists,link',
            ]);
        } else {
            $validated = $request->validate([
                'no' => 'required',
                'list_name' => 'required',
                'time' => 'required',
                'link' => 'required|unique:course_lists,link',
            ]);
        }

        $data = [
            'no' => $request->no,
            'course_id' => $course->id,
            'list_name' => $request->list_name,
            'link' => $request->link,
            'time' => $request->time,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        CourseList::insert($data);
        Alert::success('Congrats', 'You\'ve Add New Course List!');
        return redirect('admin/course_list/'.$course->slug);
    }

    public function edit(Course $course, CourseList $courselist){
        $dataSubList = CourseSubList::where('course_id', $course->id)->orderBy('sub_list_no', 'ASC')->get();
        return view('admin.course_list.edit', [
            'active' => 'course',
            'title' => 'Edit Course List',
            'course' => $course,
            'data' => $courselist,
            'subCourseList' => $dataSubList,
        ]);
    }

    public function update(Request $request, Course $course, CourseList $courselist){
        $list = $courselist;
        if($list->no != $request->no){
            $lagi = CourseList::where('course_id', $course->id)->where('no', $request->no)->first();
            if($lagi){
                $validated = $request->validate([
                    'no' => 'required|unique:course_lists,no',
                    'list_name' => 'required',
                    'time' => 'required',
                    'link' => 'required',
                ]);
            } else {
                $validated = $request->validate([
                    'no' => 'required',
                    'list_name' => 'required',
                    'time' => 'required',
                    'link' => 'required',
                ]);
            }
        } else {
            $validated = $request->validate([
                'no' => 'required',
                'time' => 'required',
                'list_name' => 'required',
                'link' => 'required',
            ]);
        }

        $data = [
            'no' => $request->no,
            'list_name' => $request->list_name,
            'time' => $request->time,
            'link' => $request->link,
            'updated_at' => now(),
        ];

        CourseList::where('id', $courselist->id)->update($data);
        Alert::success('Congrats', 'You\'ve Update Course List!');
        return redirect('admin/course_list/'.$course->slug);
    }

    public function destroy(Course $course, CourseList $courselist)
    {
        CourseList::where('id', $courselist->id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Course List!');
        return redirect('admin/course_list/'.$course->slug);
    }
}

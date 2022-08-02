<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseList;
use Alert;

class CourseListController extends Controller
{
    public function index(Request $request, $id)
    {
        $course = Course::where('id', $id)->first();
        $search = $request->keyword;
        if($search){
            $data = CourseList::where('no', 'LIKE', "%{$search}%")
                        ->orWhere('list_name', 'LIKE', "%{$search}%")
                        ->orWhere('link', 'LIKE', "%{$search}%")
                        ->orderBy('no', 'ASC')
                        ->paginate(10);
        } else {
            $data = CourseList::where('course_id', $id)->orderBy('no', 'ASC')->paginate(10);
        }

        return view('admin.course_list.index', [
            'active' => 'course',
            'title' => 'Add Course',
            'course' => $course,
            'data' => $data,
        ]);
    }

    public function create($id)
    {
        $last = count(CourseList::where('course_id', $id)->get());
        return view('admin.course_list.add', [
            'active' => 'course',
            'title' => 'Add Course List',
            'id' => $id,
            'last_number' => $last + 1,
        ]);
    }

    public function store(Request $request, $id)
    {
        $list = CourseList::where('course_id', $id)->where('no', $request->no)->first();
        if($list){
            $validated = $request->validate([
                'no' => 'required|unique:course_lists,no',
                'list_name' => 'required',
                'link' => 'required|unique:course_lists,link',
            ]);
        } else {
            $validated = $request->validate([
                'no' => 'required',
                'list_name' => 'required',
                'link' => 'required|unique:course_lists,link',
            ]);
        }

        $data = [
            'no' => $request->no,
            'course_id' => $id,
            'list_name' => $request->list_name,
            'link' => $request->link,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        CourseList::insert($data);
        Alert::success('Congrats', 'You\'ve Add New Course List!');
        return redirect('admin/course_list/'.$id);
    }

    public function edit($course_id, $id){
        return view('admin.course_list.edit', [
            'active' => 'course',
            'title' => 'Edit Course List',
            'data' => CourseList::where('id',$id)->first(),
        ]);
    }

    public function update(Request $request, $course_id, $id){
        $list = CourseList::where('id', $id)->first();
        if($list->no != $request->no){
            $lagi = CourseList::where('course_id', $course_id)->where('no', $request->no)->first();
            if($lagi){
                $validated = $request->validate([
                    'no' => 'required|unique:course_lists,no',
                    'list_name' => 'required',
                    'link' => 'required',
                ]);
            } else {
                $validated = $request->validate([
                    'no' => 'required',
                    'list_name' => 'required',
                    'link' => 'required',
                ]);
            }
        } else {
            $validated = $request->validate([
                'no' => 'required',
                'list_name' => 'required',
                'link' => 'required',
            ]);
        }

        $data = [
            'no' => $request->no,
            'list_name' => $request->list_name,
            'link' => $request->link,
            'updated_at' => now(),
        ];

        CourseList::where('id', $id)->update($data);
        Alert::success('Congrats', 'You\'ve Update Course List!');
        return redirect('admin/course_list/'.$course_id);
    }

    public function destroy($course_id, $id)
    {
        CourseList::where('id', $id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Course List!');
        return redirect('admin/course_list/'.$course_id);
    }
}

@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course') }}">Course</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course_list/'.$course->slug) }}">{{ $course->course_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Add Course</h6>
                <form method="POST" action="{{ url('admin/course_list/'.$course->slug.'/update/'.$data->id) }}">
                    @csrf
                    <div class="mb-1">
                        <label for="no" class="form-label">No</label>
                        <input type="number" class="form-control @error('no') is-invalid @enderror" id="no" name="no" value="{{ $data->no }}" placeholder="Input Course">
                    </div>
                    @error('no') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="course_sub_list_id" class="form-label">Sub List Name</label>
                        <select class="form-select" id="course_sub_list_id" name="course_sub_list_id">
                            <option value="{{ $data->course_sub_list_id }}">{{ $data->coursesSubList->sub_list_no.'. '. $data->coursesSubList->sub_list_name }}</option>
                            @foreach ($subCourseList as $subCourse)
                                <option value="{{ $subCourse->id }}">{{ $subCourse->sub_list_no.'. '.$subCourse->sub_list_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="list_name" class="form-label">Name</label>
                        <input type="text" autofocus class="form-control @error('list_name') is-invalid @enderror" id="list_name" name="list_name" value="{{ $data->list_name }}" placeholder="Input Course">
                    </div>
                    @error('list_name') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ $data->link }}" placeholder="Input Course">
                    </div>
                    @error('link') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="time" class="form-label">Time</label>
                        <input type="number" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ $data->time }}" placeholder="Input Course">
                    </div>
                    @error('time') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="course_desc" class="form-label">Course Description</label>
                        <textarea class="form-control" name="course_desc" id="course_desc" rows="10">{{ $data->course_desc }}</textarea>
                    </div>
                    @error('course_desc') <div class="text-danger">{{ $message }}</div> @enderror

                    <button class="btn btn-primary m-1 text-white">Edit Course List</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course_access') }}">Course Access</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
@php
    // dd($data);
@endphp
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Edit Category {{ $data->category_name }}</h6>
                <form method="POST" action="{{ url('admin/category/'. $data->id) }}">
                    @csrf
                    <div class="mb-1">
                        <label for="course_id" class="form-label">Course</label>
                        <select class="form-select" id="course_id" name="course_id">
                            <option value="{{ $data->id }}">{{ $data->course->course_name }}</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-select" id="user_id" name="user_id">
                            <option value="{{ $data->id }}">{{ $data->user->name }}</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary m-1 text-white">Add Course Access</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var course_id = document.querySelector('#course_id');

dselect(course_id, {
    search: true
});

var user_id = document.querySelector('#user_id');

dselect(user_id, {
    search: true
});

</script>
@endsection

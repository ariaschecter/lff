@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course') }}">Course</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course_list/'.$course->slug) }}">{{ $course->course_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Add Course</h6>
                <form method="POST" action="{{ url('admin/course_sub_list/'.$course->slug.'/add') }}">
                    @csrf
                    <div class="mb-1">
                        <label for="sub_list_no" class="form-label">No</label>
                        <input type="number" class="form-control @error('sub_list_no') is-invalid @enderror" id="sub_list_no" name="sub_list_no" value="{{ $last_number }}" placeholder="Input Sub Course No">
                    </div>
                    @error('sub_list_no') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="sub_list_name" class="form-label">Name</label>
                        <input type="text" autofocus class="form-control @error('sub_list_name') is-invalid @enderror" id="sub_list_name" name="sub_list_name" value="{{ old('sub_list_name') }}" placeholder="Input Sub Course Name">
                    </div>
                    @error('sub_list_name') <div class="text-danger">{{ $message }}</div> @enderror

                    <button class="btn btn-primary m-1 text-white">Add Course List</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

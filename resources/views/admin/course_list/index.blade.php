@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course') }}">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $course->course_name }}</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row col-lg-12">
    <div class="col-lg-3 mt-3">
        <div class="card mb-3 p-2">
        <img src="{{ asset('storage/'. $course->course_picture) }}" class="card-img-top" alt="{{ $course->course_name }}">
            <div class="card-body">
                <h2 class="card-title">{{ $course->course_name }}</h2>
                <h5 class="card-text mb-1"><del class="text-danger">Rp. {{ number_format($course->price_old, 0) }}</del></h5>
                <h3 class="card-text mb-1"><strong class="text-black">Rp. {{ number_format($course->price_new, 0) }}</strong></h3>
                <p class="card-text mb-1">{{ $course->desc }}</p>
                <div class="btn btn-primary">{{ $course->enroll }} Enroll</div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
    <a href="{{ url('admin/course_sub_list/'.$course->slug.'/add') }}" class="btn btn-primary m-3 col-lg-1">Add Sub Course</a>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">All Course List</h6>
                    <div class="table-responsive mb-2">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub List Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($subCourseList as $item)
                                    <tr>
                                        <td>{{ $item->sub_list_no }}</td>
                                        <td>{{ $item->sub_list_name }}</td>
                                        <td>
                                        <a href="{{ url('admin/'.$active.'_sub_list/'.$course->slug.'/update/'.$item->id) }}" class="btn btn-success">Update</a>
                                        <a href="{{ url('admin/'.$active.'_sub_list/'.$course->slug.'/delete/'.$item->id) }}" class="btn btn-danger show_confirm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
    <a href="{{ url('admin/course_list/'.$course->slug.'/add') }}" class="btn btn-primary m-3 col-lg-1">Add Course List</a>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">All Course List</h6>
                    <div class="table-responsive mb-2">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub List</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($courseList as $item)
                                    <tr>
                                        <td>{{ $item->no }}</td>
                                        <td>{{ $item->coursesSubList->sub_list_name }}</td>
                                        <td>{{ $item->list_name }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td>
                                        <a href="{{ url('admin/'.$active.'_list/'.$course->slug.'/update/'.$item->id) }}" class="btn btn-success">Update</a>
                                        <a href="{{ url('admin/'.$active.'_list/'.$course->slug.'/delete/'.$item->id) }}" class="btn btn-danger show_confirm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $courseList->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

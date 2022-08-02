@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course') }}">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row col-lg-12">
    <div class="col-lg-3 mt-3">
        <div class="card mb-3 p-2">
            <img src="{{ $course->course_picture }}" class="card-img-top" alt="{{ $course->course_name }}">
            <div class="card-body">
                <h2 class="card-title">{{ $course->course_name }}</h2>
                <h5 class="card-text mb-1">Rp. <del class="text-danger">{{ $course->price }}</del><strong> | {{ $course->price*(100-$course->discount)/100 }}</strong></h5>
                <p class="card-text mb-1">{{ $course->desc }}</p>
                <div class="btn btn-primary">{{ $course->view }} Views</div>
            </div>
          </div>
    </div>
    <div class="col-lg-9">
    <a href="{{ url('admin/course_list/'.$course->id.'/add') }}" class="btn btn-primary m-3 col-lg-1">Add</a>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">All Course List</h6>
                    <div class="table-responsive mb-2">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->no }}</td>
                                        <td>{{ $item->list_name }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td>
                                        <a href="{{ url('admin/'.$active.'_list/'.$course->id.'/update/'.$item->id) }}" class="btn btn-success">Update</a>
                                        <a href="{{ url('admin/'.$active.'_list/'.$course->id.'/delete/'.$item->id) }}" class="btn btn-danger show_confirm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

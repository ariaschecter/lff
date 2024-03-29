@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <a href="{{ url('admin/'.$active.'/add') }}" class="btn btn-primary m-3 col-lg-1">Add</a>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h6 class="card-title">All Category</h6>
                <div class="table-responsive mb-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Email</th>
                                    <th>Persentase</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ number_format($item->last_access*100 / count($item->course->courselist), 0) }} %</td>
                                    <td>
                                        <a href="{{ url('admin/'.$active.'/update/'.$item->id) }}" class="btn btn-success">Update</a>
                                        <a href="{{ url('admin/'.$active.'/delete/'.$item->id) }}" class="btn btn-danger show_confirm">Delete</a>
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
@endsection

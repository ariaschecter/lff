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
            <h6 class="card-title">All Course</h6>
                <div class="table-responsive mb-2">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price New</th>
                                    <th>Enroll</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td><img src="{{ asset('storage/'. $item->course_picture) }}" alt="{{ $item->course_name }}"></td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>Rp. {{ number_format($item->price_new, 0) }}</td>
                                    <td>{{ $item->enroll }}</td>
                                    <td>{{ $item->is_active ? 'True' : 'False' }}</td>
                                    <td>
                                        <a href="{{ url('admin/'.$active.'_list/'.$item->slug) }}" class="btn btn-primary">View</a>
                                        <a href="{{ url('admin/'.$active.'/update/'.$item->slug) }}" class="btn btn-success">Update</a>
                                        <a href="{{ url('admin/'.$active.'/delete/'.$item->slug) }}" class="btn btn-danger show_confirm">Delete</a>
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

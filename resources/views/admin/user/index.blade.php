@extends('layouts.admin.template')

@section('body')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
                <h6 class="card-title">All Users</h6>
                <div class="table-responsive mb-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Member From</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($data as $item)
                                    <tr class="{{ ($item->active == 0)?'table-danger':'' }}">
                                        <th>{{ $i++ }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role->role_name }}</td>
                                        <td>{{ $item->created_at->format('M Y') }}</td>
                                        <td>
                                            <a href="{{ url('admin/user/update/'. $item->id) }}" class="btn btn-success">Update</a>
                                            <a href="{{ url('admin/user/reset/'. $item->id) }}" class="btn btn-warning">Reset</a>
                                            <a href="" class="btn btn-danger">Delete</a>
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

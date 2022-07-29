@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/role') }}">Role</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Add Role</h6>
                <form method="POST" action="{{ url('admin/role/add') }}">
                    @csrf
                    <div class="mb-1">
                        <label for="role_name" class="form-label">Name</label>
                        <input type="text" autofocus class="form-control @error('role_name') is-invalid @enderror" id="role_name" name="role_name" value="{{ old('role_name') }}" placeholder="Input Role">
                    </div>
                    @error('role_name') <div class="text-danger">{{ $message }}</div> @enderror

                    <button class="btn btn-primary m-1 text-white">Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

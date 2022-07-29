@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/role') }}">Role</a></li>
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
            <h6 class="card-title">Edit Role {{ $data->role_name }}</h6>
                <form method="POST" action="{{ url('admin/role/'. $data->id) }}">
                    @csrf
                    <div class="mb-1">
                        <label for="role_name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('role_name') is-invalid @enderror" id="role_name" name="role_name" value="{{ $data->role_name }}" placeholder="Input Role" autofocus>
                    </div>
                    @error('role_name') <div class="text-danger">{{ $message }}</div> @enderror

                    <button class="btn btn-primary m-1 text-white">Update Role</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/user') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Edit User {{ $data->name }}</h6>
                <form method="POST" action="{{ url('admin/user/update/'. $data->id) }}">
                    @csrf
                    <div class="mb-1">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $data->name }}" placeholder="Input Name">
                    </div>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $data->email }}" placeholder="Input Email" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="role_id" class="form-label">Role</label>
                        <select class="form-select" id="role_id" name="role_id">
                            <option selected value="{{ $data->role_id }}">{{ $data->role->role_name }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" value="1" id="active" name="active" {{ ($data->active == 1)?'checked':'' }}>
                        <label class="form-check-label" for="active">
                            Active
                        </label>
                    </div>
                    <button class="btn btn-primary m-1 text-white">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var role_id = document.querySelector('#role_id');

    dselect(role_id, {
        search: true
    });
</script>
@endsection

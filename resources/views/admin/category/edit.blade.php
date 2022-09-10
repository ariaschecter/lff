@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/category') }}">Category</a></li>
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
                <form method="POST" action="{{ url('admin/category/'. $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1">
                        <label for="category_name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{ $data->category_name }}" placeholder="Input Category" autofocus>
                    </div>
                    @error('category_name') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="category_picture" class="form-label">Picture</label>
                        <input type="file" autofocus class="form-control @error('category_picture') is-invalid @enderror" id="category_picture" name="category_picture">
                    </div>
                    @error('category_picture') <div class="text-danger">{{ $message }}</div> @enderror

                    <button class="btn btn-primary m-1 text-white">Update Category</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-3">
        <div class="card mb-3 p-2">
            <img src="{{ asset('storage/'. $data->category_picture) }}" class="card-img-top" alt="{{ $data->category_name }}">
          </div>
    </div>
</div>
@endsection

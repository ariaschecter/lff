@extends('layouts.admin.template')

@section('body')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/course') }}">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    @include('sweetalert::alert')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card col-lg-6">
        <div class="card ">
            <div class="card-body">
            <h6 class="card-title">Add Course</h6>
                <form method="POST" action="{{ url('admin/course/add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1">
                        <label for="course_name" class="form-label">Name</label>
                        <input type="text" autofocus class="form-control @error('course_name') is-invalid @enderror" id="course_name" name="course_name" value="{{ old('course_name') }}" placeholder="Input Course Name">
                    </div>
                    @error('course_name') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="course_picture" class="form-label">Picture</label>
                        <input type="file" autofocus class="form-control @error('course_picture') is-invalid @enderror" id="course_picture" name="course_picture">
                    </div>
                    @error('course_picture') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="desc" class="form-label">Description</label>
                        <textarea name="desc" class="form-control" @error('desc') is-invalid @enderror id="desc" cols="30" rows="10"></textarea>
                    </div>
                    @error('desc') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="price_old" class="form-label">Price Old</label>
                        <input type="number" class="form-control @error('price_old') is-invalid @enderror" id="price_old" name="price_old" value="{{ old('price_old') }}" placeholder="Input Price Old">
                    </div>
                    @error('price_old') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="mb-1">
                        <label for="price_new" class="form-label">Price New</label>
                        <input type="number" class="form-control @error('price_new') is-invalid @enderror" id="price_new" name="price_new" value="{{ old('price_new') }}" placeholder="Input Course">
                    </div>
                    @error('price_new') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active">
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>

                    <button class="btn btn-primary m-1 text-white">Add Course</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var category_id = document.querySelector('#category_id');

    dselect(category_id, {
        search: true
    });
</script>
@endsection

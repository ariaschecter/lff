@extends('layouts.user.person')

@section('body')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('edit-profile') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <span class="h1 fw-bold mb-0">Profile</span>
            </div>

            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Edit your Profile</h5>

            <div class="form-outline mb-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" placeholder="Input Name">
            </div>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" placeholder="Email" readonly>
            </div>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            <div class="form-outline mb-4">
                <label for="user_picture" class="form-label mb-3">User Picture (optional)</label>
                <input type="file" class="form-control @error('user_picture') is-invalid @enderror" id="user_picture" name="user_picture">
            </div>
            @error('user_picture') <div class="text-danger">{{ $message }}</div> @enderror

            <div class="pt-1 mb-4">
                <button class="btn theme_btn free-btn"
                    type="submit">Edit Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection

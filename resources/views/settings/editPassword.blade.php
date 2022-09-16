@extends('layouts.user.person')

@section('body')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('edit-password') }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-center mb-3 pb-1">
                <span class="h1 fw-bold mb-0">Profile</span>
            </div>

            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Edit your Password</h5>

            <div class="form-outline mb-4">
                <label for="oldPassword" class="form-label">Old Password</label>
                <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword" placeholder="Input Old Password">
            </div>
            @error('oldPassword') <div class="text-danger">{{ $message }}</div> @enderror

            <div class="form-outline mb-4">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" placeholder="Input New Password">
            </div>
            @error('newPassword') <div class="text-danger">{{ $message }}</div> @enderror
            <div class="form-outline mb-4">
                <label for="passwordConfirmation" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control @error('passwordConfirmation') is-invalid @enderror" id="passwordConfirmation" name="passwordConfirmation" placeholder="Input New Password">
            </div>
            @error('passwordConfirmation') <div class="text-danger">{{ $message }}</div> @enderror

            <div class="pt-1 mb-4">
                <button class="btn theme_btn free-btn"
                    type="submit">Edit Password</button>
            </div>
        </form>
    </div>
</div>
@endsection

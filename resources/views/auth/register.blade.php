@extends('layouts.user.template')

@section('body')
@include('sweetalert::alert')
<main>
    <!--page-title-area start-->
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section class="vh-100" style="background-color: white;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ url('auth/register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                                            <span class="h1 fw-bold mb-0">Register</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register Your
                                            Account Here</h5>

                                        <div class="form-outline mb-4">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Input Name">
                                        </div>
                                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                        <div class="form-outline mb-4">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                        <div class="mb-1">
                                        <div class="form-outline mb-4">
                                            <label for="user_picture" class="form-label">User Picture</label>
                                            <input type="file" class="form-control @error('user_picture') is-invalid @enderror" id="user_picture" name="user_picture">
                                        </div>

                                        @error('user_picture') <div class="text-danger">{{ $message }}</div> @enderror
                                        <div class="mb-1">
                                        <div class="form-outline mb-1">

                                        <div class="form-outline mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                        </div>
                                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                        <div class="form-outline mb-4">
                                            <label for="password1" class="form-label">Password Confirmation</label>
                                            <input type="password" class="form-control @error('password1') is-invalid @enderror" id="password1" name="password1" placeholder="Password Confirmation">
                                        </div>
                                        @error('password1') <div class="text-danger">{{ $message }}</div> @enderror


                                        <div class="pt-1 mb-4">
                                            <button class="btn theme_btn free-btn"
                                                type="submit">Register</button>
                                        </div>

                                        <p class="mb-2 pb-lg-2" style="color: #393f81;">Already a user? <a
                                                href="{{ url('auth') }}" style="color: #393f81;">Sign In</a></p>
                                        {{-- <div class="text-center">
                                            <p>or sign up with:</p>
                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-google"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-twitter"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-github"></i>
                                            </button>
                                        </div> --}}
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid"
                                    style="border-radius: 0 1rem 1rem 0; height: 100%;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--contact-form-area end-->
</main>
@endsection

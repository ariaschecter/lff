@extends('layouts.user.template')

@section('body')
@include('sweetalert::alert')
<main>
    <section class="vh-100" style="background-color: white;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ url('auth/register') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
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
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ url('user/img/auth/designregis.png') }}"
                                    alt="login form" class="img-fluid"
                                    style="border-radius: 0 1rem 1rem 0; height: 100%;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

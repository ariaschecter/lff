@extends('layouts.user.template')

@section('body')
@include('sweetalert::alert')
<main>
    <!--page-title-area start-->
    <!-- Section: Design Block -->
    <section class="vh-100" style="background-color: white;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ url('user/img/auth/design.png') }}"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    {{-- <form class="forms-sample" method="post" action="{{ url('auth/reset') }}">
                                        @csrf
                                        <input type="hidden" class="form-control" id="email" name="email" value="{{ $email }}">
                                        <div class="mb-1">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                        </div>
                                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                        <div class="mb-1">
                                            <label for="password1" class="form-label">Password Confirmation</label>
                                            <input type="password" class="form-control @error('password1') is-invalid @enderror" id="password1" name="password1" placeholder="Password Confirmation">
                                        </div>
                                        @error('password1') <div class="text-danger">{{ $message }}</div> @enderror

                                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Forgot Password</button>
                                    </form> --}}

                                    <form class="forms-sample" method="post" action="{{ url('auth/reset') }}">
                                        @csrf
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forgot Password</h5>
                                        <h6 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Input New Password</h6>
                                        <input type="hidden" class="form-control" id="email" name="email" value="{{ $email }}">
                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                        </div>
                                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control @error('password1') is-invalid @enderror" id="password1" name="password1" placeholder="Password Confirmation">
                                        </div>
                                        @error('password1') <div class="text-danger">{{ $message }}</div> @enderror

                                        <div class="pt-1 mb-4">
                                            <button class="btn theme_btn btn-lg btn-block"
                                                type="submit">Reset Password</button>
                                        </div>
                                    </form>

                                </div>
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


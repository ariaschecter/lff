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
                                <img src="{{ url('user/img/auth/designforgotpw.png') }}"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form class="forms-sample" method="post" action="{{ url('auth/forgotpassword') }}">
                                        @csrf
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Forgot Password</h5>
                                        <h6 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">make sure your account is registered</h6>

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email address">
                                        </div>

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

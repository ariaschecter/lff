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
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form class="forms-sample" method="post" action="{{ url('auth') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                                            <span class="h1 fw-bold mb-0">Login</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>

                                            <div class="form-outline mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-outline mb-3">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" for="password">Password</label><a href="{{ url('auth/forgotpassword') }}"><small>Forgot Password?</small></a>
                                                </div>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn theme_btn free-btn"
                                                type="submit">Login</button>
                                        </div>

                                        <p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="{{ url('auth/register') }}" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
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


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

                                                            <div class="col-md-8 col-lg-6 d-flex align-items-center">
                                                                <div class="card-body p-4 p-lg-5 text-black">

                                                                    <form class="forms-sample" method="post" action="{{ url('resend-email') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="email" value="{{ $email }}">
                                                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Email Verification</h5>
                                                                        <h6 class="fw-normal" style="letter-spacing: 1px;">We have sent a verification mail to your account</h6>
                                                                        <h6 class="fw-normal" style="letter-spacing: 1px;">Not recieve any email?</h6>
                                                                        <h6 class="fw-normal" style="letter-spacing: 1px;">Resend link?</h6>
                                                                        <div class="pt-30" id="timer_div"></div>
                                                                        <script>
                                                                            var seconds_left = 60;
                                                                            var interval = setInterval(function () {
                                                                                document.getElementById('timer_div').innerHTML = --seconds_left;
                                                                                let text = "resend the verification email"
                                                                                let result = '<div><button type="submit" class="btn btn-primary ">' + text + "</button></div>";
                                                                                if (seconds_left <= 0) {
                                                                                    document.getElementById('timer_div').innerHTML = result;
                                                                                    clearInterval(interval);
                                                                                }
                                                                            }, 1000);
                                                                        </script>

                                                                        {{-- <div class="pt-1 mb-4">
                                                                            <button style="text-decoration: none">asdasd</button>
                                                                        </div> --}}
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

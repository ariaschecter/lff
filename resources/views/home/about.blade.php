@extends('layouts.user.template')

@section('body')
<main>
    <section class="vh-100" style="background-color: white;">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-sm-8 col-lg-6 pt-50">
                
                <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                  <div class="section-title text-center mb-50">
                    <h2>Our Team</h2>
                </div>
                  <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
                  <div class="line"></div>
                </div>
              </div>
            </div>
            <div class="row">
              
              <div class="profile-card-2"><img src="{{ url('user/img/profile-team/yuda.JPG') }}" class="img img-responsive">
                <div class="profile-name">Prayuda Riansyah</div>
                <div class="profile-username">CEO</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>

            <div class="profile-card-2"><img src="{{ url('user/img/profile-team/aria.JPG') }}" class="img img-responsive">
                <div class="profile-name">Aria Maulana E.</div>
                <div class="profile-username">DEVELOPER</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
            <div class="profile-card-2"><img src="{{ url('user/img/profile-team/ainur.JPG') }}" class="img img-responsive">
                <div class="profile-name">M. Ainur B. R.</div>
                <div class="profile-username">DEVELOPER</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
              <div class="profile-card-2"><img src="{{ url('user/img/profile-team/nabil.JPG') }}" class="img img-fluid">
                <div class="profile-name">Nabil Ihza A.</div>
                <div class="profile-username">KREATIF & MARKETING</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
            </div>
          </div>
    </section>
</main>
@endsection

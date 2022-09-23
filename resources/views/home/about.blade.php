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
                @foreach ($data as $item)
                    <div class="profile-card-2"><img src="{{ url('user/img/profile-team/'. $item['img']) }}" class="img img-responsive" alt="Foto {{ $item['nama'] }}">
                        <div class="profile-name">{{ $item['nama'] }}</div>
                        <div class="profile-username">{{ $item['position'] }}</div>
                        <div class="profile-icons">
                            <a href="https://www.instagram.com/{{ $item['instagram'] }}"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/{{ $item['linkedin'] }}"><i class="fa fa-linkedin"></i></a></div>
                    </div>
                @endforeach
            </div>
          </div>
    </section>
</main>
@endsection

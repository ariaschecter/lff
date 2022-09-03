@extends('layouts.user.template')

@section('body')
          <!--course-details-area start-->
          <section class="course-details-area pt-150 pb-120 pt-md-100 pb-md-70 pt-xs-100 pb-xs-70">
            <div class="container">
                    <div class="row">
                        <div class="col-xxl-7 col-xl-7">
                            <div class="courses-details-wrapper mb-30">
                                <h2 class="courses-title mb-30">Course : {{ $course->course_name }}</h2>
                                {{-- <h5>Photography Specialist By Jason Momoa</h5> --}}
                                <div class="course-details-img mb-30" style="background-image: url({{ asset('storage/'. $course->course_picture) }});">
                                  <div class="video-wrapper">
                                      <a href="https://www.youtube.com/watch?v={{ $list->link }}" class="popup-video"><i class="fas fa-play"></i></a>
                                      </div>
                                  </div>
                                  {{-- <div class="courses-tag-btn">
                                      <a href="#">Add to wishlist</a>
                                      <a href="#">Share</a>
                                      <a href="#">Gift this course</a>
                                  </div> --}}
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-5">
                            <div class="learn-area mb-30">
                                <ul class="cart-list-tag d-sm-inline-flex align-items-center mb-10">
                                    <li>
                                        <div class="price-list">
                                            <h5><span>Rp. {{ number_format($course->price_old, 0) }}</span> <b class="sub-title">Rp. {{ number_format($course->price_new, 0) }}</b></h5>
                                        </div>
                                    </li>
                                    <li>
                                         <div class="cart-btn">
                                              <a class="theme_btn" href="@auth {{ $link }} @else {{ url('auth') }} @endauth">{{ $payed ? 'Continue Learning' : 'Add To Cart' }}</a>
                                          </div>
                                    </li>
                                    <li>
                                       <div class="video-wrapper courses-cart-video">
                                          <a href="https://www.youtube.com/watch?v={{ $list->link }}" class="popup-video"><i class="fas fa-play"></i></a>
                                       </div>
                                    </li>
                                </ul>
                                <div class="courses-ingredients">
                                    {{-- <div class="courses-ingredients"> --}}
                                        <h2 class="corses-title mb-30">Course Includes</h2>
                                        {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod tempor invidunt ut labore et dolore.</p> --}}
                                        <ul class="courses-item mt-25">
                                            <li><img src="{{ url('user/img/icon/video.svg') }}" alt=""> {{ $time }} hours video</li>
                                            <li><img src="{{ url('user/img/icon/newspaper.svg') }}" alt=""> 73 articles</li>
                                            <li><img src="{{ url('user/img/icon/download.svg') }}" alt=""> {{ $course->enroll }}+ Enrolls Member</li>
                                            <li><img src="{{ url('user/img/icon/infinity.svg') }}" alt=""> Full Lifetime Access</li>
                                            <li><img src="{{ url('user/img/icon/mobile.svg') }}" alt=""> Access on mobile or any devices</li>
                                            {{-- <li><img src="{{ url('user/img/icon/certificate-line.svg') }}" alt=""> Certificate of completion</li> --}}
                                        </ul>
                                    {{-- </div> --}}
                                </div>
                                {{-- <div class="learn-box">
                                    <h5>{{ count($lists) }} Lessons ( {{ $time }}h )</h5>

                                    <ul class="learn-list">
                                        @foreach ($lists as $item)
                                            <li>
                                                <a href="{{ $item->free ? $item->link : url('course/order/'.$course->id) }}">
                                                    <span class="play-video"><i class="fal {{ $item->free ? 'fa-play' : 'fa-lock-alt' }}"></i></span> {{ $item->no.' '. $item->list_name }} <span class="time float-end">{{ $item->time }} minutes</span>
                                                </a>
                                            </li>
                                        @endforeach
                                                        <li>
                                                            <a href="https://www.youtube.com/watch?v=7omGYwdcS04">
                                                                <span class="play-video"><i class="fal fa-lock-alt"></i></span> 02. How to Open Camera <span class="time float-end">2:03</span>
                                                            </a>
                                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="project-details mb-65">
                                <h2 class="courses-title mb-30">Description </h2>
                                <p>{{ $course->desc }}</p>
                                {{-- <ul class="seller-rating d-md-inline-flex align-items-center mt-20 mb-10">
                                    <li>
                                        <a href="#" class="theme_btn mb-10">Bestseller</a>
                                    </li>
                                    <li>
                                      <div class="star-icon mb-10">
                                          <a href="#"><i class="fas fa-star"></i></a>
                                          <a href="#"><i class="fas fa-star"></i></a>
                                          <a href="#"><i class="fas fa-star"></i></a>
                                          <a href="#"><i class="fas fa-star"></i></a>
                                          <a href="#"><i class="fas fa-star"></i></a>
                                          <a href="#">4.8 ( 256,384)</a>
                                      </div>
                                    </li>
                                    <li>
                                        <h5 class="mb-10">Enroll 360,349</h5>
                                    </li>
                                </ul>
                                <h5 class="mb-25"><span>Created by</span> Jason Momoa & Uxaction Photography team</h5> --}}
                                <div class="date-lang mt-25">
                                    <span><b>Date :</b> {{ $course->updated_at->format('M Y') }}</span>
                                    <span><b>Language :</b> Indonesia</span>
                                </div>
                            </div>
                            {{-- <div class="meet-our-teacher mb-65">
                                 <h2 class="courses-title mb-30">Meet Your Teacher</h2>
                                 <div class="teachers-content mb-25">
                                     <img class="teacher_01" src="assets/img/course/details/teacher.png" alt="">
                                     <div class="teachers-content__text">
                                         <h5>Jason Momoa</h5>
                                         <p>Photography Specialist</p>
                                     </div>
                                 </div>
                                 <p class="mb-20">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod tempor invidunt ut labore et dolore magn aliq erat.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod tempor invidunt ut labore et dolore magn aliq erat.</p>
                                 <p class="mb-20">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod tempor invidunt ut labore et dolore magn aliq erat.Lorem ipsum dolor.</p>
                                 <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod tempor invidunt ut labore et dolore magn aliq erat.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy.</p>
                            </div>
                            <div class="skill-area">
                                <h2 class="courses-title mb-35">Related Skills</h2>
                                <div class="courses-tag-btn">
                                      <a href="#">Photography</a>
                                      <a href="#">Outdoor</a>
                                      <a href="#">Indoor Photography</a>
                                      <a href="#">DSLR</a>
                                      <a href="#">Creative</a>
                                      <a href="#">Camera</a>
                                      <a href="#">Professional</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-xl-6 col-lg-5">

                        </div>
                    </div>
                </div>
        </section>
        <!--course-details-area end-->
@endsection

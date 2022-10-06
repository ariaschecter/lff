@extends('layouts.user.template')

@section('body')
        <section class="course-details-area pt-150 pb-100 pt-md-100 pb-md-70 pt-xs-100 pb-xs-70">
            <div class="container">
                    <div class="row">
                        <div class="col-xxl-7 col-xl-7">
                            <div class="courses-details-wrapper mb-30">
                                <h2 class="courses-title mb-30">Course : {{ $course->course_name }}</h2>
                                {{-- <h5>Photography Specialist By Jason Momoa</h5> --}}
                                <div class="course-details-img mb-30" style="background-image: url({{ asset('storage/'. $course->course_picture) }});">
                                    <div class="video-wrapper">
                                        <a href="https://www.youtube.com/watch?v={{ $courselist[0]->link }}" class="popup-video"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-5">
                            <div class="learn-area mb-30">
                                <ul class="cart-list-tag d-sm-inline-flex align-items-center mb-10">
                                    <li>
                                        <div class="price-list">
                                            <h5><span>Rp. {{ number_format($course->price_old, 0) }}</span> <b class="sub-title">Rp. {{number_format($course->price_new, 0)}}</b></h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="cart-btn">
                                            <a class="theme_btn" href="@auth {{ $link }} @else {{ url('auth') }} @endauth">{{ $payed ? 'Continue Learning' : 'Add To Cart' }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="video-wrapper courses-cart-video">
                                            <a href="https://www.youtube.com/watch?v={{ $courselist[0]->link }}" class="popup-video"><i class="fas fa-play"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="courses-ingredients">
                                        <h2 class="corses-title mb-30">Course Includes</h2>
                                        
                                        <ul class="courses-item mt-25">
                                            <li><img src="{{ url('user/img/icon/video.svg') }}" alt=""> {{ $time }} hours video</li>
                                            <li><img src="{{ url('user/img/icon/newspaper.svg') }}" alt=""> {{ count($courselist) }} Videos</li>
                                            <li><img src="{{ url('user/img/icon/download.svg') }}" alt=""> {{ $course->enroll }}+ Enrolls Member</li>
                                            <li><img src="{{ url('user/img/icon/infinity.svg') }}" alt=""> Full Lifetime Access</li>
                                            <li><img src="{{ url('user/img/icon/mobile.svg') }}" alt=""> Access on mobile or any devices</li>
                                            {{-- <li><img src="{{ url('user/img/icon/certificate-line.svg') }}" alt=""> Certificate of completion</li> --}}
                                        </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="project-details mb-65">
                                <h2 class="courses-title mb-30">Description </h2>
                                <p>{{ $course->desc }}</p>

                                <div class="date-lang mt-25">
                                    <span><b>Date :</b> {{ $course->updated_at->format('M Y') }}</span>
                                    <span><b>Language :</b> Indonesia</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5">
                        </div>
                    </div>
                </div>
        </section>
        <section class="faq-area pb-150 pt-xs-95 pb-xs-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="faq-que-list mb-30">
                            <div class="section-title text-center mb-45">
                                <h2 class="mb-25">Silabus</h2>
                            </div>
                            <div class="accordion accordion-two">
                                {{-- <div class="accordion-item mb-30">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Judul materi
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accoedion-ex-two">
                                        <div class="accordion-body">
                                            <p>Deskripsi materi</p>
                                        </div>
                                    </div>
                                </div> --}}
                                @foreach ($subCourse as $subList)
                                @php
                                $explode = explode(' ', $subList->sub_list_name);
                                $collapse_name = $subList->sub_list_name;
                                if (count($explode)>1) {
                                    $collapse_name = $explode[1];
                                }
                                @endphp
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="heading{{$collapse_name}}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$collapse_name}}" aria-expanded="false" aria-controls="collapse{{$collapse_name}}">
                                                {{ $subList->sub_list_name }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$collapse_name}}" class="accordion-collapse collapse" aria-labelledby="heading{{$collapse_name}}" data-bs-parent="#accoedion-ex-two">
                                            <div class="accordion-body">
                                                @foreach ($subList->courselist as $list)
                                                    <p>{{ $list->no }}. {{ $list->list_name }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </section>
@endsection

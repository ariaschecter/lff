@extends('layouts.user.person')

@section('body')
<section class="feature-course pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-title text-center mb-50">
                    <h5 class="bottom-line mb-25">My Course</h5>
                    <h2>Explore our Courses</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 text-center">
                <div class="portfolio-menu mb-30">
                    <button class="gf_btn active" data-filter='*'>All</button>
                    @foreach ($categories as $item)
                    <button class="gf_btn" data-filter='.{{ $item->id }}'>{{ $item->category_name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="grid row">
        @foreach ($courses as $item)
            <div class="col-lg-4 col-md-6 grid-item {{ $item->course->category_id }}">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="{{ url('course/access/'.$item->course->slug) }}"><img class="img-fluid" src="{{ asset('storage/'. $item->course->course_picture) }}" alt="{{ $item->course->course_name }}"></a>
                        <div class="feedback-tag">{{ $item->course->category->category_name }}</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <h4 class="sub-title mb-20"><a href="{{ url('course/access/'.$item->course->slug) }}">{{ $item->course->course_name }}</a></h4>

                        <div class="course__meta">
                            <span><img class="icon" src="{{ url('user/img/icon/time.svg') }}" alt="course-meta"> {{ count($item->course->courselist) }} Video</span>
                            <span><img class="icon" src="{{ url('user/img/icon/bar-chart.svg') }}" alt="course-meta"> All Levels</span>
                            <span><img class="icon" src="{{ url('user/img/icon/user.svg') }}" alt="course-meta"> {{ $item->course->enroll }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

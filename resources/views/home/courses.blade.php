@extends('layouts.user.template')

@section('body')


    <section class="feature-course pt-150 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="subscribe-wrapper text-center mb-30">
                    <div class="subscribe-form-box pos-rel">
                        <form class="subscribe-form">
                            <input type="text" name="keyword" value="{{ request()->keyword }}" placeholder="Search ...">
                            <button class="sub_btn">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         </div>
        <div class="container">
            <div class="row">
               <div class="col-xl-12">
                    <div class="section-title text-center mb-50">
                        <h5 class="bottom-line mb-25">Featured Courses</h5>
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
                   <div class="col-lg-4 col-md-6 grid-item {{ $item->category_id }}">
                       <div class="z-gallery mb-30">
                           <div class="z-gallery__thumb mb-20">
                               <a href="course-details.html"><img class="img-fluid" src="{{ $item->course_picture }}" alt="{{ $item->course_name }}"></a>
                               <div class="feedback-tag">{{ $item->category->category_name }}</div>
                               <div class="heart-icon"><i class="fas fa-heart"></i></div>
                           </div>
                           <div class="z-gallery__content">
                            <div class="price-list">
                                <h5><span class="text-danger">Rp. {{ number_format($item->price_old, 0) }}</span> <b class="sub-title">Rp. {{ number_format($item->price_new, 0) }}</b></h5>
                            </div>
                               <h4 class="sub-title mb-20"><a href="{{ url('course/'.$item->id) }}">{{ $item->course_name }}</a></h4>

                               <div class="course__meta">
                                   <span><img class="icon" src="{{ url('user/img/icon/time.svg') }}" alt="course-meta"> {{ count($item->courselist) }} Class</span>
                                   <span><img class="icon" src="{{ url('user/img/icon/bar-chart.svg') }}" alt="course-meta"> All Levels</span>
                                   <span><img class="icon" src="{{ url('user/img/icon/user.svg') }}" alt="course-meta"> {{ $item->enroll }}</span>
                               </div>
                           </div>
                       </div>
                   </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

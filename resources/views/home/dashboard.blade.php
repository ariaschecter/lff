@extends('layouts.user.template')

@section('body')

<main>
    <section class="slider-area pt-180 pt-xs-150 pt-150 pb-xs-35">
        <img class="sl-shape shape_01" src="{{ url('user/img/icon/01.svg') }}" alt="">
        <img class="sl-shape shape_02" src="{{ url('user/img/icon/02.svg') }}" alt="">
        <img class="sl-shape shape_03" src="{{ url('user/img/icon/03.svg') }}" alt="">
        <img class="sl-shape shape_04" src="{{ url('user/img/icon/04.svg') }}" alt="">
        <img class="sl-shape shape_05" src="{{ url('user/img/icon/05.svg') }}" alt="">
        <img class="sl-shape shape_06" src="{{ url('user/img/icon/06.svg') }}" alt="">
        <img class="sl-shape shape_07" src="{{ url('user/img/shape/dot-box-5.svg') }}" alt="">
        <div class="main-slider pt-10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 order-last order-lg-first">
                        <div class="slider__img__box mb-50 pr-30">
                            <img class="img-one mt-55 pr-70" src="{{ url('user/img/logo/big_dashboard.gif') }}" alt="">
                            <img class="slide-shape img-two" src="{{ url('user/img/logo/right.jpg') }}" alt="">
                            <img class="slide-shape img-three" src="{{ url('user/img/logo/left.jpg') }}" alt="">
                            <img class="slide-shape img-four" src="{{ url('user/img/shape/dot-box-1.svg') }}" alt="">
                            <img class="slide-shape img-five" src="{{ url('user/img/shape/dot-box-2.svg') }}" alt="">
                            <!--<img class="slide-shape img-six" src="{{ url('user/img/shape/zigzg-1.svg') }}" alt="">-->
                            <img class="slide-shape img-seven wow fadeInRight animated" data-delay="1.5s" src="{{ url('user/img/icon/dot-plan-1.svg') }}" alt="Chose-img">
                            <img class="slide-shape img-eight" src="{{ url('user/img/slider/earth-bg.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="slider__content pt-15">
                            <h1 class="main-title mb-40 wow fadeInUp2 animated" data-wow-delay='.1s'>Learn Everyday & Any New Skills Online with Top <span>Instructors.</span></h1>
                            <h5 class="mb-35 wow fadeInUp2 animated" data-wow-delay='.2s'>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</h5>
                            <ul class="search__area d-md-inline-flex align-items-center justify-content-between mb-30">
                                <li>
                                    <div class="widget__search">
                                        <form class="input-form" action="#">
                                            <input type="text" placeholder="Find Courses">
                                        </form>
                                        <button class="search-icon"><i class="far fa-search"></i></button>
                                    </div>
                                </li>
                                <li>
                                    <div class="widget__select">
                                        <select name="select-cat" id="select">
                                            <option value="">Categories</option>
                                            <option value="">Class One</option>
                                            <option value="">Class Two</option>
                                            <option value="">Class Three</option>
                                            <option value="">Class Four</option>
                                            <option value="">Class Five</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <button class="theme_btn search_btn ml-35">Search Now</button>
                                </li>
                            </ul>
                            <p class="highlight-text"><span>#1</span> Worldwide Online Learning & Skills Development Platform</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="great-deal-area pt-150 pb-90 pt-md-100 pb-md-40 pt-xs-100 pb-xs-40">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-start">
                <div class="col-xl-3 col-lg-8">
                    <div class="deal-box mb-30 text-center text-xl-start">
                        <h2 class="mb-20"><b>Great</b> Deals For You</h2>
                        <p>There are many variations of passa of Lorem Ipsum available, but the majority have suffered.</p>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="deal-active owl-carousel mb-30">
                        <div class="single-item">
                            <div class="single-box mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/puzzle.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">Learn New Skills</h4>
                                <p>There are many variations of pas of Lorm Ipsum available.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-box s-box2 mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/manager.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">Expert Trainers</h4>
                                <p>There are many variations of pas of Lorm Ipsum available.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-box mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/puzzle.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">True Way to Learn</h4>
                                <p>There are many variations of pas of Lorm Ipsum available.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-box s-box2 mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/manager.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">Expert Trainers</h4>
                                <p>There are many variations of pas of Lorm Ipsum available.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="what-looking-for pos-rel">
        <div class="what-blur-shape-one"></div>
        <div class="what-blur-shape-two"></div>
        <div class="what-look-bg gradient-bg pt-145 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
            <div class="container">
                <div class="categoris-container">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-55">
                            <h5 class="bottom-line mb-25">Browse Categories</h5>
                            <h2>Explore our Online Subjects</h2>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">

                        @foreach ($categories as $category)
                            <div class="col">
                                <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                                    <img class="mb-30 img-thumbnail" src="{{ asset('storage/'.$category->category_picture) }}" alt="gambar {{ $category->category_name }}">
                                    <h4 class="sub-title mb-10"><a href="{{ url('category/'.$category->slug) }}">{{ $category->category_name }}</a></h4>
                                    <p>{{ count($category->course) }} Courses Available</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-20 text-center mb-20 wow fadeInUp2 animated" data-wow-delay='.6s'>
                            <a href="{{ url('categories') }}" class="theme_btn">All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feature-course pt-150 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title text-center mb-50">
                        <h5 class="bottom-line mb-25">Featured Courses</h5>
                        <h2>Explore our Popular Courses</h2>
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
                                <a href="course-details.html"><img class="img-fluid" src="{{ asset('storage/'. $item->course_picture) }}" alt="{{ $item->course_name }}"></a>
                                <div class="feedback-tag">{{ $item->category->category_name }}</div>
                                <div class="heart-icon"><i class="fas fa-heart"></i></div>
                            </div>
                            <div class="z-gallery__content">
                            <div class="price-list">
                                <h5><span class="text-danger">Rp. {{ number_format($item->price_old, 0) }}</span> <b class="sub-title">Rp. {{ number_format($item->price_new, 0) }}</b></h5>
                            </div>
                                <h4 class="sub-title mb-20"><a href="{{ url('course/'.$item->slug) }}">{{ $item->course_name }}</a></h4>

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
            <div class="row">
                <div class="col-lg-12 mt-20 text-center mb-20 wow fadeInUp2 animated" data-wow-delay='.3s'>
                    <a href="{{ url('courses') }}" class="theme_btn">All Courses</a>
                </div>
            </div>
        </div>
    </section>
    <div class="why-chose-section-wrapper gradient-bg mr-100 ml-100">
        <section class="why-chose-us">
            <div class="why-chose-us-bg pt-150 pb-175 pt-md-95 pb-md-90 pt-xs-95 pb-xs-90">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="chose-img-wrapper mb-50 pos-rel">
                                <div class="coures-member">
                                    <h5>Total Students</h5>
                                    <img class="choses chose_01" src="{{ url('user/img/chose/01.png') }}" alt="Chose-img">
                                    <img class="choses chose_02" src="{{ url('user/img/chose/02.png') }}" alt="Chose-img">
                                    <img class="choses chose_03" src="{{ url('user/img/chose/03.png') }}" alt="Chose-img">
                                    <img class="choses chose_04" src="{{ url('user/img/chose/04.png') }}" alt="Chose-img">
                                    <span>{{ count($students) }}</span>
                                </div>
                                <div class="feature tag_01"><span><img src="{{ url('user/img/icon/shield-check.svg') }}" alt=""></span> Safe & Secured</div>
                                <div class="feature tag_02"><span><img src="{{ url('user/img/icon/catalog.svg') }}" alt=""></span> 120+ Catalog</div>
                                <div class="feature tag_03"><span><i class="fal fa-check"></i></span> Quality Education</div>
                                <div class="video-wrapper">
                                    <a href="https://www.youtube.com/watch?v=7omGYwdcS04" class="popup-video"><i class="fas fa-play"></i></a>
                                </div>
                                <div class="img-bg pos-rel">
                                    <img class="chose_05 pl-70 pl-lg-0 pl-md-0 pl-xs-0" src="{{ url('user/img/logo/under.webp') }}" alt="Chose-img">
                                </div>
                                <img class="chose chose_06" src="{{ url('user/img/shape/dot-box3.svg') }}" alt="Chose-img">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="chose-wrapper pl-25 pl-lg-0 pl-md-0 pl-xs-0">
                                <div class="section-title mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                                    <h5 class="bottom-line mb-25">Explore LFF</h5>
                                    <h2 class="mb-25">Why Choose LFF?</h2>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages of Lorem Ipsum available.</p>
                                </div>
                                <ul class="text-list mb-40 wow fadeInUp2 animated" data-wow-delay='.2s'>
                                    <li>There are many variations of passages of Lorem Ipsum.</li>
                                    <li>The majority have suffered alteration in some form. </li>
                                    <li>There are many variations of passages of Lorem Ipsum.</li>
                                </ul>
                                <a href="about.html" class="theme_btn wow fadeInUp2 animated" data-wow-delay='.3s'>More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

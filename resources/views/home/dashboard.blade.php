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
                            <h1 class="main-title mb-40 wow fadeInUp2 animated" data-wow-delay='.1s'>Belajar UI/UX & Code Lebih Mudah Dengan Arahan <span>Instruktur.</span></h1>
                            <h5 class="mb-35 wow fadeInUp2 animated" data-wow-delay='.2s'>Mulailah Belajar Bersama Kami Dengan Materi Yang Berkualitas Dan Arahan Yang Tepat.</h5>
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
                        <h2 class="mb-20">Penawaran Terbaik</h2>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="deal-active owl-carousel mb-30">
                        <div class="single-item">
                            <div class="single-box mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/puzzle.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">Sertifikat</h4>
                                <p>Dapatkan sertifikat setelah menyelesaikan kelas.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-box s-box2 mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/manager.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">Akses Selamanya</h4>
                                <p>Course dapat diakses seumur hidup tanpa batas waktu tertentu.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-box mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/puzzle.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">Video Offline</h4>
                                <p>Video yang dapat diwonload untuk ditonton tanpa menggunakan internet.</p>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-box s-box2 mb-30">
                                <div class="single-box__icon mb-25">
                                    <img src="{{ url('user/img/icon/manager.svg') }}" alt="">
                                </div>
                                <h4 class="sub-title mb-20">Materi</h4>
                                <p>Dapatkan referensi materi agar tetap berada di arahan yang sesuai.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Kategori --}}
    {{-- <section class="what-looking-for pos-rel">
        <div class="what-blur-shape-one"></div>
        <div class="what-blur-shape-two"></div>
        <div class="what-look-bg gradient-bg pt-145 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
            <div class="container">
                <div class="categoris-container">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-55">
                            <h5 class="bottom-line mb-25">Browse Categories</h5>
                            <h2>Explore our Categories</h2>
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
    </section> --}}
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
<<<<<<< HEAD
                                <a href="{{ url('course/'.$item->slug) }}><img class="img-fluid" src="{{ asset('storage/'. $item->course_picture) }}" alt="{{ $item->course_name }}"></a>
=======
                                <a href="{{ url('course/'.$item->slug) }}"><img class="img-fluid" src="{{ asset('storage/'. $item->course_picture) }}" alt="{{ $item->course_name }}"></a>
>>>>>>> 0898efced498f2ab6cc5764b953e2ff3233e9c91
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
                                    <h2 class="mb-25">Kenapa Memilih LFF?</h2>
                                </div>
                                <ul class="text-list mb-40 wow fadeInUp2 animated" data-wow-delay='.2s'>
                                    <li>Materi Berkualitas. </li>
                                    <li>Harga Terjangkau. </li>
                                    <li>Instruktur Berpengalaman. </li>
                                    <li>Mendapatkan Sertifikat Kelulusan. </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

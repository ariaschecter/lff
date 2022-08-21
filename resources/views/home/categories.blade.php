@extends('layouts.user.template')

@section('body')
<div class="categoris-container">
    <div class="col-xl-12">
        <div class="section-title text-center mb-55">
            <h5 class="bottom-line mb-25">Browse Categories</h5>
            <h2>Explore our Online Subjects</h2>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
        <div class="col">
            <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                <img class="mb-30" src="{{ url('user/img/category-icon/atom.svg') }}" alt="">
                <h4 class="sub-title mb-10"><a href="course-details.html">Science</a></h4>
                <p>126+ Courses Available</p>
            </div>
        </div>
        <div class="col">
            <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>
                <img class="mb-30" src="{{ url('user/img/category-icon/web-development.svg') }}" alt="">
                <h4 class="sub-title mb-10"><a href="course-details.html">Development</a></h4>
                <p>325+ Courses Available</p>
            </div>
        </div>
        <div class="col">
            <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.3s'>
                <img class="mb-30" src="{{ url('user/img/category-icon/atom.svg') }}" alt="">
                <h4 class="sub-title mb-10"><a href="course-details.html">Science</a></h4>
                <p>95+ Courses Available</p>
            </div>
        </div>
        <div class="col">
            <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.4s'>
                <img class="mb-30" src="{{ url('user/img/category-icon/career-path.svg') }}" alt="">
                <h4 class="sub-title mb-10"><a href="course-details.html">Career</a></h4>
                <p>156+ Courses Available</p>
            </div>
        </div>
        <div class="col">
            <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.5s'>
                <img class="mb-30" src="{{ url('user/img/category-icon/graphic-tool.svg') }}" alt="">
                <h4 class="sub-title mb-10"><a href="course-details.html">Arts & Design</a></h4>
                <p>136+ Courses Available</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mt-20 text-center mb-20 wow fadeInUp2 animated" data-wow-delay='.6s'>
            <a href="courses.html" class="theme_btn">All Categories</a>
        </div>
    </div>
</div>
@endsection

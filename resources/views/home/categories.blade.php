@extends('layouts.user.template')

@section('body')
<div class="categoris-container container">
    <div class="col-xl-12">
        <div class="section-title text-center mb-55">
            <h5 class="bottom-line mb-25">Browse Categories</h5>
            <h2>Explore our Online Subjects</h2>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
        @php
            $i = 1;
        @endphp
        @foreach ($categories as $item)
            <div class="col">
                <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.{{ $i++ }}s'>
                    <img class="mb-30" src="{{ url('user/img/category-icon/web-development.svg') }}" alt="">
                    <h4 class="sub-title mb-10"><a href="{{ url('category/'.$item->id) }}">{{ $item->category_name }}</a></h4>
                    <p>{{ count($item->course) }}+ Courses Available</p>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-12 mt-20 text-center mb-20 wow fadeInUp2 animated" data-wow-delay='.6s'>
            <a href="courses.html" class="theme_btn">All Categories</a>
        </div>
    </div> --}}
</div>
@endsection

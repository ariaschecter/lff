@extends('layouts.user.template')

@section('body')
<div class="categoris-container container">
    <div class="col-xl-12">
        <div class="section-title text-center mb-55">
            <h5 class="bottom-line mb-25">Browse Categories</h5>
            <h2>Explore our Categories</h2>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5">
        @php
            $i = 1;
        @endphp
        @foreach ($categories as $item)
            <div class="col">
                <div class="single-category text-center mb-30 wow fadeInUp2 animated" data-wow-delay='.{{ $i++ }}s'>
                    <img class="mb-30 img-thumbnail" src="{{ url('storage/'. $item->category_picture) }}" alt="gambar {{ $item->category_name }}">
                    <h4 class="sub-title mb-10"><a href="{{ url('category/'.$item->category_slug) }}">{{ $item->category_name }}</a></h4>
                    <p>{{ count($item->course) }} Courses Available</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

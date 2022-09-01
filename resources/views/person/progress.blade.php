@extends('layouts.user.person')

@section('body')
<section class="feature-course pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
    <div class="container">
        <div class="row">
           <div class="col-xl-12">
                <div class="section-title text-center mb-50">
                    <h5 class="bottom-line mb-25">My Progress</h5>
                    <h2>All Progress</h2>
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
                   <div class="z-gallery z-gallery-two gallery-03 mb-30">
                       <div class="z-gallery__thumb mb-20">
                           <a href="{{ url('course/access/'.$item->course->id) }}"><img class="img-fluid" src="{{ $item->course->course_picture }}" alt="{{ $item->course->course_name }}"></a>
                           <div class="feedback-tag">{{ $item->course->category->category_name }}</div>
                           <div class="heart-icon"><i class="fas fa-heart"></i></div>
                       </div>
                       <div class="z-gallery__content pos-rel">
                           <h4 class="sub-title mb-20"><a href="{{ url('course/access/'.$item->course->id) }}">{{ $item->course->course_name }}</a></h4>
                           <div class="progress">
                               <div class="progress-bar" role="progressbar" style="width: {{ $item->last_access*100 / count($item->course->courselist) }}%;"
                                   aria-valuenow="{{ $item->last_access }}" aria-valuemin="0" aria-valuemax="{{ count($item->course->courselist) }}">{{ $item->last_access*100 / count($item->course->courselist) }}%
                               </div>
                           </div>
                        </div>
                    </div>
               </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

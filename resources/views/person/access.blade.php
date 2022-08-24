@extends('layouts.user.aksescourse')

@section('body')
    <div class="courses-details-wrapper mb-30">
        {{-- <h5>Photography Specialist By Jason Momoa</h5> --}}
        <iframe  src="https://www.youtube.com/embed/{{ $courselist->link }}" class="course-details-img mb-30">
          <div class="video-wrapper">
              <a href="https://www.youtube.com/watch?v=7omGYwdcS04" class="popup-video"><i class="fas fa-play"></i></a>
              </div>
          </iframe>
          <h2 class="courses-title mb-30">{{ $courselist->no.' - '.$courselist->list_name }}</h2>
          <div class="courses-tag-btn">
              <a href="#">Add to wishlist</a>
              <a href="#">Share</a>
              <a href="#">Gift this course</a>
              <a href="{{ $sertif ? url('course/sertif/'.$course->id) : url('course/access/'.$course->id.'/'.$next->id) }}" class="btn btn-primary">Next</a>
          </div>
    </div>

@endsection

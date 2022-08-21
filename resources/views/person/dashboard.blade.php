@extends('layouts.user.person')

@section('body')

    <div class="courses-details-wrapper mb-30">
        <h2 class="courses-title mb-30">{{ $course->course_name }}</h2>
        {{-- <h5>Photography Specialist By Jason Momoa</h5> --}}
        <div class="course-details-img mb-30" style="background-image: url({{ $course->course_picture }});">
          <div class="video-wrapper">
              <a href="https://www.youtube.com/watch?v=7omGYwdcS04" class="popup-video"><i class="fas fa-play"></i></a>
              </div>
          </div>
          <div class="courses-tag-btn">
              <a href="#">Add to wishlist</a>
              <a href="#">Share</a>
              <a href="#">Gift this course</a>
          </div>
    </div>
    <div class="courses-details-wrapper mb-30">
        <h2 class="courses-title mb-30">{{ $course->course_name }}</h2>
        {{-- <h5>Photography Specialist By Jason Momoa</h5> --}}
        <div class="course-details-img mb-30" style="background-image: url({{ $course->course_picture }});">
          <div class="video-wrapper">
              <a href="https://www.youtube.com/watch?v=7omGYwdcS04" class="popup-video"><i class="fas fa-play"></i></a>
              </div>
          </div>
          <div class="courses-tag-btn">
              <a href="#">Add to wishlist</a>
              <a href="#">Share</a>
              <a href="#">Gift this course</a>
          </div>
    </div>

@endsection

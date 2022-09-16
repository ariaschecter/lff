@extends('layouts.user.aksescourse')

@section('body')
    <div class="courses-details-wrapper mb-30">
        
        <iframe  src="https://www.youtube.com/embed/{{ $courselist->link }}" class="course-details-img mb-30" allow="fullscreen"></iframe>
        <h2 class="courses-title mb-30">{{ $courselist->no.' - '.$courselist->list_name }}</h2>
        <div class="courses-tag-btn">
            @if(!$terawal)
                <a href="{{ url('course/access/'.$course->slug.'/'.$prev->id) }}" class="btn btn-primary">Prev</a>
            @endif
            <a href="{{ $terakhir ? url('progress') : url('course/access/'.$course->slug.'/'.$next->id) }}" class="btn btn-primary" style="float: right">{{ $terakhir ? 'Done' : 'Next' }}</a>
        </div>
    </div>

@endsection

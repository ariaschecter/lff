<div class="row">
    <div class="col-xxl-3 col-xl-5">
        <nav class="sidebar">
            <div class="learn-box m-4">
                <h5>{{ count($course->courselist) }} Lessons ( {{ $time }}h )</h5>

                <ul class="learn-list">
                    @php
                        $access = true;
                    @endphp
                    @foreach ($lists as $list)
                        <li class="mt-20">
                            <a href="{{ $access ? url('course/access/'.$course->slug.'/'. $list->id) : '#' }}">
                                <span class="play-video"><i class="fal {{ $access ? 'fa-play' : 'fa-lock-alt' }}"></i> {{ $list->no }}. {{ $list->list_name }} </span> <span class="time float-end">{{ $list->time }} minutes</span>
                            </a>
                        </li>

                        @php
                            if($list->id == $lastaccess->id) $access = false;

                        @endphp

                    @endforeach

                </ul>
            </div>
        </nav>
    </div>

<div class="row">
    <div class="col-xxl-3 col-xl-5">
        <nav class="sidebar">
            {{-- <ul class="cart-list-tag d-sm-inline-flex align-items-center mb-50">
            </ul> --}}
            <div class="learn-box  m-4">
                <h5>{{ count($course->courselist) }} Lessons ( {{ $time }}h )</h5>

                <ul class="learn-list">
                    @php
                        $access = true;
                    @endphp
                    @foreach ($lists as $list)
                        <li>
                            <a href="{{ $access ? url('course/access/'.$course->id.'/'. $list->id) : '#' }}">
                                <span class="play-video"><i class="fal {{ $access ? 'fa-play' : 'fa-lock-alt' }}"></i></span> {{ $list->no }}. {{ $list->list_name }} <span class="time float-end">{{ $list->time }} minu</span>
                            </a>
                        </li>

                        @php
                            if($list->id == $lastaccess->id) $access = false;

                        @endphp


                        {{-- <li>
                            <a href="https://www.youtube.com/watch?v=7omGYwdcS04">
                                <span class="play-video"><i class="fal fa-lock-alt"></i></span> 02. How to Open Camera <span class="time float-end">2:03</span>
                            </a>
                        </li> --}}



                    @endforeach

                </ul>
            </div>
        </nav>
    </div>

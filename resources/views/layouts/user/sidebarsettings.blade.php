@php
    $user = Auth::user();
@endphp


<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="sidebar-header">
            {{-- <div class="col-xl-2"> --}}
                <div class="logo"><a href="{{ url('') }}"><img src="{{ url('user/img/logo/header_logo.png') }}" alt="logo"></a>
                </div>
            {{-- </div> --}}
        </div>

        <ul class="list-unstyled components">
            <img class="rounded-circle mb-5" src="{{ asset('storage/'. $user->user_picture) }}"  width="100" height="100" style="margin-left:30%;" alt="{{ $user->name }}">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li class="active">
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li><a class="nav-item" href="{{ url('progress') }}">Progress</a></li>
            <li><a class="nav-item" href="{{ url('course') }}">Course</a></li>
            <li><a class="nav-item" href="{{ url('order') }}">Order</a></li>
            <li><a class="nav-item" href="{{ url('payment') }}">Payment</a></li>
            <li><a class="nav-item" href="{{ url('setting') }}">Settings</a></li>
        </ul>

    </nav>

    {{-- <nav id="sidebar">
        <div class="p-4 pt-5">
            <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(img/logo/header_logo.jpg);"></a>
            <ul class="list-unstyled components mb-5">
                <li><a class="nav-item" href="{{ url('progress') }}">Progress</a></li>
                <li><a class="nav-item" href="{{ url('course') }}">Course</a></li>
                <li><a class="nav-item" href="{{ url('order') }}">Order</a></li>
                <li><a class="nav-item" href="{{ url('payment') }}">Payment</a></li>
                <li><a class="nav-item" href="{{ url('setting') }}">Settings</a></li>
            </ul>

        </div>
    </nav> --}}

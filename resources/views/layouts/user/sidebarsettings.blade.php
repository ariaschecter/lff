@php
    $user = Auth::user();
@endphp


<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="sidebar-header">
                <div class="logo"><a href="{{ url('') }}"><img src="{{ url('user/img/logo/header_logo.png') }}" alt="logo"></a></div>
        </div>

        <ul class="list-unstyled components">
            <img class="rounded-circle mb-5" src="{{ asset('storage/'. $user->user_picture) }}"  width="100" height="100" style="margin-left:30%;" alt="{{ $user->name }}">
            <li><a class="nav-item" href="{{ url('progress') }}"><i class="fas fa-chart-line"></i><span class="pl-10"> Progress</span></a></li>
            <li><a class="nav-item" href="{{ url('course') }}"><i class="fas fa-laptop-code"></i><span class="pl-10">Course</span></a></li>
            <li><a class="nav-item" href="{{ url('order') }}"><i class="fa fa-shopping-cart"></i><span class="pl-10">Order</span></a></li>
            <li><a class="nav-item" href="{{ url('payment') }}"><i class="fa fa-credit-card"></i><span class="pl-10">Payment</span></a></li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cogs"></i><span class="pl-10">Setting</span></a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="{{ url('edit-profile') }}"><i class="fas fa-user"></i><span class="pl-10">Edit Profile</a>
                    </li>
                    <li>
                        <a href="{{ url('edit-password') }}"><i class="fas fa-key"></i><span class="pl-10">Edit Password</a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>


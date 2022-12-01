@php
    $user = Auth::user();
    if($user){
        $explode = explode(' ', $user->name);

        $username = $user->name;
        if(count($explode) > 2){
            $username = $explode[0] . ' ' . $explode[1];
        }
    }
@endphp

<header>
    <div id="theme-menu-two" class="main-header-area main-head-three pl-100 pr-100 pb-15">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-1">
                    @auth
                    <button type="button" id="sidebarCollapse" class="btn text-sidebar ">
                        <i class="fas fa-align-left"></i>
                    </button>
                    @endauth
                </div>
                <div class="col-xl-8 align-center">
                    <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                        <div class="nav-container">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item active" style="display: none">
                                    </li>
                                    <li class="nav-item active" style="display: none">
                                    </li>
                                    <li class="nav-item active" style="display: none">
                                    </li>
                                    <li class="nav-item active" style="display: none">
                                    @auth
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('dashboard') }}" id="navbarDropdown1" role="button" aria-expanded="false">Dashboard</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('') }}" id="navbarDropdown1" role="button" aria-expanded="false">Home</a>
                                        </li>
                                    @endauth

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Course
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                            <li><a class="dropdown-item" href="{{ url('courses') }}">All Courses</a></li>
                                            <li><a class="dropdown-item" href="{{ url('categories') }}">Categories</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('about') }}" id="navbarDropdown5" role="button"
                                            aria-expanded="false">About Us</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-xl-3 col-lg-2 col-11">
                    <div class="right-nav d-flex align-items-center justify-content-end">
                        <div class="right-btn mr-25 mr-xs-15">
                            @auth
                                <ul class="navbar-nav float-right">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="left: 50px">
                                        <img class="rounded-circle" src="{{ asset('storage/'. $user->user_picture) }}"  width="40" height="40" alt="{{ $user->name }}">
                                        <span class="nav-link" style="right: 20px"><p>{{ $username }}</p></span>
                                    </a>
                                    
                                    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                            <div class="mb-3">
                                                <img class="rounded-circle" src={{ asset('storage/'. $user->user_picture) }} width="80" height="80" alt="{{ $user->name }}">
                                            
                                            </div>
                                            <div class="text-center">
                                                <p class="tx-16 fw-bolder">{{ $username }}</p>
                                                <p class="tx-12 text-muted">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled p-1">
                                            <li class="dropdown-item py-2">
                                                <a href="{{ url('course') }}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="edit"></i>
                                                <span>My Course</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-item py-2">
                                                <a href="{{ url('progress') }}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="edit"></i>
                                                <span>My Progress</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-item py-2">
                                                <a href="{{ url('edit-profile') }}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Profile Settings</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-item py-2">
                                                <a href="{{ url('auth/logout') }}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                                <span>Log Out</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                </ul>
                            @else
                                <ul class="d-flex align-items-center">
                                    <li><a href="{{ url('auth/register') }}" class="theme_btn free_btn">Register</a></li>
                                    <li><a href="{{ url('auth') }}" class="theme_btn free_btn" style="margin-left: 20px">Login</a></li>
                                    
                                </ul>
                            @endauth
                        </div>
                        <div class="hamburger-menu d-md-inline-block d-lg-none text-right">
                            <a href="javascript:void(0);">
                                <i class="far fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</header>


{{-- Mobile Menu --}}
<!-- slide-bar start -->
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
    </div>

    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu">
        <ul id="mobile-menu-active">
        @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}" id="navbarDropdown1" role="button"
                    aria-expanded="false">Dashboard</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('') }}" id="navbarDropdown1" role="button"
                    aria-expanded="false">Home</a>
            </li>
        @endauth
        
            <li class="has-dropdown">
                <a href="#" id="navbarDropdown2" role="button">
                    Course
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ url('courses') }}">All Courses</a></li>
                    <li><a href="{{ url('categories') }}">Categories</a></li>
                </ul>
            </li>
            <li><a href="{{ url('about') }}">About Us</a></li>
            @auth
            <li class="has-dropdown">
                <a href="#" id="navbarDropdown3" role="button">
                    My Profile
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ url('progress') }}">Progress</a></li>
                    <li><a href="{{ url('course') }}">Courses</a></li>
                    <li><a href="{{ url('order') }}">Orders</a></li>
                    <li><a href="{{ url('payment') }}">Payments</a></li>
                    <li><a href="{{ url('edit-profile') }}">Profile Settings</a></li>
                </ul>
            </li>
            @endauth
        </ul>
    </nav>
    <!-- side-mobile-menu end -->
</aside>
<div class="body-overlay"></div>


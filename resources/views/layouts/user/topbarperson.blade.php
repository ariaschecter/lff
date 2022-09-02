@php
    $user = Auth::user();
@endphp

<header>
    <div id="theme-menu-two" class="main-header-area main-head-three pl-100 pr-100 pt-20 pb-15">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-1">
                    @auth
                    <button type="button" id="sidebarCollapse" class="btn text-sidebar ">
                        <i class="fas fa-align-left"></i>
                    </button>
                    @endauth
                </div>
                <div class="col-xl-6">
                    <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                        <div class="nav-container">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item active" style="display: none">
                                    </li>
                                    <li class="nav-item active" style="display: none">
                                    </li>
                                    @auth
                                    <li class="nav-item active" style="display: none">
                                    </li>
                                    <li class="nav-item active" style="display: none">
                                    </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ url('dashboard') }}" id="navbarDropdown1" role="button" aria-expanded="false">Dashboard</a>
                                        </li>
                                    @endauth

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Course
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                            <li><a class="dropdown-item" href="{{ url('courses') }}">All Courses</a></li>
                                            <li><a class="dropdown-item" href="{{ url('progress') }}">Progress</a></li>
                                            <li><a class="dropdown-item" href="{{ url('course') }}">Course</a></li>
                                            <li><a class="dropdown-item" href="{{ url('order') }}">Order</a></li>
                                            <li><a class="dropdown-item" href="{{ url('payment') }}">Payment</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                            <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                            <li><a class="dropdown-item" href="price.html">Price</a></li>
                                            <li><a class="dropdown-item" href="instructor.html">Instructor</a></li>
                                            <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Blog
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                                <li><a class="dropdown-item" href="blog.html">Blog Grid</a></li>
                                                <li><a class="dropdown-item" href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html" id="navbarDropdown5" role="button"
                                            aria-expanded="false">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-xl-3 col-lg-2 col-7">
                    <div class="right-nav d-flex align-items-center justify-content-end">
                        <div class="right-btn mr-25 mr-xs-15">
                            @auth
                                <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="left: 50px">
                                        <img class="rounded-circle" src="{{ asset('storage/'. $user->user_picture) }}"  width="40" height="40" alt="{{ $user->name }}">
                                        <span class="nav-link" style="right: 20px"><p>{{$user->name}}</p></span>
                                        {{-- Gambar ada 2 link --}}
                                    </a>
                                        {{-- Gambar ada 2 link --}}
                                    </a>
                                    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                            <div class="mb-3">
                                                <img class="rounded-circle" src={{ asset('storage/'. $user->user_picture) }} width="80" height="80" alt="{{ $user->name }}">
                                                {{-- Link kedua --}}
                                            </div>
                                            <div class="text-center">
                                                <p class="tx-16 fw-bolder">{{ $user->name }}</p>
                                                <p class="tx-12 text-muted">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled p-1">
                                            <li class="dropdown-item py-2">
                                                <a href="" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="edit"></i>
                                                <span>My Course</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-item py-2">
                                                <a href="" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="edit"></i>
                                                <span>My Progress</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-item py-2">
                                                <a href="{{ url('user/settings') }}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Setting</span>
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
                                    {{-- <li><a class="sign-in ml-20" href="login.html"><img src="{{ url('user/img/icon/user.svg') }}" alt=""></a></li> --}}
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
    </div> <!-- /.theme-main-menu -->
</header>


{{-- Mobile Menu --}}
<!-- slide-bar start -->
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
    </div>

    <!-- offset-sidebar start -->
    <div class="offset-sidebar">
        <div class="offset-widget offset-logo mb-30">
            <a href="index.html">
                <img src="{{ url('user/img/logo/header_logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="offset-widget mb-40">
            <div class="info-widget">
                <h4 class="offset-title mb-20">About Us</h4>
                <p class="mb-30">
                    But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                    was born and will give you a complete account of the system and expound the actual teachings of
                    the great explore
                </p>
                <a class="theme_btn theme_btn_bg" href="contact.html">Contact Us</a>
            </div>
        </div>
        <div class="offset-widget mb-30 pr-10">
            <div class="info-widget info-widget2">
                <h4 class="offset-title mb-20">Contact Info</h4>
                <p> <i class="fal fa-address-book"></i> 23/A, Miranda City Likaoli Prikano, Dope</p>
                <p> <i class="fal fa-phone"></i> +0989 7876 9865 9 </p>
                <p> <i class="fal fa-envelope-open"></i> info@example.com </p>
            </div>
        </div>
    </div>
    <!-- offset-sidebar end -->

    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu">
        <ul id="mobile-menu-active">
            <li class="nav-item">
                <a class="nav-link" href="index.html" id="navbarDropdown1" role="button"
                    aria-expanded="false">Dashboard</a>
            </li>
            <li class="has-dropdown">
                <a href="#" id="navbarDropdown2" role="button">
                    Course
                </a>
                <ul class="sub-menu">
                    <li><a href="index.html">My Course</a></li>
                    <li><a href="index-2.html">All Course</a></li>
                    <li><a href="index-3.html">Categories</a></li>
                </ul>
            </li>
            <li><a href="about.html">About</a></li>
            <li class="has-dropdown">
                <a href="#">Sidebar</a>
                <ul class="sub-menu">
                    <li><a href=""></a>Progress</li>
                    <li><a href=""></a>Courses</li>
                    <li><a href=""></a>Orders</li>
                    <li><a href=""></a>Payments</li>
                </ul>
            </li>
            <li><a href="contact.html">Contacts Us</a></li>
        </ul>
    </nav>
    <!-- side-mobile-menu end -->
</aside>
<div class="body-overlay"></div>
<!-- slide-bar end -->

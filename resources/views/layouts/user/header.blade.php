@php
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LFF Login</title>
    <meta name="keywords" content="online education, e-learning, coaching, education, teaching, learning">
    <meta name="description" content="Zoomy is a e-learnibg HTML template for all kinds of education, coaching, online education website">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('user/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ url('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/font.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/slick.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/main.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->
    <header>
        <div id="theme-menu-two" class="main-header-area main-head-three pl-100 pr-100 pt-20 pb-15">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2">
                        <div class="logo"><a href="{{ url('') }}"><img src="{{ url('user/img/logo/header_logo.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <nav class="main-menu navbar navbar-expand-lg justify-content-center">
                            <div class="nav-container">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        @auth
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('dashboard') }}" id="navbarDropdown1" role="button" aria-expanded="false">Dashboard</a>
                                            </li>
                                        @endauth
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Course
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                <li><a class="dropdown-item" href="index.html">My Course</a></li>
                                                <li><a class="dropdown-item" href="index-2.html">All Course</a></li>
                                                <li><a class="dropdown-item" href="index-3.html">Categories</a></li>
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
                                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img class="wd-30 ht-30 rounded-circle" src="" alt="{{ $user->name }}">
                                            {{-- Gambar ada 2 link --}}
                                        </a>
                                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                                <div class="mb-3">
                                                    <img class="wd-80 ht-80 rounded-circle" src="" alt="{{ $user->name }}">
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
                                        <li><a href="{{ url('auth') }}" class="theme_btn free_btn" style="margin-right: 10px">Login</a></li>
                                        <li><a href="{{ url('auth/register') }}" class="theme_btn free_btn">Register</a></li>
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

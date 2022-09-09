<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }} | LFF</title>
    <meta name="keywords" content="online education, e-learning, coaching, education, teaching, learning">
    <meta name="description" content="Zoomy is a e-learnibg HTML template for all kinds of education, coaching, online education website">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('user/img/logo/icon_header.png') }}">
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{ url('assets/js/dselect.js') }}"></script>
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


    @include('sweetalert::alert')

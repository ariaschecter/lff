@include('layouts.user.header')

@include('layouts.user.sidebarsettings')
    <div id="content" class="p-4 p-md-5">

        @include('layouts.user.topbar')

        @yield('body')

    </div>
</div>



<!-- JS here -->

<script src="{{ url('user/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ url('user/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="{{ url('user/js/popper.min.js') }}"></script>
<script src="{{ url('user/js/bootstrap.min.js') }}"></script>
<script src="{{ url('user/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('user/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('user/js/slick.min.js') }}"></script>
<script src="{{ url('user/js/metisMenu.min.js') }}"></script>
<script src="{{ url('user/js/jquery.nice-select.js') }}"></script>
<script src="{{ url('user/js/ajax-form.js') }}"></script>
<script src="{{ url('user/js/wow.min.js') }}"></script>
<script src="{{ url('user/js/jquery.counterup.min.js') }}"></script>
<script src="{{ url('user/js/waypoints.min.js') }}"></script>
<script src="{{ url('user/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ url('user/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('user/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('user/js/jquery.easypiechart.js') }}"></script>
<script src="{{ url('user/js/plugins.js') }}"></script>
<script src="{{ url('user/js/main.js') }}"></script>
<script src="{{ url('user/js/popper.js') }}"></script>
</body>

</html>

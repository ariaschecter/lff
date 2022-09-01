
@include('layouts.user.header')
@include('layouts.user.topbar')

@include('layouts.user.sidebarcourse')
<div class="col-xxl-8 col-xl-7">
    @yield('body')
</div>


<!-- JS here -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

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


<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright &copy; {{ date('Y') }} <a href="{{ url('dashboard') }}" target="_blank">LFF</a>.</p>
    <p class="text-muted">Made With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>

</div>
</div>

<script src="{{ url('assets/vendors/core/core.js') }}"></script>

<script src="{{ url('assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ url('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ url('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ url('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<link rel="stylesheet" href="{{ url('assets/vendors/simplemde/simplemde.min.css') }}">

<script src="{{ url('assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ url('assets/js/template.js') }}"></script>

<script src="{{ url('assets/js/dashboard-light.js') }}"></script>
<script src="{{ url('assets/js/datepicker.js') }}"></script>

<script>
$('.show_confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
</body>
</html>

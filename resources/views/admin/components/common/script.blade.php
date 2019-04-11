<!-- Bootstrap core JavaScript-->
<script src="{{ asset('/') }}vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/') }}vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="{{ asset('/') }}vendor/chart.js/Chart.min.js"></script>
<script src="{{ asset('/') }}vendor/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('/') }}vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('/') }}js/sb-admin.min.js"></script>


<script type="text/javascript">
    const baseURL = "{{ route('home') }}";
    const token = "{{ csrf_token() }}";
</script>

<script type="text/javascript" src="{{ asset('/') }}js/home.js"></script>
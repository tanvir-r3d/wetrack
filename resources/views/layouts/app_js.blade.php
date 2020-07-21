<!-- General JS Scripts -->
  <script src="/js/jquery.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.nicescroll.min.js"></script>
  <script src="/js/moment.min.js"></script>
  <script src="/js/stisla.js"></script>
  <!-- Template JS File -->
  <script src="/js/scripts.js"></script>
  <script src="/js/custom.js"></script>
  <!-- PACKAGE -->
  <script src="/packages/DataTables/datatables.min.js"></script>
  <script src="/packages/DataTables/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script src="/packages/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="/packages/DataTables/DataTables-1.10.20/js/dataTables.foundation.min.js"></script>
  <script src="/packages/DataTables/DataTables-1.10.20/js/dataTables.jqueryui.min.js"></script>
  <script src="/packages/DataTables/DataTables-1.10.20/js/dataTables.semanticui.min.js"></script>
  <script src="/packages/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="/packages/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="/packages/sweetalert.min.js"></script>
  <script src="/packages/toastr/toastr.js"></script>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

  @yield('script')









<!-- <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script> -->
@if(Auth::check())
{
    <!-- <script>
    if(navigator.geolocation)
    {
        setInterval(function(){navigator.geolocation.getCurrentPosition(showPosition);}, 60000);
    }
    else
    {
        console.log("Geo Permission Disabled");
    }
        function showPosition(position)
        {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            $.ajax({
            url:"{{route('track_create')}}",
            type:'post',
            data:{'latitude':latitude,'longitude':longitude,'_token': '{{ csrf_token() }}'}
            });
        }
    </script> -->
}
@else
@endif
{!! Toastr::message() !!}
</body>
</html>
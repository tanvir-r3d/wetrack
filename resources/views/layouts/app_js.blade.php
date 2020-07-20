<script src="/js/all.js"></script>
<script src="toastr.min.js"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@if(Auth::check())
{
    <script>
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
    </script>
}
@else
@endif

@yield('script')
</body>
<!-- END: Body-->

</html>
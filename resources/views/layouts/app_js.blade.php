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
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

<script type="text/javascript">
    $(document).on("keyup","#search",function (){
        let searchKey= $(this).val();
        $.ajax({
            url:'/search',
            data:{'searchKey':searchKey,"_token": "{{ csrf_token() }}"},
            type:'get',
            dataType:'json',
            success:function(data){
                // console.log(data);
                $(".search-item").remove();
                data.hits.forEach(result =>{
                $("#search-items").append(`<div class="search-item">
                                            <a href="${result.link}">
                                                <img class="mr-3 rounded" width="30" src="logo.png" alt="product">
                                                ${result.name}&nbsp&nbsp&nbsp&nbsp<small>${result.details}</small>
                                            </a>
                                        </div>`);
                });

            }
        });
    })
</script>

  @yield('script')

@if(Auth::check())
{
    @if(Auth::user()->emp_id)
    {
    <script>
    if(navigator.geolocation)
    {
        setInterval(function(){navigator.geolocation.getCurrentPosition(showPosition);}, 6000);
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
    }@endif
}
@else
@endif
{!! Toastr::message() !!}
</body>
</html>

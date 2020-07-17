@extends('layouts.app')
@section('page_name') Employee Data @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/">Home</a>
</li>
<li class="breadcrumb-item"><a href="/employee">Employee</a>
</li>
<li class="breadcrumb-item active">Infield
</li>
@endsection
@section('content')
 
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Infield Employee Table</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a href="/employee"><button class="btn btn-secondary"><i class="feather icon-plus-circle"> Add</i></button></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard" id="dataRow">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){
    dataList();

$(document).on('click',"#status_btn",function(){
  var value=$(this).attr("data-set");
  var id=$(this).attr("data-id");
  var status='';
  if(value=='active')
  {
    status='inactive';
  }
  else if(value=='inactive')
  {
    status='active';
  }
  else
  {
    status='active';
  }

  $.ajax({
    url:"{{route('employee_status.change')}}",
    data:{'status':status, 'id':id, '_token': '{{ csrf_token() }}'},
    dataType:'json',
    type:'get',
    success:function(data)
    {
      dataList();
      toastr["success"](data.message);
    }
  });

});

});

function dataList(){
    $.ajax({
        url:"/employee_status/list/",
        dataType:'html',
        type:'get',
        success:function(data)
        {
            $("#dataRow").html(data);
        }
    });
};
</script>
@endsection

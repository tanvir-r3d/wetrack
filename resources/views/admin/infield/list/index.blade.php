@extends('layouts.app')
@section('page_name') Infield Employee @endsection
@section('section_header') Employee Infield @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Employee Infield</div>
@endsection
@section('content')
<h2 class="section-title">Employee Infield List</h2>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Infield List Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTable" class="display dataTable table table-striped" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">Company</th>
                <th class="text-center">Branch</th>
                <th class="text-center">Name</th>
                <th class="text-center">Username</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th>Company</th>
                <th>Branch</th>
                <th>Name</th>
                <th>Username</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection
@section('script')
<script>
  $(document).ready(function() {
      var i = 1;
      $('#dataTable').DataTable({
          processing: true,
          serverSide: true,
          ajax:"/employee_status/",
          "columns":[
              {
                data: 'com_name',
                },
              {
                data: 'branch_name',
                },
              {
                data: 'emp_full_name',
                },
              {
                data: 'username',
                },
              {
                data: 'action',
                name: 'action',
          orderable:false,
                },
          ],
      });

  $(document).on("click","#delete",function(){
    var id=$(this).attr("data-id");
    $.ajax({
      url:"/company/delete/"+id,
      type:"get",
      dataType:"json",
      success:function(data)
      {
        location.reload();
      }
    });
  });
  });

 
</script>
@endsection

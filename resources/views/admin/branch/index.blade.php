@extends('layouts.app')
@section('page_name') Branch @endsection
@section('section_header') Branch @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Branch</div>
@endsection
@section('content')
<div class="row custom-row">
    <h2 class="section-title">Branch List</h2>
	<button class="btn btn-primary mr-l mr-3" data-toggle="modal" data-target="#addModal">Add Branch</button>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Branch Table</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display dataTable table table-striped" style="width:100%">
						<thead>
							<tr>

								<th class="text-center">Name</th>
								<th class="text-center">Location</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
							<tr>

								<th>Name</th>
								<th>Location</th>
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
<!-- ADD MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Branch</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form action="{{route('branch.store')}}" method="post" id="addForm">
      @csrf
			<div class="modal-body">

				<div class="form-group">
						 <label for="com_id">Select Company</label>
						 <select class="form-control" id="com_id" name="com_id">
							 @foreach($companys as $company)
							<option value="{{$company->com_id}}">{{ $company->com_name}}</option>
							@endforeach
						 </select>
					 </div>

      <div class="form-group">
        <label>Branch Name:</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>

      <div class="form-group">
        <label>Branch Location:</label>
          <input type="text"class="form-control" name="location" id="location" >
      </div>

      <div class="form-group">
        <label>Branch Details:</label>
        <textarea class="form-control" name="details" cols="30" rows="10"></textarea>
      </div>
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-primary">Save</button>
        </form>
			</div>
		</div>
	</div>
</div>

<!-- Edit MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Branch</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form method="post" id="editForm" >
      @csrf
	<div class="modal-body">
      <div class="form-group">
				<div class="form-group">
						 <label for="e_com_id">Select Company</label>
						 <select class="form-control" id="e_com_id" name="com_id">
							 @foreach($companys as $company)
							<option value="{{$company->com_id}}">{{ $company->com_name}}</option>
							@endforeach
						 </select>
					 </div>

      <div class="form-group">
        <label>Branch Name:</label>
        <input type="text" class="form-control" name="name" id="e_name">
      </div>

      <div class="form-group">
        <label>Branch Location:</label>
          <input type="text"class="form-control" name="location" id="e_location" >
      </div>

      <div class="form-group">
        <label>Branch Details:</label>
        <textarea class="form-control" name="details" id="e_details" cols="30" rows="10"></textarea>
      </div>
			</div>
			<input type="hidden" id="edit_id" name="id">
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-primary">Save Changes</button>
        </form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function() {
	    $('#dataTable').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax:"{{route('branch.index')}}",
	        "columns":[

	            {
	              data: 'branch_name',
	              },
                {
  	              data: 'branch_location',
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
			url:"/branch/delete/"+id,
			type:"get",
			dataType:"json",
			success:function(data)
			{
				location.reload();
			}
		});
	});

	$(document).on("click","#edit",function(){
		var id=$(this).attr("data-id");
		var __this=$(this);
		$.ajax({
			url:"{{route('branch_edit')}}",
			data:{'id':id,"_token": "{{ csrf_token() }}"},
			type:"get",
			dataType:"json",
			success:function(data)
			{
				console.log(data);
				$("#e_com_id").val(data.com_id);
				$("#e_name").val(data.branch_name);
        $("#e_location").val(data.branch_location)
				$("#e_details").val(data.branch_details);
				$("#editForm").attr("action","/branch/update/"+data.branch_id);

			}
		});
	});

});


</script>
{!! $validator->selector('#addForm') !!}
{!! $validator->selector('#editForm') !!}
@endsection

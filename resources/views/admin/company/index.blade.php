@extends('layouts.app')
@section('page_name') Company @endsection
@section('section_header') Company @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Company</div>
@endsection
@section('content')
<div class="row custom-row">
    <h2 class="section-title">Company List</h2>
    @can('add_company')
    <button class="btn btn-primary mr-l mr-3" data-toggle="modal" data-target="#addModal">Add Company</button>
    @endcan
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Company Table</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display dataTable table table-striped" style="width:100%">
						<thead>
							<tr>
								<th class="text-center">Logo</th>
								<th class="text-center">Name</th>
								<th class="text-center">Details</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
							<tr>
								<th>Logo</th>
								<th>Name</th>
								<th>Details</th>
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
				<h5 class="modal-title">Add Company</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form action="{{route('company.store')}}" method="post" id="addForm" enctype="multipart/form-data">
      @csrf
			<div class="modal-body">

      <div class="form-group">
      <center><img alt="image" src="/example-image.jpg" id="previmage" width=150 height=140 class="rounded-circle imagecheck-image mb-3"></center>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="logo" name="logo" onchange="readURL(this);">
        <label class="custom-file-label" for="logo">Choose Logo</label>
        <small class="form-text text-muted">File must be .png</small>
      </div>
      </div>

      <div class="form-group">
        <label>Company Name:</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>

      <div class="form-group">
        <label>Company Details:</label>
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
				<h5 class="modal-title">Edit Company</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form method="post" id="editForm" enctype="multipart/form-data">
      @csrf
	<div class="modal-body">
      <div class="form-group">
      <center><img alt="image" id="previmage" style="width:25%" src='' class="rounded-circle imagecheck-image mb-3 edit_logo"></center>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="e_logo" name="logo" onchange="readURL(this);">
        <label class="custom-file-label" for="logo">Choose Logo</label>
        <small class="form-text text-muted">File must be .png</small>
      </div>
      </div>

      <div class="form-group">
        <label>Company Name:</label>
        <input type="text" class="form-control" name="name" id="e_name">
      </div>

      <div class="form-group">
        <label>Company Details:</label>
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
	    var i = 1;
	    $('#dataTable').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax:"{{route('company.index')}}",
	        "columns":[
	            {
	              data: 'com_logo',
	              name: 'com_logo',
				  render:function(data,type,full,meta)
				  {
					  if(data)
					  {
						return "<img src='/images/company/"+data+"' class='rounded-circle' width='45'/>"
					  }
					  else
					  {
						return "<img src='/example-image.jpg' class='rounded-circle' width='45'/>"
					  }
				  },
	              orderable:false,
	            },
	            {
	              data: 'com_name',
	              },
	            {
	              data: 'com_details',
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

	$(document).on("click","#edit",function(){
		var id=$(this).attr("data-id");
		var __this=$(this);
		$.ajax({
			url:"{{route('company_edit')}}",
			data:{'id':id,"_token": "{{ csrf_token() }}"},
			type:"get",
			dataType:"json",
			success:function(data)
			{
				$("#e_name").val(data.com_name);
				$("#e_details").val(data.com_details);
				$("#editForm").attr("action","/company/update/"+data.com_id);
				if(data.com_logo!='')
				{
					$(".edit_logo").attr("src","/images/company/"+data.com_logo);
				}
				else{
					$(".edit_logo").attr("src","/example-image.jpg");
				}
			}
		});
	});

});

function readURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function(e) {
    $('#previmage')
      .attr('src', e.target.result)
      .width(140)
      .height(140);
  };
  reader.readAsDataURL(input.files[0]);
}
}
</script>
{!! $validator->selector('#addForm') !!}
{!! $validator->selector('#editForm') !!}
@endsection

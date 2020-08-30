@extends('layouts.app')
@section('page_name') Role @endsection
@section('section_header') Role @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Role</div>
@endsection
@section('content')
<div class="row custom-row">
    <h2 class="section-title">Role List</h2>
	<button class="btn btn-primary mr-l mr-3" data-toggle="modal" data-target="#addModal">Add Role</button>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Role Table</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display dataTable table table-striped" style="width:100%">
						<thead>
							<tr>
                                <th class="text-center">SL</th>
								<th class="text-center">Display Name</th>
								<th class="text-center">Name</th>
								<th class="text-center">Action</th>

							</tr>
						</thead>
						<tbody>

							@foreach($data as $i=>$role)
							<tr>
                                 <td>{{++$i}}</td>
								<td style="text-transform:uppercase;">{{$role->name}}</td>
								<td>{{$role->name}}</td>
								<td>
									<button type="button" name="edit" id="edit" data-toggle="modal" data-target="#editModal" data-id={{$role->id}} class="edit btn btn-primary"><i class="fas fa-edit"></i></button>
									<button type="button" name="delete" id="delete" data-id={{$role->id}} class="delete btn btn-danger"><i class="fas fa-trash"></i></button>
								</td>

							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
                               <th class="text-center">SL</th>
								<th class="text-center" >Display Name</th>
								<th class="text-center">Name</th>
								<th class="text-center">Action</th>


							</tr>
						</tfoot>

					</table>
					<div style="margin-left: 80%;">
						{{$data->links()}}
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- ADD MODAL -->
<div class="modal fade" tabindex="-1" id="addModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form action="{{route('role.store')}}" method="post" id="addForm">
      @csrf
			<div class="modal-body">

      <div class="form-group">
        <label>role Name:</label>
        <input type="text" class="form-control" name="name" id="name" required="" autofocus="" >
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
				<h5 class="modal-title">Edit Role </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form method="post" id="editForm" >
      @csrf
	<div class="modal-body">
      <div class="form-group">


      <div class="form-group">
        <label>Role Name:</label>
        <input type="text" class="form-control" name="name" id="e_name">
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
<script type="text/javascript">
		$(document).ready(function() {


	$(document).on("click","#delete",function(){
		var id=$(this).attr("data-id");
		iziToast.question({
        timeout: 20000,
        close: true,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Wait!',
        message: 'Are you sure? Once Deleted Can\'t be undone!', 
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function () {
		$.ajax({
			url:"/role/delete/"+id,
			type:"get",
			dataType:"json",
			success:function(data)
			{
				if(data.status==200)
						{
							iziToast.success({
								title: "Role",
								message: "Role Successfully Deleted",
								position: 'topRight',
							});
							location.reload();
						}
			}
		});
	}, true],
            ['<button>NO</button>', function (instance, toast) {

                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

            }],
        ],
	});
	});

	$(document).on("click","#edit",function(){
		var id=$(this).attr("data-id");

		$.ajax({
			url:"{{route('role_edit')}}",
			data:{'id':id,"_token": "{{ csrf_token() }}"},
			type:"get",
			dataType:"json",
			success:function(data)
			{
				console.log(data);

				$("#e_name").val(data.name);
				$("#editForm").attr("action","/role/update/"+data.id);

			}
		});
	});

});
</script>

@endsection

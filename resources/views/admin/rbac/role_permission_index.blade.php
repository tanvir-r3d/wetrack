@extends('layouts.app')
@section('page_name') Role @endsection
@section('section_header') Role Permission @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Rolee Permission</div>
@endsection
@section('content')
<div class="row custom-row">
    <h2 class="section-title">Role Permission</h2>
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
                                <th class="">SL</th>
								<th class="" >Display Name</th>
								<th class="">Name</th>
								<th class="">Action</th>

							</tr>
						</thead>
						<tbody>
							
							@foreach($permission_role as $i=>$role_per)
							<tr>
                                 <td>{{++$i}}</td> 
								<td style="text-transform:uppercase;">{{$role_per->name}}</td>
								<td>
									@foreach($permission as $per)
									<input type="checkbox">
									{{$per['name']}}
									@endforeach
								</td>
								<td>
									<form class="form-inline" action="" method="post">
										@csrf
										<input type="hidden" name="" class="form-control" value="">
										<button type="submit" class="btn btn-success">Update</button>
									</form>
									
								</td>

							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
                               <th class="">SL</th>
								<th class="" >Display Name</th>
								<th class="">Name</th>
								<th class="">Action</th>


							</tr>
						</tfoot>

					</table>
					<div style="margin-left: 80%;">
						{{$permission_role->links()}}
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- ADD MODAL -->
<div class="modal fade" tabindex="-1" permission="dialog" id="addModal">
	<div class="modal-dialog" permission="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add role</h5>
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

</div>

@endsection



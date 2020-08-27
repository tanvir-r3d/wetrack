@extends('layouts.app')
@section('page_name') permission @endsection
@section('section_header') permission @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">permission</div>
@endsection
@section('content')
<div class="row custom-row">
    <h2 class="section-title">permission List</h2>
	<button class="btn btn-primary mr-l mr-3" data-toggle="modal" data-target="#addModal">Add permission</button>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>permission Table</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display dataTable table table-striped" style="width:100%">
						<thead>
							<tr>
                                
								<th class="text-center" >Display Name</th>
								<th class="text-center">Name</th>
								
							</tr>
						</thead>
						<tbody>
							
							@foreach($data as $permi)
							<tr>
                                  
								<td style="text-transform:uppercase;">{{$permi->name}}</td>
								<td>{{$permi->name}}</td>

							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>

								<th>Display Name</th>
								<th>Name</th>

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
<div class="modal fade" tabindex="-1" permission="dialog" id="addModal">
	<div class="modal-dialog" permission="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add permission</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form action="{{route('permission.store')}}" method="post" id="addForm">
      @csrf
			<div class="modal-body">

      <div class="form-group">
        <label>permission Name:</label>
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


@endsection
@section('script')


@endsection

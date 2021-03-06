@extends('layouts.app')
@section('page_name') User @endsection
@section('section_header') Users @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">User List</div>
@endsection
@section('content')
<div class="row custom-row">
    <h2 class="section-title">User List</h2>
    @can('add user')
    <button class="btn btn-primary mr-l mr-3" data-toggle="modal" data-target="#addModal">Add User</button>
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
								<th class="text-center">Profile</th>
								<th class="text-center">Name</th>
								<th class="text-center">Username</th>
								<th class="text-center">Email</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
							<tr>
								<th class="text-center">Profile</th>
								<th class="text-center">Name</th>
								<th class="text-center">Username</th>
								<th class="text-center">Email</th>
								<th class="text-center">Action</th>
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
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('user.store')}}" method="post" id="addUserForm" enctype="multipart/form-data">@csrf
				<div class="modal-body">
					<div class="form-group">
						<center>
							<img alt="image" src="/avatar.png" id="previmage" width=150 height=140 class="rounded-circle imagecheck-image mb-3">

						</center>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image" onchange="readURL(this);">
							<label class="custom-file-label" for="logo">Select Image</label> <small class="form-text text-muted">File must be .png or .jpg</small>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>First Name:</label>
								<input type="text" class="form-control" name="first_name" id="first_name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name:</label>
								<input type="text" class="form-control" name="last_name" id="last_name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="d-block">Gender:</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gender" id="male" value="1">
									<label class="form-check-label" for="male">Male</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="gender" id="female" value="2">
									<label class="form-check-label" for="female">Female</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Phone:</label>
								<input type="text" class="form-control" name="contact" id="contact">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Username:</label>
								<input type="text" class="form-control" name="username" id="username">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email:</label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="pass">Password:</label>
								<input type="password" class="form-control" name="pass" id="pass">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="retype">Re-Type Password:</label>
								<input type="password" class="form-control" name="retype" id="retype">
							</div>
						</div>
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
<!-- View MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="viewModal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">User Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">


                <div class="card card">
                            <div class="text-center">
                                <div class="card-body">
                               <div class="container">
                                    <img src="" id="user_image" width=150 height=140 class="rounded-circle mb-2 img-over" alt="Card image"><label class="btn" for="image"><div class="des"><img src="/camera.svg"><input type="file" hidden name="image" id="u_image"></div></label>
                               </div>

                                    <h3 id="name"> </h3>

                                </div>
                                <div class="card-body">
                                    <h6 class="card-title mr-5">Username:&nbsp<strong id="user_name"></strong></h6>
                                    <h6 class="card-subtitle">Email:&nbsp<strong id="user_email"></strong></h6>
                                    <button name="delete" id="delete" class="delete_btn btn"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="card-body">

                  <div class="row"><h4>Gender:&nbsp<small class="text-muted" id="gender"></small></h4></div>
                  <div class="row mt-1"><h4>Contact:&nbsp<small class="text-muted" id="user_contact"></small></h4></div>

                  </div>

                        </div>

				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection @section('script')
<script>
	$(document).ready(function() {
	    var i = 1;
	    $('#dataTable').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax:"{{route('user.index')}}",
	        "columns":[
	            {
                 draw:1,
	              data: 'user_img',
	              name: 'user_img',
				  render:function(data,type,full,meta)
				  {
					  if(data)
					  {
						return "<img src='/images/user/"+data+"' class='rounded-circle' width='45'/>"
					  }
					  else
					  {
						return "<img src='/avatar.png' class='rounded-circle' width='45'/>"
					  }
				  },
	              orderable:false,
	            },
	            {
	              data: 'user_first_name',
	              },
	            {
	              data: 'username',
	              },
                  {
	              data: 'email',
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
			url:"/user/delete/"+id,
			type:"get",
			dataType:"json",
			success:function(data)
			{
				iziToast.success({
								title: "User",
								message: "User Successfully Deleted",
								position: 'topRight',
							});
							location.reload();
			}
		});
	}, true],
            ['<button>NO</button>', function (instance, toast) {

                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

            }],
        ],
	});
	});

	$(document).on("click","#view",function(){
		var id=$(this).attr("data-id");

		$.ajax({
			url:"{{route('user_show')}}",
			data:{'id':id,"_token": "{{ csrf_token() }}"},
			type:"get",
			dataType:"json",
			success:function(data)
			{
                console.log(data);
				$("#name").text(data.user_first_name+" "+data.user_last_name);
				$("#user_name").text(data.username);
				$("#user_email").text(data.email);
				$("#user_contact").text(data.user_contact);
				$(".delete_btn").attr("data-id",data.id);
				$("#user_view").attr("action",'/user/image/'+data.id);
                if(data.user_gender==1)
                {
                    $("#gender").text("Male");
                }
                else if(data.user_gender==2)
                {
                    $("#gender").text("Female");
                }
                else{
                    $("#gender").text("Not Defined");
                }

				if(!data.user_img)
				{
					$("#user_image").attr("src","/profile.png");
				}
				else{
					$("#user_image").attr("src","/images/user/"+data.user_img);
				}
			}
		});
	});

});
document.getElementById("u_image").onchange = function() {
    document.getElementById("user_view").submit();
};

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
{!! $user_validator->selector('#addUserForm') !!}
@endsection

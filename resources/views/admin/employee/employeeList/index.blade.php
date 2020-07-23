@extends('layouts.app')
@section('page_name') Employee @endsection
@section('section_header') Employee @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Employee</div>
@endsection
@section('content')
<h2 class="section-title">Employee List</h2>
<p class="section-lead">
	<button class="btn btn-primary mr-l" data-toggle="modal" data-target="#addModal">Add Employee</button>
</p>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Employee Table</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display dataTable table table-striped" style="width:100%">
						<thead>
							<tr>

								<th class="text-center">Profile</th>
								<th class="text-center">Name</th>
								<th class="text-center">Company</th>
				                <th class="text-center">Branch</th>
								<th class="text-center">Category</th>
				                <th class="text-center">Phone</th>


								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
							<tr>
								<th>Profile</th>
								<th>Name</th>
								<th>Company</th>
				                <th>Branch</th>
								<th>Category</th>
				                <th>Phone</th>


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
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Employee</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form action="{{route('employee.store')}}" method="post" id="addForm" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">

			<div class="row">
			<div class="col-md-6">

			     <center>	<img alt="image" id="previmage" width="120" height="120" src='/avatar.png' class="rounded-circle mb-3 emp_img"></center>

		 </div>

		    <div class="col-md-6 mt-5">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" onchange="readURL(this);">
					<label class="custom-file-label" for="image">Choose image</label>
					<small class="form-text text-muted">File must be .jpg or .png</small>
				</div>
			</div>

		</div>


        <div class="row">
					<div class="col-md-6">
					<div class="form-group">
							 <label for="com_id">Select Company</label>
							 <select class="form-control" id="com_id" name="com_id">
							 	<option selected hidden disabled>Select Company</option>
								 @foreach($companys as $company)
								<option value="{{$company->com_id}}">{{ $company->com_name}}</option>
								@endforeach
							 </select>
			 			 </div>
					 </div>

          <div class="col-md-6">
            <div class="form-group">
                 <label for="branch_id">Select Branch</label>
                 <select class="form-control" id="branch_id" name="branch_id">
					<option selected hidden disabled>Select Branch</option>
                   @foreach($branchs as $branch)
                  <option value="{{$branch->branch_id}}">{{ $branch->branch_name}}</option>
                  @endforeach
                 </select>
               </div>
          </div>


        </div>


        <div class="row">
          <div class="col-md-6">

            <fieldset class="form-group floating-label-form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="full_name" placeholder="Enter Employee Name" required data-validation-required-message="This field is required">
            </fieldset>
          </div>

          <div class="col-md-6">
            <div id="div_id_gender" class="form-group">
               <label for="id_gender"  class="control-label col-md-4">Gender </label>
               <div class="controls col-md-8"  style="margin-bottom: 10px">
                    <label class="radio-inline"> <input type="radio" name="gender" id="gender_1" value="1"  style="margin-bottom: 10px">Male</label>
                    <label class="radio-inline"> <input type="radio" name="gender" id="gender_2" value="2"  style="margin-bottom: 10px">Female </label>
               </div>
           </div>
          </div>

        </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
								 <label for="cat_id">Select Category</label>
								 <select class="form-control" id="cat_id" name="cat_id">
							 		<option selected hidden disabled>Select Category</option>
									 @foreach($categorys as $category)
									 <option value="{{$category->emp_cat_id}}">{{ $category->emp_cat_name}}</option>
									 @endforeach
								 </select>
							 </div>
					</div>
				<div class="col-md-6">
					<fieldset class="form-group floating-label-form-group">
							<label for="name">Phone</label>
							<input type="text" class="form-control" id="name" name="phone" placeholder="Enter Employee Name" required data-validation-required-message="This field is required">
					</fieldset>
				</div>
			</div>


        <div class="row">
					<div class="col-md-6">
						<fieldset class="form-group floating-label-form-group">
								<label for="detaaddressils">Address</label>
								<textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter Employee Address" ></textarea>
						</fieldset>
					</div>
          <div class="col-md-6">
            <fieldset class="form-group floating-label-form-group">
                <label for="salery">Salary</label>
                <input type="text" class="form-control" id="salery" name="salery" placeholder="Enter Employee Name" required data-validation-required-message="This field is required">
            </fieldset>
          </div>


        </div>
         <h6 class="section-title">User Access</h6>
        <div class="row">

					<div class="col-md-6">
 					 <fieldset class="form-group floating-label-form-group">
 							 <label for="username">User Name</label>
 							 <input type="text" class="form-control" id="username" name="username" placeholder="Enter Employee Name" required data-validation-required-message="This field is required">
 					 </fieldset>
 				 </div>

          <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email address</label>
                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email ">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="password" class="col-form-label">Password</label>
                  <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
            </div>
          </div>
					<div class="col-md-6">
						<div class="form-group">
								<label for="retypePassword" class=" col-form-label">Retype Password</label>
									<input type="password" class="form-control" name="retypePassword" id="retypePassword" placeholder="Password">
						</div>
					</div>


        </div>


      </div>
      <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary" value="Submit">
      </div>

        </form>
			</div>
		</div>
	</div>
</div>

<!-- Edit MODAL -->

<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Employee</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form action="" method="post" id="editForm" enctype="multipart/form-data">
      @csrf
			<div class="modal-body">

			<div class="row">
			<div class="col-md-6">

					 <center>	<img alt="image" id="previmage" height="120" width="120" src='' class="rounded-circle mb-3 emp_img"></center>

		 </div>

				<div class="col-md-6 mt-5">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" onchange="readURL(this);">
					<label class="custom-file-label" for="e_image">Choose image</label>
					<small class="form-text text-muted">File must be .png</small>
				</div>
			</div>

		</div>


				<div class="row">
					<div class="col-md-6">
					<div class="form-group">
							 <label for="e_com_id">Select Company</label>
							 <select class="form-control" id="e_com_id" name="com_id">
							 	<option selected hidden disabled>Select Company</option>
								 @foreach($companys as $company)
								<option value="{{$company->com_id}}">{{ $company->com_name}}</option>
								@endforeach
							 </select>
						 </div>
					 </div>

					<div class="col-md-6">
						<div class="form-group">
								 <label for="e_branch_id">Select Branch</label>
								 <select class="form-control" id="e_branch_id" name="branch_id">
							 	<option selected hidden disabled>Select Branch</option>
									 @foreach($branchs as $branch)
									<option value="{{$branch->branch_id}}">{{ $branch->branch_name}}</option>
									@endforeach
								 </select>
							 </div>
					</div>


				</div>


				<div class="row">
					<div class="col-md-6">

						<fieldset class="form-group floating-label-form-group">
								<label for="e_name">Full Name</label>
								<input type="text" class="form-control" id="e_name" name="full_name" placeholder="Enter Employee Name" >
						</fieldset>
					</div>

					<div class="col-md-6">
						<div id="e_div_id_gender" class="form-group">
							 <label for="id_gender"  class="control-label col-md-4">Gender </label>
							 <div class="controls col-md-8 "  style="margin-bottom: 10px">
										<label class="radio-inline"> <input type="radio" name="gender" id="male" value="1"  style="margin-bottom: 10px">Male</label>
										<label class="radio-inline"> <input type="radio" name="gender" id="female" value="2"  style="margin-bottom: 10px">Female </label>
							 </div>
					 </div>
					</div>

				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
								 <label for="e_cat_id">Select Category</label>
								 <select class="form-control" id="e_cat_id" name="cat_id">
							 		<option selected hidden disabled>Select Category</option>
									 @foreach($categorys as $category)
									 <option value="{{$category->emp_cat_id}}">{{ $category->emp_cat_name}}</option>
									 @endforeach
								 </select>
							 </div>
					</div>
				<div class="col-md-6">
					<fieldset class="form-group floating-label-form-group">
							<label for="e_phone">Phone</label>
							<input type="text" class="form-control" id="e_phone" name="phone" placeholder="Enter Employee Name" required data-validation-required-message="This field is required">
					</fieldset>
				</div>
			</div>


				<div class="row">
					<div class="col-md-6">
						<fieldset class="form-group floating-label-form-group">
								<label for="e_address">Address</label>
								<textarea class="form-control" id="e_address" rows="3" name="address" placeholder="Enter Employee Address" ></textarea>
						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset class="form-group floating-label-form-group">
								<label for="e_salery">Salary</label>
								<input type="text" class="form-control" id="e_salery" name="salery" placeholder="Enter Salary" >
						</fieldset>
					</div>

				</div>

			</div>
      <div class="modal-footer">
          <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
          <input type="submit" class="btn btn-outline-primary" value="Submit">
      </div>

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
	        ajax:"{{route('employee.index')}}",
	        "columns":[
	            {
	              data: 'emp_img',
	              name: 'emp_img',
				  render:function(data,type,full,meta)
				  {
					  if(data)
					  {
						return "<img src='/images/employee/"+data+"' class='rounded-circle' width='45' height='45'/>"
					  }
					  else
					  {
						return "<img src='/example-image.jpg' class='rounded-circle' width='45' height='45'/>"
					  }
				  },
	              orderable:false,
	            },
	            {
	              data: 'emp_full_name',
	              },
                {
                 data: 'company_name',
                 },
	            {
	              data: 'branch_name',
	              },
	            {
	              data: 'category_name',
	              },
                {
                 data: 'emp_phone',
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
			url:"/employee/delete/"+id,
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
			url:"{{route('employee_edit')}}",
			data:{'id':id,"_token": "{{ csrf_token() }}"},
			type:"get",
			dataType:"json",
			success:function(data)
			{


				$("#e_name").val(data.emp_full_name);
		        $("#e_branch_id").val(data.emp_branch_id);
		        $("#e_com_id").val(data.emp_com_id);
		        $("#e_cat_id").val(data.emp_cat_id);
		        $("#e_salery").val(data.emp_salery);

		        $("#e_address").val(data.emp_address);
		        $("#e_phone").val(data.emp_phone);


				$("#editForm").attr("action","/employee/update/"+data.emp_id);
				if(data.emp_img!='')
				{
					$(".emp_img").attr("src","/images/employee/"+data.emp_img);
				}
				else{
					$(".emp_img").attr("src","/example-image.jpg");
				}

				if(data.emp_gender==1)
				{
					$("#male").attr("checked","checked");
				}
				else{
					$("#female").attr("checked","checked");
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
{!! $addValidator->selector('#addForm') !!}
{!! $editValidator->selector('#editForm') !!}
@endsection

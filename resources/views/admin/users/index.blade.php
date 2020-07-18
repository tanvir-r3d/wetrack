@extends('layouts.app')
@section('page_name') Users @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/">Home</a>
</li>
<li class="breadcrumb-item active">Users
</li>
@endsection
@section('content')

<div class="content-body">
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <div class="users-list-filter px-1">
                        <form>
                            <div class="row border border-light rounded py-2 mb-2">
                            
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="users-list-role">Role</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-role">
                                            <option value="">Any</option>
                                            <option value="User">User</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="users-list-status">Status</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="users-list-status">
                                            <option value="">Any</option>
                                            <option value="Active">Active</option>
                                            <option value="Close">Close</option>
                                            <option value="Banned">Banned</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                    <button class="btn btn-block btn-primary glow">Show</button>
                                </div>
                        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                    <button type="button" class="btn btn-block btn-secondary glow" data-toggle="modal" data-target="#addModal">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="users-list-table">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body" id="dataRow">
                                    <!-- datatable start -->
                                   
                                    <!-- datatable ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users list ends -->
            </div>
<!-- ADD MODAL -->
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h3 class="modal-title" id="myModalLabel35">Add User</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="addForm" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                  <div class="row">
                  
                  <div class="col-md-12">
                    
                    <div class="media">
                        <a href="javascript: void(0);">
                        <img src="{{asset('app-assets/images/avatar.png')}}" id="previmage" class="rounded mr-75" alt="user image" height="64" width="64">
                        </a>
                        <div class="media-body mt-75">
                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="img">Upload new photo</label>
                            <input type="file" id="img" class="img" name="img" hidden onchange="readURL(this);">
                        </div>
                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG or PNG. Max size of 800kB</small></p>
                        </div>
                    </div>

                  </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="first_name">First Name</label>
                        <input type="text" class="form-control first_name" id="first_name" name="first_name" placeholder="First Name">
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="last_name">Last Name</label>
                            <input type="text" class="form-control last_name" id="last_name" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div id="div_gender" class="form-group">
                         <label for="gender"  class="control-label col-md-4">Gender </label>
                         <div class="controls col-md-8 "  style="margin-bottom: 10px">
                              <label class="radio-inline" for="male"> <input type="radio" name="gender" id="male" value="1"  style="margin-bottom: 10px">Male</label>
                              <label class="radio-inline" for="female"> <input type="radio" name="gender" id="female" value="2"  style="margin-bottom: 10px">Female </label>
                         </div>
                     </div>
                    </div>

                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                          <label for="username">User Name</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                      </fieldset>
                    </div>


                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                          <label for="contact">Phone</label>
                          <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter User Contact">
                      </fieldset>
                    </div>

                    <div class="col-md-6">
                      <fieldset class="form-group floating-label-form-group">
                           <label for="email">E-mail</label>
                            <input type="email" class="form-control emali" name="email" id="email" placeholder="Email">
                      </fieldset>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="retype_password" class="col-form-label">Re-Type Password</label>
                            <input  id="password-confirm" type="password" class="form-control" placeholder="Re-Type Password" name="password_confirmation">
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

<!-- VIEW MODAL -->
<div class="modal fade text-left" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel20">EmployeeCategory View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="viewBody"></div>

            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">Edit EmployeeCategory</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editForm">
            @csrf
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" placeholder="Enter EmployeeCategory Name" required data-validation-required-message="This field is required">
                    </fieldset>
                    <br>

                    <fieldset class="form-group floating-label-form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="edit_details" rows="3" name="details" placeholder="Enter EmployeeCategory details" ></textarea>
                    </fieldset>
                    <input type="hidden" id="edit_id" name="id">
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-outline-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
    dataList();

    $("#addForm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"{{route('user.store')}}",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType:'json',
            type:'post',
            success:function(data)
            {
            $("#addModal").modal('hide');
            $("#addForm").trigger( "reset" );
            dataList();
            toastr["success"](data.message);
            }
        });

    });

   $(document).on('click','.view',function(){
    var id=$(this).attr("get_id");
    $.ajax({
        url:"{{route('employeeCategorys.show')}}",
        data:{'id':id},
        dataType:'html',
        type:'get',
        success:function(data)
        {
            $("#viewBody").html(data);
        }
    });
   });

   $(document).on('click','#delete',function(){
    var id=$(this).attr("get_id");
    $.ajax({
        url:"{{route('employeeCategorys.destroy')}}",
        data:{'id':id, "_token": "{{ csrf_token() }}"},
        dataType:'json',
        type:'delete',
        success:function(data)
        {
            dataList();
            toastr["success"](data.message);
        }
    });
   });

   $(document).on("click",".edit",function(){
    var id=$(this).attr("get_id");
    $("#edit_id").val(id);
    $.ajax({
        url:"{{url('employeeCategorys_edit')}}",
        type:"get",
        data:{id:id},
        dataType:"json",
        success:function(data)
        {
            $("#edit_name").val(data.emp_cat_name);

            $("#edit_details").val(data.emp_cat_detils);
        }
    });
   });

   $(document).on('submit','#editForm',function(e){
    e.preventDefault();
    var data=$(this).serializeArray();
    $.ajax({
        url:"{{route('employeeCategorys.update')}}",
        data:data,
        type:"post",
        dataType:"json",
        success:function(data)
        {
            $("#editModal").modal('hide');
            dataList();
            toastr["success"](data.message);
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

function dataList(){
    $.ajax({
        url:"{{route('user.create')}}",
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

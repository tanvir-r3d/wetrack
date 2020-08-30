@extends('layouts.app')
@section('page_name') User Role @endsection
@section('section_header') User Role @endsection
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="/">Home</a>
    </div>
    <div class="breadcrumb-item active">User Role</div>
@endsection
@section('content')
    <div class="row custom-row">
        <h2 class="section-title">User Role List</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Role Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="display dataTable table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $i=>$user)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td style="text-transform:uppercase;">
                                        @if ($user['roles'])
                                            @foreach($user['roles'] as $role)
                                                <b>{{$role['name']}}</b>
                                            @endforeach
                                        @else
                                            Not Assigned
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" name="edit" data-toggle="modal"
                                                data-target="#editModal" data-id="{{$user['id']}}" class="edit btn
                                                btn-primary
                                        "><i class="fas fa-edit"></i></button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
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
    </div>
    <!-- Edit MODAL -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Assign Role </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="editForm">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">


                            <div class="form-group">
                                <label>User Email:</label>
                                <input type="text" class="form-control" id="user_email" disabled readonly>
                            </div>

                            <div class="form-group">
                                <label>Role:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled>SELECT ROLE</option>
                                    @foreach($roles as $role)
                                        <option value={{$role->id}} style="text-transform: capitalize">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <input type="hidden" id="old_role" name="old_role">

                        </div>
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
            $(document).on("click",".edit",function(){
                var id=$(this).attr("data-id");

                $.ajax({
                    url:`user_roles/${id}/`,
                    data:{'id':id,"_token": "{{ csrf_token() }}"},
                    type:"get",
                    dataType:"json",
                    success:function(data)
                    {
                        const { email, id , roles} = data[0];
                        $("#user_email").val(email);
                        if(roles[0]){
                            $("#role").val(roles[0].id);
                            $("#old_role").val(roles[0].name);
                        }
                        $("#editForm").attr("action",`/user_roles/update/${id}`);
                    }
                });
            });

    </script>

@endsection

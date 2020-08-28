@extends('layouts.app')
@section('page_name') Role Permission @endsection
@section('section_header') Role Permission @endsection
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="/">Home</a>
    </div>
    <div class="breadcrumb-item active">Role Permission</div>
@endsection
@section('content')
    <div class="row custom-row">
        <h2 class="section-title">Role Permission</h2>
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
                                <th class="">Role Name</th>
                                <th class="">Permissions</th>
                                <th class="">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php $i=0; @endphp
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td style="text-transform:uppercase;">{{$role->name}}</td>
                                    <td>
                                        @php $roles_permissions=array_column((collect($role)->toArray())['permissions'],'id');@endphp
                                        @foreach($permissions as $permission)
                                            @php $status=in_array($permission['id'],$roles_permissions); @endphp
                                            <input type="checkbox" disabled {{$status?'checked':''}}>
                                            {{$permission['name']}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="submit" data-toggle="modal" data-target="#permissionModal"
                                                data-id={{$role->id}} class="btn btn-primary permission
                                        ">Update</button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="">SL</th>
                                <th class="">Display Name</th>
                                <th class="">Name</th>
                                <th class="">Action</th>


                            </tr>
                            </tfoot>

                        </table>
                        <div style="margin-left: 80%;">
                            {{$roles->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- UPDATE MODAL -->
    <div class="modal fade" tabindex="-1" id="permissionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="permissionForm">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">

                            <label class="d-block">Permission</label>

                            <div id="permissions"></div>

                        </div>
                        <input type="hidden" id="name" name="name">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

@endsection
@section('script')
    <script>
        const arrayColumn = (arr, n) => arr.map(x => x[n]);
        $(".permission").click(function () {
            var id = $(this).attr("data-id");
            $.ajax({
                url: `/role_permission/${id}`,
                type: 'get',
                data: {'_token': '{{ csrf_token() }}'},
                dataType: 'json',
                success: function (data) {
                    let role=data.role_permissions[0];
                    $(".modal-title").text(`${role.name} Permissions`);
                    $("#name").val(role.name);

                    $("#permissionForm").attr("action",`/role_permission/${role.id}/update`)

                    $(".permission_input").remove();
                    let role_permission = role.permissions;
                    let role_permissions = [];
                    role_permissions = arrayColumn(role_permission, 'id');
                    $.each(data.permissions, function (k, v) {
                        let status = $.inArray(v.id, role_permissions) != -1 ? 'checked' : '';
                        $("#permissions").append(`<div class="form-check permission_input">
                        <input class="form-check-input" type="checkbox" value="${v.id}" id="checkbox${v.id}" name="permissions[]" ${status}>
                        <label class="form-check-label" for="checkbox${v.id}" style="text-transform:uppercase;">
                            ${v.name}
                   </label>
               </div>`);
                    });
                }
            });
        });
    </script>
@endsection


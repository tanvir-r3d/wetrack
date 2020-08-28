<?php

namespace App\Http\Controllers;

use App\RoleHasPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Session;
use Toastr;
use Spatie\Permission\Models\Permission;

class Role_PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = Role::with('permissions')->paginate(5);
        $data['permissions'] = Permission::all()->toArray();
        return view('admin.rbac.role_permission_index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role_permissions'] = Role::with('permissions')->whereId($id)->get()->toArray();
        $data['permissions'] = Permission::all();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        RoleHasPermission::whereRoleId($id)->delete();
        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                $data[] = ['permission_id' => $permission,
                    'role_id' => $id];
            }
            RoleHasPermission::insert($data);
        }
        Toastr::success('Congratulation! '.$request->name.' Information Saved Successfully', 'Permission', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}

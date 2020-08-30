<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use JsValidator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::orderBY('id', 'asc')->paginate(6);
        return view('admin.rbac.role_index', compact('data'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate
        ([
            'name' => 'required|unique:roles,name|max:35',
        ],
            [
                'name.unique' => 'Already Exist!',
            ]
        );
        $role = Role::create(['name' => $request->name]);

        $notification = array(
            'title' => 'Role',
            'message' => 'Successfully! Role Information Created.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function edit(Request $request)
    {


        $id = $request->id;
        $role = Role::find($id);

        return response()->json($role);
    }

    public function update(Request $request, $id)
    {
        $role = Role::where('id', $id)->update(['name' => $request->name]);
        $notification = array(
            'title' => 'Role',
            'message' => 'Successfully! Role Information Updated.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function delete($id)
    {
        Role::where('id', $id)->delete();
        $status = 200;
        $response = [
            'status' => $status,
            'message' => 'Successfully Deleted',
        ];
        return response()->json($response, $status);
    }

}

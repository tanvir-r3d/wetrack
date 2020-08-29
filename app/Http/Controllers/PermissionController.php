<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use JsValidator;
use Toastr;
use Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $data = Permission::orderBY('id', 'asc')->paginate(6);
       return view('admin.rbac.permission_index', compact('data'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate(['name' => 'required|unique:permissions,name|max:35',], ['name.unique' => 'Already Exist!',]);
        $permission = Permission::create(['name' => $request->name]);
        Toastr::success('Congratulation! New Permission Information Saved Successfully', 'permission', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

}

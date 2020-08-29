<?php

namespace App\Http\Controllers;

use Toastr;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
class UserRoleController extends Controller
{
    public function index()
    {
        $users=User::with('roles')->get()->toArray();
        $roles=Role::all();
        return view('admin.rbac.userRole',compact('users','roles'));
    }

    public function edit($id)
    {
        $user=User::whereId($id)->with('roles')->get()->toArray();
        return response()->json($user);
    }
    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $user->assignRole($request->role);
        Toastr::success('Congratulation! Role Assigned To User Successfully', 'permission', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}

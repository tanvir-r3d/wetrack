<?php

namespace App\Http\Controllers;

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
        if($request->old_role)
        {
            $user->removeRole($request->old_role);
        }
        $user->assignRole($request->role);
        $notification = array(
            'title' => 'User Role',
            'message' => 'Successfully! User Role Assigned.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}

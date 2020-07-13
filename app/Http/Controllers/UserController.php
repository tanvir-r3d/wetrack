<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Toastr;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.settings');
    }
    
    public function settings()
    {
        return view('admin.profile.settings');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>"required|unique:users,username,$id",
            'email'=>"required|unique:users,email,$id"
            ]);
        $update=[
            'user_first_name'=>$request->first_name,
            'user_last_name'=>$request->last_name,
            'user_gender'=>$request->gender,
            'username'=>$request->username,
            'email'=>$request->email,
        ];
        User::where('id',$id)->update($update);
        Toastr::success('Sucessfully Updated', 'Account', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    } 

    public function matchpass(Request $request)
    {
        if(Hash::check($request->old_pass, Auth::user()->password))
        {
            return response('1');
        }
        else
        {
            return response('0');
        }
    }

    public function changepass(Request $request)
    {
        if($request->new_pass==$request->retype_pass)
        {
            $update=['password'=>Hash::make($request->new_pass)];
            User::where('id',Auth::user()->id)->update($update);
            $status=200;
            $response=[
                'status'=>$status,
                'message'=>'Password Changed',
            ];
        }
        else
        {
            $status=500;
            $response=[
                'status'=>$status,
                'message'=>'Something Went Wrong',
            ];
        }
        return response()->json($response,$status);
    }
}

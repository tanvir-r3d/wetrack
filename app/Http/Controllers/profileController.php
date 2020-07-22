<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Toastr;
use Hash;
use Auth;
use DB;
use JsValidator;

class profileController extends Controller
{
	function index()
	{
		$validator=JsValidator::make([
			'username' => 'required','string','max:255','unique:users,username,'.Auth::user()->id,
            'first_name' => 'required', 'string', 'max:255',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id]);
		return view('admin.profile.index',['validator'=>$validator]);
	}

	function update(Request $request)
	{
		$user = User::find(Auth::user()->id);

         $validation= Validator::make($request->all(),[
            'username' => 'required', 'string', 'max:255',
            'first_name' => 'required', 'string', 'max:255',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id,
            'password' => 'required', 'string', 'min:8', 'confirmed']);
        $jsValidator = JsValidator::validator($validation);
        
        
            DB::beginTransaction();
            $user->user_first_name = $request->first_name;
            $user->user_last_name = $request->last_name;
            $user->user_gender = $request->gender;
            $user->user_contact = $request->contact;
            $user->username = $request->username;
            $user->email = $request->email;
         
            if($request->hasFile('image'))
            {
            	if (Auth::user()->user_img) 
            	{
            		unlink(public_path('images/user/').Auth::user()->user_img);
            	}
                $ext = $request->file('image')->getClientOriginalExtension();
                $path = public_path('images/user/');
                $img_name = 'user' . time() . '.' . $ext;
                $request->file('image')->move($path, $img_name);
                $user->user_img = $img_name;
            }
            $user->save();
            DB::commit();
        Toastr::success('Congratulation! New Information Saved Successfully', 'Profile',["positionClass" => "toast-top-right"]);
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

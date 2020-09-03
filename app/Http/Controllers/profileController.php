<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use DB;
use JsValidator;
use App\Rules\MatchOldPassword;
class profileController extends Controller
{

	function index()
	{
	    $user=User::find(Auth::id());
		$generalValidator=JsValidator::make($user->generalValidate());
        $passValidator=JsValidator::make([
            'old_pass' => ['required',new MatchOldPassword],
            'new_pass' => ['required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g','min:6'],
            'retype_pass' => ['same:new_pass'],
        ],[],$user->fieldName());
		return view('admin.profile.index',compact('generalValidator','passValidator'));
	}

	function update(Request $request)
	{
		$user = User::find(Auth::user()->id);

        $validation= Validator::make($request->all(),$user->generalValidate());

          if ($validation->fails()) {
        return back()->withInput()->withErrors($validation);
      }
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

            $notification = array(
                'title' => 'Profile',
                'message' => 'Congratulation! New Information Saved Successfully.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
	}


    public function changepass(Request $request)
    {
        $user=new User;
        $validator=Validator::make($request()->all,$user->passValidate());

        User::where('id',Auth::user()->id)->update(['password'=>Hash::make($request->new_pass)]);

        $notification = array(
            'title' => 'Profile',
            'message' => 'Congratulation! Password Changed Successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}

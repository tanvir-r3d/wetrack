<?php

namespace App\Http\Controllers;

use App\User;
use App\UserImage;
use Illuminate\Http\Request;
use Validator;
use Toastr;
use Hash;
use Auth;
use DB;
class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
    
    public function settings()
    {
        $data['images']=UserImage::get();
        return view('admin.profile.settings',$data);
    }
    
    public function create()
    {
        $data['users']=User::select('id','user_first_name','user_last_name','username','email')->get();
        $data['images']=UserImage::get();
        return view('admin.users.list',$data);
    }

    public function store(Request $request)
    {
        $user = new User;

         $validation= Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validation->fails())
        {
            $status = 400;
            $response = ['status' => $status, 'errors' => $validation->errors() , ];
        }
        else
        {
            DB::beginTransaction();
            $user->user_first_name = $request->first_name;
            $user->user_last_name = $request->last_name;
            $user->user_gender = $request->gender;
            $user->user_contact = $request->contact;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if ($request->hasFile('img'))
            {
                $filetype = $request->file('img')->getClientOriginalExtension();
                $path = public_path('images/user/');
                $img_name = 'user' . time() . '.' . $filetype;
                $request->file('img')->move($path, $img_name);
                $user_image = new UserImage;
                $user_image->user_id = $user->id;
                $user_image->user_img = $img_name;
                $user_image->save();
            }
            DB::commit();
            $status = 200;
            $response = ['status' => $status, 'message' => 'User Added', ];
        }
        return response()->json($response, $status);
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
        
        if ($request->hasFile('img'))
            {
                $filetype = $request->file('img')->getClientOriginalExtension();
                $path = public_path('images/user/');
                $img_name = 'user' . time() . '.' . $filetype;
                $request->file('img')->move($path, $img_name);
                $user_image = new UserImage;
                $user_image->user_id = $id;
                $user_image->user_img = $img_name;
                $user_image->save();
            }
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

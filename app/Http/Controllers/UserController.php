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

class UserController extends Controller
{ 
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(User::latest()->get())
            ->addColumn('action',function($data){
                $button='<button type="button" name="view" id="view" data-toggle="modal" data-target="#viewModal" data-id="'.$data->id.'" class="view btn btn-info"><i class="far fa-eye"></i></button>';
                $button.='&nbsp;&nbsp;';
                $button.='<button type="button" name="delete" id="delete" data-id="'.$data->id.'" class="delete btn btn-danger"><i class="fas fa-trash"></i></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $user=new User;
        $validator=JsValidator::make([
            'username' => 'required', 'string', 'max:255',
            'first_name' => 'required', 'string', 'max:255',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed']);
        return view('admin.users.index',['validator'=>$validator]);
    }
    
    public function settings()
    {
        // $data['images']=UserImage::get();
        // return view('admin.profile.settings',$data);
    }
    
    public function create()
    {
        $data['users']=User::select('id','user_first_name','user_last_name','username','email')->get();
        // $data['images']=UserImage::get();
        return view('admin.users.list',$data);
    }

    public function store(Request $request)
    {
        $user = new User;

         $validation= Validator::make($request->all(),[
            'username' => 'required', 'string', 'max:255',
            'first_name' => 'required', 'string', 'max:255',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed']);
        $jsValidator = JsValidator::validator($validation);
        
        
            DB::beginTransaction();
            $user->user_first_name = $request->first_name;
            $user->user_last_name = $request->last_name;
            $user->user_gender = $request->gender;
            $user->user_contact = $request->contact;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_img='';
            if($request->hasFile('image'))
            {
                $ext = $request->file('image')->getClientOriginalExtension();
                $path = public_path('images/user/');
                $img_name = 'user' . time() . '.' . $ext;
                $request->file('image')->move($path, $img_name);
                $user->user_img = $img_name;
            }
            $user->save();
            DB::commit();
        Toastr::success('Congratulation! New User Information Saved Successfully', 'User',["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

    public function show(Request $request)
    {
        $id=$request->id;
        $user=User::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user=User::find($id);
        if($user->user_img!='')
        {
            unlink(public_path('images/user/').$user->user_img);
        }
        User::where('id',$id)->delete();
        $status=200;
        $response=[
            'status'=>$status,
            'message'=>'Successfully Deleted',
        ];
        return response()->json($response,$status);
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

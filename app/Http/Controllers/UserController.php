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
        $user_validator=JsValidator::make([
            'username' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|string|email|max:255|unique:users',
            'pass' => 'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g|min:6',
            'retype'=>'required|same:pass']);
        return view('admin.users.index',['user_validator'=>$user_validator]);
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
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'pass' => 'required','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g','min:6',
            'retype'=>'required','same:pass']);
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

    public function image($id,Request $request)
    {
        $user=User::find($id);
        if($request->hasFile('image'))
        {
            if ($user->user_img)
            {
                unlink(public_path('images/user/').$user->user_img);
            }
            $ext = $request->file('image')->getClientOriginalExtension();
            $path = public_path('images/user/');
            $img_name = 'user' . time() . '.' . $ext;
            $request->file('image')->move($path, $img_name);
            $user->user_img = $img_name;
        }
        $user->save();
    }
}

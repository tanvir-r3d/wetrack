<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use JsValidator;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        if ($user->can('view user')) {
        $user=new User;
        if(request()->ajax())
        {
            return $user->datatable(User::latest()->get(),$view=true,$edit=false,$delete=true);
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
        else{
            abort('403');
        }
    }

    public function create()
    {
        $data['users']=User::all('id','user_first_name','user_last_name','username','email');
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
            $notification = array(
                'title' => 'User',
                'message' => 'Successfully! User Information Added.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
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

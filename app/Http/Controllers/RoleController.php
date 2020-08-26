<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Validator;
use JsValidator;
use Toastr;
class RoleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $role = new Role;
        if (request()->ajax()) {
            return $role->datatable(Role::latest()->get());

        }
        $validator = JsValidator::make($role->validation());
        return view('admin.rbac.role_index' , ['validator' => $validator]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        {
            $role = new Role;
            $validation = Validator::make($request->all() , $role->validation());
            if ($validation->fails()) {
                return back()->withInput()->withErrors($validation);
            }
           
            $role->name = $request->name;
            $role->guard_name = $request->guard_name;
            

            $role->save();
            Toastr::success('Congratulation! New role Information Saved Successfully' , 'role' , ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Request $request)
    {
        $id = $request->id;
        $role = Role::find($id);
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request , $id)
    {
        $role = new Role;
        $validation = Validator::make($request->all() , $role->validation());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        }
        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;

        $role->save();
        Toastr::success('Congratulation! New role Information Updated Successfully' , 'role' , ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\role $role
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {

        Role::where('id' , $id)->delete();
        $status = 200;
        $response = [
            'status' => $status ,
            'message' => 'Successfully Deleted' ,
        ];
        return response()->json($response , $status);


    }
}

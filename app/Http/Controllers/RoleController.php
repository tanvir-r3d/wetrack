<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use JsValidator;
use Toastr;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{ 


    public function index()
    {  

     // $data=JsValidator::make([
     //       'name' => ['required', 'string', 'unique:users']
     //     ]);
     
     
        $data = Role::orderBY('id','asc')->paginate(6);

      
        
        return view('admin.rbac.role_index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //     $val= $request->validate
      //   ([
        
      //   'name' => ['required', 'string', 'unique:users']

      //    ]);
      // $jsValidator = JsValidator::validator($val);
       

         $valid =  $request->validate
        ([
        'name' => 'required|unique:roles,name|max:35',
         ], 
         [
            
        'name.unique' => 'Already Exist!',
        
         ]
         );
        $role=Role::create(['name' => $request->name]);

            
            Toastr::success('Congratulation! New role Information Saved Successfully'  ,'role', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
       
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       

       $id = $request->id;
        $role = Role::find($id);
    
        return response()->json($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $role=Role::where('id',$id)->update(['name' => $request->name]);


            
            Toastr::success('Update role Successfully'  ,'role', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function delete($id)
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

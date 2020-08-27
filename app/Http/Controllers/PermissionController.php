<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use JsValidator;
use Toastr;
use Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

     // $data=JsValidator::make([
     //       'name' => ['required', 'string', 'unique:users']
     //     ]);
     
     
        $data = Permission::orderBY('id','asc')->paginate(6);

      
        
        return view('admin.rbac.permission_index',compact('data'));
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
        'name' => 'required|unique:permissions,name|max:35',
         ], 
         [
            
        'name.unique' => 'Already Exist!',
        
         ]
         );
        $permission=Permission::create(['name' => $request->name]);

            
            Toastr::success('Congratulation! New Permission Information Saved Successfully'  ,'permission', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy ($id)
    {


    }}

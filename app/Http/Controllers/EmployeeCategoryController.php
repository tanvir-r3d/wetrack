<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeCategory;
use Validator;

class EmployeeCategoryController extends Controller
{

    public function index()
    {
        return view('admin.employee.employeeCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employeeCategoryes']=EmployeeCategory::all();
        return view('admin.employee.employeeCategory.dataRows',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeCategory=new EmployeeCategory;
        $validation=Validator::make($request->all(),$employeeCategory->validation());

        if($validation->fails())
        {
            $status=400;
            $response=[
                'status'=>$status,
                'errors'=>$validation->errors(),
            ];
        }
        else
        {
            $input=[
                'emp_cat_name'=>$request->name,

                'emp_cat_detils'=>$request->details
            ];
            $employeeCategory->create($input);
            $status=200;
            $response=[
                'status'=>$status,
                'message'=>'EmployeeCategory Added',
            ];
            return response()->json($response,$status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeCategory  $employeeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id=$request->id;
        $data['employeeCategory']=EmployeeCategory::find($id);
        return view('admin.employee.employeeCategory.viewBody',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeCategory  $employeeCategory
     * @return \Illuminate\Http\Response
     */
    public function cat_edit(Request $request)
    {
        $id=$request->id;
        $value=EmployeeCategory::find($id);
        return response()->json($value);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeCategory  $employeeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $employeeCategory=new EmployeeCategory;
        $data=[
            'name'=>$request->name,
            'details'=>$request->details,
        ];
        $validation=Validator::make($data,$employeeCategory->validation());

        if($validation->fails())
        {
            $status=400;
            $response=[
                'status'=>$status,
                'errors'=>$validation->errors(),
            ];
        }
        else
        {
            $input=[
                'emp_cat_name'=>$data['name'],
                'emp_cat_detils'=>$data['details']
            ];
            $employeeCategory->where('emp_cat_id',$request->id)->update($input);
            $status=200;
            $response=[
                'status'=>$status,
                'message'=>'EmployeeCategory Updated',
            ];
            return response()->json($response,$status);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeCategory  $employeeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        EmployeeCategory::where('emp_cat_id',$id)->delete();
        $status=200;
        $response=[
            'status'=>$status,
            'message'=>'EmployeeCategory Deleted',];
        return response()->json($response,$status);
    }
}

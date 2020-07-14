<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.employee.employeeList.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['employees']=EmployeeCategory::all();
      return view('admin.employee.employeeList.dataRows',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $employee=new Employee;
      $validation=Validator::make($request->all(),$employee->validation());

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
              'emp_full_name'=>$request->full_name,
              'emp_branch_id'=>$request->branch_id,
              'emp_cat_id'=>$request->branch_cat,
              'emp_salery'=>$request->salery,
              'emp_gender'=>$request->gender,
              'emp_username'=>$request->user_name,
              'emp_email'=>$request->email,
              'emp_password'=>$request->password,
              'emp_address'=>$request->address,
              'emp_phone'=>$request->phone

             ];
          $employee->create($input);
          $status=200;
          $response=[
              'status'=>$status,
              'message'=>'Employee Added',
          ];
          return response()->json($response,$status);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

          $id=$request->id;
          $data['employeeCategory']=Employee::find($id);
          return view('admin.employee.employeeList.viewBody',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}

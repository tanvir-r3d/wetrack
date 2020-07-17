<?php

namespace App\Http\Controllers;

use App\EmployeeStatus;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeStatusController extends Controller
{
 
    public function index()
    {
        return view('admin.infield.list.index');
    }

    public function create()
    {
        $data['employees'] = Employee::select('emp_id','emp_full_name','emp_username')->get();
        $data['statuss'] = EmployeeStatus::where('emp_status','active')->get();
        return view('admin.infield.list.dataRows', $data);
    }

    public function statusChange(Request $request)
    {
        $id=$request->id;
        $status=$request->status;
        EmployeeStatus::where('emp_id',$id)->update(['emp_status'=>$status]);
        $status = 200;
        $response = ['status' => $status, 'message' => 'Employee Status Updated', ];
        return response()->json($response, $status);

    }

}

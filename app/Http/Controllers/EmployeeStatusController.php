<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Branch;
use App\Company;
use App\User;
use Illuminate\Http\Request;

class EmployeeStatusController extends Controller
{
 
    public function index()
    {
        $branchs = Branch::get();
        $companys = Company::get();
        $employees= Employee::get();
        $users=User::get();
        if(request()->ajax())
        {
          return datatables()->of(Employee::where('emp_status','on')->get())
          ->addColumn('action',function($data){
              $button='<a type="button" name="track" id="track" href="/track_map/'.$data->emp_id.'" class="track btn btn-primary"><i class="fas fa-map-marker-alt"></i></a>';
              $button.='&nbsp;&nbsp;';
              $button.='<button type="button" name="delete" id="delete" data-id="'.$data->emp_id.'" class="delete btn btn-danger"><i class="fas fa-trash"></i></button>';
              return $button;
          })
          ->addColumn('branch_name',function($data) use ($branchs)
            {
              $branch=collect($branchs)->where('branch_id',$data->emp_branch_id)->first();
              return $branch->branch_name;
            })
            ->addColumn('com_name',function($data) use ($companys)
            {
              $company=collect($companys)->where('com_id',$data->emp_com_id)->first();
              return $company->com_name;
            })
            ->addColumn('username',function($data) use ($users)
            {
              $user=collect($users)->where('emp_id',$data->emp_id)->first();
              return $user->username;
            })
          ->rawColumns(['action'])
          ->make(true);
        }
        return view('admin.infield.list.index');
    }

    public function statusChange(Request $request)
    { 
        $id=$request->id;
        $status=$request->status;
        Employee::where('emp_id',$id)->update(['emp_status'=>$status]);
        $status = 200;
        $response = ['status' => $status, 'message' => 'Employee Status Updated', ];
        return response()->json($response, $status);

    }

}

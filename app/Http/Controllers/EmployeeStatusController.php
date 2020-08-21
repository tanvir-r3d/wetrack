<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Branch;
use App\Company;
use App\User;
use Illuminate\Http\Request;
use App\tracking_data;
use Illuminate\Support\Facades\URL;

class EmployeeStatusController extends Controller
{

    public function index()
    {
        $branchs = Branch::get();
        $companys = Company::get();
        $users=User::get();
        $tracking_data=tracking_data::get();

        if(request()->ajax())
        {
          return datatables()->of(Employee::where('emp_status','on')->get())
          ->addColumn('action',function($data) use($branchs,$companys){
            $company=collect($companys)->where('com_id',$data->emp_com_id)->first();
            $branch=collect($branchs)->where('branch_id',$data->emp_branch_id)->first();
              $button="";
              if(URL::previous() != url('/home') && URL::previous() != url('/'))
              {
                  $button.='<button type="button" name="track" data-toggle="modal" data-target="#trackModal" data-id="' .$data->emp_id . '" data-employee="'.$data->emp_full_name.'" data-phone="'.$data->emp_phone.'" data-branch="'.$branch->branch_name.'" data-company="'.$company->com_name.'" class="track btn btn-primary track"><i class="fas fa-map-marker-alt"></i></button>';
              }
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
            ->addColumn('tracking',function($data) use ($tracking_data)
            {
                $track=collect($tracking_data)->where('emp_id',$data->emp_id)->sortByDesc('tracking_id')->first();
                if($track)
                {
                    return $track->created_at->diffForHumans();
                }
                else
                {
                    return "null";
                }
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

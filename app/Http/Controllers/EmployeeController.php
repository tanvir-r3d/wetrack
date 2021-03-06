<?php
namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeImage;
use Illuminate\Http\Request;
use Validator;
use JsValidator;
use App\EmployeeCategory;
use App\Branch;
use DB;
use App\Company;
use App\User;
use Hash;
use Auth;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if ($user->can('view employee')) {
              $branchs = Branch::get();
              $categorys = EmployeeCategory::get();
              $companys = Company::get();
              $employee=new Employee;
              if(request()->ajax())
              {
                  return datatables()->of(Employee::latest()->get())
                  ->addColumn('action',function($data){
                      $button='<button type="button" name="edit" id="edit" data-toggle="modal" data-target="#editModal" data-id="'.$data->emp_id.'" class="edit btn btn-primary"><i class="fas fa-edit"></i></button>';
                      $button.='&nbsp;&nbsp;';
                      $button.='<button type="button" name="delete" id="delete" data-id="'.$data->emp_id.'" class="delete btn btn-danger"><i class="fas fa-trash"></i></button>';
                      return $button;
                  })
                  ->addColumn('branch_name',function($data) use ($branchs)
                  {
                    $branch=collect($branchs)->where('branch_id',$data->emp_branch_id)->first();
                    return $branch->branch_name;
                  })
                  ->addColumn('company_name',function($data) use ($companys)
                  {
                    $company=collect($companys)->where('com_id',$data->emp_com_id)->first();
                    return $company->com_name;
                  })
                  ->addColumn('category_name',function($data) use ($categorys)
                  {
                    $category=collect($categorys)->where('emp_cat_id',$data->emp_cat_id)->first();
                    return $category->emp_cat_name;
                  })
                  ->addColumn('status',function($data)
                  {
                    if($data->emp_status)
                    {
                      $button='<button type="button" name="status" id="status" data-id="'.$data->emp_id.'" data-status="active" class="status btn" style="color:green"><i class="fas fa-check"> Active</i></button>';
                    }
                    else
                    {
                      $button='<button type="button" name="status" id="status" data-id="'.$data->emp_id.'" data-status="inactive" class="status btn"><i class="fas fa-times"> Inactive</i></button>';
                    }
                    return $button;
                  })
                  ->rawColumns(['action','status'])
                  ->make(true);
              }
              $addValidator=JsValidator::make($employee->validation());
              $editValidator=JsValidator::make($employee->validation());
              return view('admin.employee.employeeList.index',compact('addValidator','editValidator','categorys','companys','branchs'));
            }

           else{
            abort('403');
           } 


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $employee = new Employee;
      $user = new User;
      $validation=Validator::make($request->all(),$employee->validation());
      if ($validation->fails()) {
        return back()->withInput()->withErrors($validation);
      }
      else
      {
        $employee->emp_full_name = $request->full_name;
        $employee->emp_branch_id = $request->branch_id;
        $employee->emp_cat_id = $request->cat_id;
        $employee->emp_com_id = $request->com_id;
        $employee->emp_salery = $request->salery;
        $employee->emp_gender = $request->gender;
        $employee->emp_address = $request->address;
        $employee->emp_phone = $request->phone;
        $employee->emp_status=$request->status;

          if($request->hasFile('image'))
          {
              $ext = $request->file('image')->getClientOriginalExtension();
              $path = public_path('images/employee/');
              $name = 'image' . time() . '.' . $ext;
              $request->file('image')->move($path, $name);
              $employee->emp_img = $name;
          }
          else
          {
              $employee->emp_img = '';
          }
          $employee->save();

          $user->username = $request->username;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->emp_id = $employee->emp_id;
          $user->user_type =1;
          $user->save();

          $notification = array(
            'title' => 'Employee',
            'message' => 'Successfully! Employee Information Added.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $employee= Employee::find($id);
        return response()->json($employee);


    }

    public function update(Request $request,$id)
    {
          $employee=New Employee;
          $validation=Validator::make($request->all(),$employee->validation());

                $employee=Employee::find($id);
                $employee->emp_branch_id = $request->branch_id;
                $employee->emp_cat_id = $request->cat_id;
                $employee->emp_com_id = $request->com_id;
                $employee->emp_full_name = $request->full_name;
                $employee->emp_gender = $request->gender;
                $employee->emp_salery = $request->salery;
                $employee->emp_phone = $request->phone;
                $employee->emp_address = $request->address;
                $employee->emp_status = $request->status;

              if($request->hasFile('image'))
              {
                  if($employee->emp_img)
                  {
                      unlink(public_path('images/employee/').$employee->emp_img);
                  }

                      $ext = $request->file('image')->getClientOriginalExtension();
                      $path = public_path('images/employee/');
                      $name = 'image' . time() . '.' . $ext;
                      $request->file('image')->move($path, $name);
                      $employee->emp_img = $name;
              }
          $employee->save();
          $notification = array(
            'title' => 'Employee',
            'message' => 'Successfully! Employee Information Updated.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          Employee::where('emp_id',$id)->delete();
          User::where('emp_id',$id)->delete();
          $status=200;
          $response=[
              'status'=>$status,
              'message'=>'Successfully Deleted',
          ];
          return response()->json($response,$status);
    }
}

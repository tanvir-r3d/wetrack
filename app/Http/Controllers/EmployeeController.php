<?php
namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeImage;
use Illuminate\Http\Request;
use Validator;
use App\EmployeeCategory;
use App\Branch;
use App\EmployeeStatus;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['branchs'] = Branch::get();
        $data['categorys'] = EmployeeCategory::get();
        $data['status'] = EmployeeStatus::get();
        return view('admin.employee.employeeList.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['employees'] = Employee::get();
        $data['branchs'] = Branch::get();
        $data['categorys'] = EmployeeCategory::get();
        $data['images'] = EmployeeImage::get();
        $data['status'] = EmployeeStatus::get();
        return view('admin.employee.employeeList.dataRows', $data);
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
        $image = new EmployeeImage;
        $validation = Validator::make($request->all() , $employee->validation());

        if ($validation->fails())
        {
            $status = 400;
            $response = ['status' => $status, 'errors' => $validation->errors() , ];
        }
        else
        {
            DB::beginTransaction();
            $employee->emp_full_name = $request->full_name;
            $employee->emp_branch_id = $request->branch_id;
            $employee->emp_cat_id = $request->cat_id;
            $employee->emp_salery = $request->salery;
            $employee->emp_gender = $request->gender;
            $employee->emp_username = $request->user_name;
            $employee->emp_email = $request->email;
            $employee->emp_password = $request->password;
            $employee->emp_address = $request->address;
            $employee->emp_phone = $request->phone;
            $employee->save();

            if ($request->hasFile('image'))
            {
                $filetype = $request->file('image')
                    ->getClientOriginalExtension();
                $path = public_path('images/employee/');
                $img_name = 'Emp' . time() . '.' . $filetype;
                $request->file('image')
                    ->move($path, $img_name);
                $employee_image = new EmployeeImage();
                $employee_image->emp_id = $employee->emp_id;
                $employee_image->emp_img = $img_name;
                $employee_image->save();
            }
            $status = new EmployeeStatus;
            $status->emp_id = $employee->emp_id;
            $status->emp_status = $request->status;
            $status->save();
            DB::commit();
            $status = 200;
            $response = ['status' => $status, 'message' => 'Employee Added', ];
            return response()->json($response, $status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $data['employee'] = Employee::find($id);
        $data['branchs'] = Branch::get();
        $data['categorys'] = EmployeeCategory::get();
        $data['images'] = EmployeeImage::get();
        $data['status'] = EmployeeStatus::get();
        return view('admin.employee.employeeList.viewBody', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function emp_edit(Request $request)
    {
        $id = $request->id;
        $data['employee'] = Employee::find($id);
        $data['branchs'] = Branch::get();
        $data['categorys'] = EmployeeCategory::get();
        $data['images'] = EmployeeImage::get();
        $data['status'] = EmployeeStatus::get();
        return view('admin.employee.employeeList.editBody', $data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $employee = Employee::find($id);
        $employee_image = EmployeeImage::firstWhere('emp_id', $id);
        $validation = Validator::make($request->all() , $employee->validation());

        if ($validation->fails())
        {
            $status = 400;
            $response = ['status' => $status, 'errors' => $validation->errors() , ];
        }
        else
        {
            $employee->emp_branch_id = $request->branch_id;
            $employee->emp_cat_id = $request->cat_id;
            $employee->emp_full_name = $request->full_name;
            $employee->emp_gender = $request->gender;
            $employee->emp_salery = $request->salery;
            $employee->emp_phone = $request->phone;
            $employee->emp_username = $request->user_name;
            $employee->emp_email = $request->email;
            $employee->emp_address = $request->address;
            $employee->save();

            if ($request->hasFile('image'))
            {
                if ($employee_image)
                {
                    EmployeeImage::where('emp_id', $id)->delete();
                    unlink(public_path('images/employee/') . $employee_image->emp_img);
                }
                $filetype = $request->file('image')
                    ->getClientOriginalExtension();
                $path = public_path('images/employee/');
                $img_name = 'Emp' . time() . '.' . $filetype;
                $request->file('image')
                    ->move($path, $img_name);
                $employee_image = new EmployeeImage();
                $employee_image->emp_id = $id;
                $employee_image->emp_img = $img_name;
                $employee_image->save();
            }
            EmployeeStatus::where('emp_id',$id)->update(['emp_status'=>$request->status]);
            $status = 200;
            $response = ['status' => $status, 'message' => 'Employee Updated', ];
        }
        return response()->json($response, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $img = EmployeeImage::firstWhere('emp_id', $id);
        if ($img)
        {
            unlink(public_path('images/employee/') . $img->emp_img);
        }
        Employee::where('emp_id', $id)->delete();
        EmployeeStatus::where('emp_id', $id)->delete();
        EmployeeImage::where('emp_id', $id)->delete();
        DB::commit();
        $status = 200;
        $response = ['status' => $status, 'message' => 'Employee Deleted', ];
        return response()->json($response, $status);
    }
}


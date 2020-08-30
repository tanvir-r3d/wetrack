<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeCategory;
use Validator;
use JsValidator;
use Auth;
class EmployeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
         $user=Auth::user();
        if ($user->can('view employee category')) {
                $employeeCategory = new EmployeeCategory;
                if (request()->ajax()) {
                    return $employeeCategory->datatable(EmployeeCategory::latest()->get());
                }
                $validator = JsValidator::make($employeeCategory->validation());
                return view('admin.employee.employeeCategory.index' , ['validator' => $validator]);
            }
            else{
                abort('403');
            }
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
            $employeeCategory = new EmployeeCategory;
            $validation = Validator::make($request->all() , $employeeCategory->validation());
            if ($validation->fails()) {
                return back()->withInput()->withErrors($validation);
            }
            $employeeCategory->emp_cat_name = $request->name;
            $employeeCategory->emp_cat_detils = $request->details;

            $employeeCategory->save();
            $notification = array(
                'title' => 'Employee Category',
                'message' => 'Successfully! Employee Category Information Added.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\EmployeeCategory $employeeCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Request $request)
    {
        $id = $request->id;
        $employeeCategory = EmployeeCategory::find($id);
        return response()->json($employeeCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\EmployeeCategory $employeeCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request , $id)
    {
        $employeeCategory = new EmployeeCategory;
        $validation = Validator::make($request->all() , $employeeCategory->validation());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        }
        $employeeCategory = EmployeeCategory::find($id);
        $employeeCategory->emp_cat_name = $request->name;
        $employeeCategory->emp_cat_detils = $request->details;

        $employeeCategory->save();
        $notification = array(
            'title' => 'Employee Category',
            'message' => 'Successfully! Employee Category Information Updated.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\EmployeeCategory $employeeCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {

        EmployeeCategory::where('emp_cat_id' , $id)->delete();
        $status = 200;
        $response = [
            'status' => $status ,
            'message' => 'Successfully Deleted' ,
        ];
        return response()->json($response , $status);


    }
}

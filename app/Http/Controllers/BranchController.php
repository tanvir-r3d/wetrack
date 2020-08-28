<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Validator;
use JsValidator;
use Toastr;
use App\Company;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $branch = new Branch;
        $data['companys'] = Company::get();
        if (request()->ajax()) {
            return $branch->datatable(Branch::latest()->get());
//            return datatables()->of(Branch::latest()->get())
//                ->addColumn('action' , function ($data) {
//                    $button = '<button type="button" name="edit" id="edit" data-toggle="modal" data-target="#editModal" data-id="' . $data->branch_id . '" class="edit btn btn-primary"><i class="fas fa-edit"></i></button>';
//                    $button .= '&nbsp;&nbsp;';
//                    $button .= '<button type="button" name="delete" id="delete" data-id="' . $data->branch_id . '" class="delete btn btn-danger"><i class="fas fa-trash"></i></button>';
//                    return $button;
//                })
//                ->rawColumns(['action'])
//                ->make(true);
        }
        $validator = JsValidator::make($branch->validation());
        return view('admin.branch.index' , ['validator' => $validator] , $data);
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
            $branch = new Branch;
            $validation = Validator::make($request->all() , $branch->validation());
            if ($validation->fails()) {
                return back()->withInput()->withErrors($validation);
            }
            $branch->com_id = $request->com_id;
            $branch->branch_name = $request->name;
            $branch->branch_location = $request->location;
            $branch->branch_details = $request->details;

            $branch->save();
            Toastr::success('Congratulation! New Branch Information Saved Successfully' , 'Branch' , ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Branch $branch
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Request $request)
    {
        $id = $request->id;
        $branch = Branch::find($id);
        return response()->json($branch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Branch $branch
     *
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request , $id)
    {
        $branch = new Branch;
        $validation = Validator::make($request->all() , $branch->validation());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        }
        $branch = Branch::find($id);
        $branch->branch_name = $request->name;
        $branch->branch_location = $request->location;
        $branch->branch_details = $request->details;

        $branch->save();
        Toastr::success('Congratulation! New Branch Information Updated Successfully' , 'Branch' , ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Branch $branch
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Branch::where('branch_id' , $id)->delete();
        $status = 200;
        $response = [
            'status' => $status ,
            'message' => 'Successfully Deleted' ,
        ];
        return response()->json($response , $status);


    }
}

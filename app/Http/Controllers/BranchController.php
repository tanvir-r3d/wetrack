<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Validator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.branch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['branches']=Branch::all();
        return view('admin.branch.dataRows',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch=new Branch;
        $validation=Validator::make($request->all(),$branch->validation());

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
                'branch_name'=>$request->name,
                'branch_location'=>$request->location,
                'branch_details'=>$request->details
            ];
            $branch->create($input);
            $status=200;
            $response=[
                'status'=>$status,
                'message'=>'Branch Added',
            ];
            return response()->json($response,$status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id=$request->id;
        $data['branch']=Branch::find($id);
        return view('admin.branch.viewBody',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function b_edit(Request $request)
    {
        $id=$request->id;
        $value=Branch::find($id);
        return response()->json($value);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $branch=new Branch;
        $data=[
            'name'=>$request->name,
            'location'=>$request->location,
            'details'=>$request->details,
        ];
        $validation=Validator::make($data,$branch->validation());

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
                'branch_name'=>$data['name'],
                'branch_location'=>$data['location'],
                'branch_details'=>$data['details']
            ];
            $branch->where('branch_id',$request->id)->update($input);
            $status=200;
            $response=[
                'status'=>$status,
                'message'=>'Branch Updated',
            ];
            return response()->json($response,$status);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        Branch::where('branch_id',$id)->delete();
        $status=200;
        $response=[
            'status'=>$status,
            'message'=>'Branch Deleted',];
        return response()->json($response,$status);
    }
}

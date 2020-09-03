<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\tracking_data;
use Illuminate\Http\Request;

class TrackingDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=tracking_data::all();
        return response()->json($data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $track=new tracking_data;
        $track->fill($request->all())->save();
        $message="Successfully Tracking Data Added";
        return response()->json($message,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracking_data=tracking_data::find($id);
        return response()->json($tracking_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tracking_data=tracking_data::find($id);
        $tracking_data->delete();
        $message="Successfully Tracking Data Deleted";
        return response()->json($message,200);
    }
}

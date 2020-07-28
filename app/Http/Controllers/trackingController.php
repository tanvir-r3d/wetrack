<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tracking_data;
use Auth;
use App\Employee;
use App\User;
class trackingController extends Controller
{
    function latlonSave(Request $request)
    {
        $tracking_data=new tracking_data;
        $tracking_data->tracking_latitude = $request->latitude;
        $tracking_data->tracking_longitude = $request->longitude;
        $tracking_data->emp_id = Auth::user()->id;
        $tracking_data->save();
    }

    function get(Request $request)
    {
        $id=$request->emp_id;
        $data['firstData']=tracking_data::where('emp_id',$id)->orderBy('created_at','asc')->first();
        $data['lastData']=tracking_data::where('emp_id',$id)->orderBy('created_at','desc')->first();
        return response()->json($data);
    }
}

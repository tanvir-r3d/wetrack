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
        $tracking_data->user_id = Auth::user()->id;
        $tracking_data->save();
    }

    function gmap($id=null) 
    {
        $employees=Employee::where('emp_status','on')->get();
        $users=User::whereNotNull('emp_id')->get();
        $id=$id;
        return view('admin.infield.track.index',compact('id','employees','users'));
    }

    function get(Request $request)
    {
        $id=$request->user_id;
        $data['firstData']=tracking_data::where('user_id',$id)->orderBy('created_at','asc')->first();
        $data['lastData']=tracking_data::where('user_id',$id)->orderBy('created_at','desc')->first();
        return response()->json($data);
    }
}

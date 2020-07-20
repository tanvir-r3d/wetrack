<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tracking_data;
use Auth;
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

    function gmap()
    {
        return view('admin.users.gmap');
    }
}

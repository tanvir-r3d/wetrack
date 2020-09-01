<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\tracking_data;
use App\Employee;

class DeleteDailyTracking extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        tracking_data::truncate();
        Employee::where('emp_status','on')->increment('infield');
    }
}

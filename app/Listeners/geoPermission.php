<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class geoPermission
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    { 
        $i = "<script>";
        $i .= "if(navigator.geolocation){navigator.geolocation.getCurrentPosition(showPosition);}";
        $i .= "function showPosition(position){";
        $i .= "var latitude = position.coords.latitude;";
        $i .= "var longitude = position.coords.longitude;";
        $i .= "$.ajax({";
        $i .= "url:'{{route('track.create')}}',";
        $i .= "type:'post',";
        $i .= "data:{'latitude':latitude,'longitude':longitude,'_token': '{{ csrf_token() }}'}";
        $i .= "});";
        $i .= "}";
        $i .= "</script>";
        echo $i;
    }
}

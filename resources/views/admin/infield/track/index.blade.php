@extends('layouts.app')
@section('page_name') Tracking @endsection
@section('section_header') Track Employee @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Employee Track</div>
@endsection
@section('content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Map</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        
                        <div class="list-group" style="border-style: ridge;">
                      @foreach($employees as $employee)
                      @php $user=collect($users)->where('emp_id',$employee->emp_id)->first(); @endphp
                      <button id="employee" class="btn list-group-item list-group-item-action" data-id='{{$user->id}}'>{{$user->username}}</button>
                      @endforeach
                    </div>

                      </div>
                      <div class="col-md-8">
                    <div id="map" data-height="400"></div>

                      </div>
                      <input type="text" id="latitude" hidden>
                      <input type="text" id="longitude" hidden>
                    </div>
                  </div>
                </div>
              </div>
</div>
@endsection
@section('script')
<script>
$(document).on("click","#employee",function(){
  var user_id=$(this).attr("data-id");
   $.ajax
   ({
      url:'/track/get',
      data:{'user_id':user_id,"_token": "{{ csrf_token() }}"},
      type:'get',
      dataType:'json',
      success:function(data)
      {
        var from_places=(data.firstData.tracking_latitude)+','+(data.firstData.tracking_longitude);
        var to_places=(data.lastData.tracking_latitude)+','+(data.lastData.tracking_longitude);
        
        console.log(from_places);
        var origin = from_places;
        var destination = to_places;
      
        calcRoute(origin,destination);
      }
  });

});



var map;
var directionsRenderer;
var directionsService;
var stepDisplay;
var markerArray = [];

function initMap() {
  // Instantiate a directions service.
  directionsService = new google.maps.DirectionsService();

  // Create a map and center it on Manhattan.
  var manhattan = new google.maps.LatLng(40.7711329, -73.9741874);
  var mapOptions = {
    zoom: 13,
    center: manhattan
  }
  map = new google.maps.Map(document.getElementById('map'), mapOptions);

  // Create a renderer for directions and bind it to the map.
  var rendererOptions = {
    map: map
  }
  directionsRenderer = new google.maps.DirectionsRenderer(rendererOptions)

  // Instantiate an info window to hold step text.
  stepDisplay = new google.maps.InfoWindow();
}



function calcRoute(origin,destination) {

  // First, clear out any existing markerArray
  // from previous calculations.
  for (i = 0; i < markerArray.length; i++) {
    markerArray[i].setMap(null);
  }


  var request = {
      origin: origin,
      destination: destination,
      travelMode: 'WALKING'
  };

  // Route the directions and pass the response to a
  // function to create markers for each step.
  directionsService.route(request, function(response, status) {
    console.log(response);
    if (status == "OK") {
      var warnings = document.getElementById("warnings_panel");
      directionsRenderer.setDirections(response);
      showSteps(response);
    }
     else {
            directionsDisplay.setMap(null);
            directionsDisplay.setDirections(null);
            alert('Could not display directions due to: ' + status);
        }
  });
}

function showSteps(directionResult) {
  // For each step, place a marker, and add the text to the marker's
  // info window. Also attach the marker to an array so we
  // can keep track of it and remove it when calculating new
  // routes.
  var myRoute = directionResult.routes[0].legs[0];

  for (var i = 0; i < myRoute.steps.length; i++) {
      var marker = new google.maps.Marker({
        position: myRoute.steps[i].start_point,
        map: map
      });
      attachInstructionText(marker, myRoute.steps[i].instructions);
      markerArray[i] = marker;
  }
}

function attachInstructionText(marker, text) {
  google.maps.event.addListener(marker, 'click', function() {
    stepDisplay.setContent(text);
    stepDisplay.open(map, marker);
  });
}

</script>
@endsection

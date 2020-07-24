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

var latitude  = parseFloat("");
var longitude = parseFloat("");
var from_places = parseFloat("");
var to_places = parseFloat("");

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
          from_places=(data.firstData.tracking_latitude)+','+(data.firstData.tracking_longitude);
          to_places=(data.lastData.tracking_latitude)+','+(data.lastData.tracking_longitude);


          var origin = from_places;
          var destination = to_places;
          var travel_mode = 'WALKING';
          var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
          var directionsService = new google.maps.DirectionsService();
          displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);

        }
    });

  });




   google.maps.event.addDomListener(window, 'load', function (listener) {
            initMap();
        });


function initMap() 
    {
        // initial map setting
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          mapTypeId: 'roadmap',
        });
        map.setCenter({lat: latitude, lng: longitude});

        // find geoLocation
        if (!latitude || !longitude)
        if (navigator.geolocation) 
        {
            navigator.geolocation.getCurrentPosition(function geolocationSuccess(position) { 
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;

                map.setCenter({
                    lat: position.coords.latitude, 
                    lng: position.coords.longitude
                });
            }, function() {
                document.getElementById('error').innerHTML = 'Browser doesn\'t support geolocation';
                toastr.error("Browser doesn't support geolocation" , "Error!"); 
                document.getElementById('error').classList.remove("sr-only");
                $(".submit").attr("disabled", 'disabled');
            });
        }  
}

function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
    directionsService.route({
        origin: origin,
        destination: destination,
        travelMode: travel_mode,
        avoidTolls: true
    }, function (response, status) {
        if (status === 'OK') {
            directionsDisplay.setMap(map);
            directionsDisplay.setDirections(response);
        } else {
            directionsDisplay.setMap(null);
            directionsDisplay.setDirections(null);
            alert('Could not display directions due to: ' + status);
        }
    });
}




</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeyiyPuXk0_dH9lja_hxNfmlLrbH8noIs&callback=initMap"
      defer>
</script>
@endsection

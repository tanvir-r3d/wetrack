@extends('layouts.app')
@section('page_name') Infield Employee @endsection
@section('section_header') Employee Infield @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Employee Infield</div>
@endsection
@section('content')
<h2 class="section-title">Employee Infield List</h2>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Infield List Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTable" class="display dataTable table table-striped" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">Company</th>
                <th class="text-center">Branch</th>
                <th class="text-center">Name</th>
                <th class="text-center">Username</th>
                <th class="text-center">Action</th>
                <th class="text-center">Last Update</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr>
                <th>Company</th>
                <th>Branch</th>
                <th>Name</th>
                <th>Username</th>
                <th>Action</th>
                <th>Last Update</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Track MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="trackModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tracker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                               <div class="row">
                                   <div class="col-md-6 text-dark"><h6>Company: <small id="company"></small></h6></div>
                                    <div class="col-md-6 text-dark"><h6>Branch: <small id="branch"></small></h6></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-dark"><h6>Name: <small id="name"></small></h6></div>
                                    <div class="col-md-6 text-dark"><h6>Phone: <small id="phone"></small></h6></div>
                                </div>
                            </div>
                        <div class="col-md-4">
                                <label class="custom-switch" style="margin-left: -2.25rem;">
                                    <input type="checkbox" name="status" id="refresh" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Auto Refresh Location</span>
                                </label>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <div id="map" data-height="400"></div>
                        <input type="text" id="latitude" hidden>
                        <input type="text" id="longitude" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-outline-primary" value="Submit">
                </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDXkzEIj9sB3J_ohqT0woVWqAJQiyRmAE&libraries=places&callback=initMap"></script>
    <script>
    var emp_id="";
  $(document).ready(function() {
      try {
            $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax:"/employee_status/",
            "columns":[
                {
                    data: 'com_name',
                    },
                {
                    data: 'branch_name',
                    },
                {
                    data: 'emp_full_name',
                    },
                {
                    data: 'emp_phone',
                    },
                {
                    data: 'action',
                    name: 'action',
            orderable:false,
                    },
                    {
                        data:'tracking',
                    },
            ],
        });
      } catch (err) {
        alert("Employee Infield Data in Empty.");
      }


  $(document).on("click","#delete",function(){
    var id=$(this).attr("data-id");
    $.ajax({
      url:"/company/delete/"+id,
      type:"get",
      dataType:"json",
      success:function(data)
      {
        location.reload();
      }
    });
  });
  });

  $(document).on("click",".track",function(){
      var company=$(this).attr("data-company");
      $("#company").text(company);
      var branch=$(this).attr("data-branch");
      $("#branch").text(branch);
      var name=$(this).attr("data-employee");
      $("#name").text(name);
      var phone=$(this).attr("data-phone");
      $("#phone").text(phone);
      emp_id=$(this).attr("data-id");
      getEmployeeLocation(emp_id);

      $("#refresh").change(function () {
          var check=$(this).prop('checked');
          if(check){
              interval = setInterval(function() {
                  getEmployeeLocation(emp_id)
              }, 3000);
          }
          else{
              clearInterval(interval);
          }
      })
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
      var dhaka = new google.maps.LatLng(23.8223, 90.3654);
      var mapOptions = {
          zoom: 13,
          center: dhaka,
          styles:[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
]
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

  function getEmployeeLocation(emp_id){
      $.ajax
      ({
          url:'/track/get',
          data:{'emp_id':emp_id,"_token": "{{ csrf_token() }}"},
          type:'get',
          dataType:'json',
          success:function(data)
          {
              var origin=(data.firstData.tracking_latitude)+','+(data.firstData.tracking_longitude);
              var destination=(data.lastData.tracking_latitude)+','+(data.lastData.tracking_longitude);

              calcRoute(origin,destination);
          }
      });
  }

</script>
@endsection

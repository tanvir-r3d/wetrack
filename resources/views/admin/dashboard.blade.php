@extends('layouts.app')
@section('page_name') Dashboard @endsection
@section('section_header') Dashboard @endsection
@section('content')
<!-- Main Content -->
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Company</h4>
                  </div>
                  <div class="card-body">
                    @php $company_count=collect($company)->count(); @endphp
                    {{ $company_count }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Branch</h4>
                  </div>
                  <div class="card-body">
                    @php $branch_count=collect($branch)->count(); @endphp
                    {{ $branch_count }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Employee</h4>
                  </div>
                  <div class="card-body">
                    @php $employee_count=collect($employee)->count(); @endphp
                    {{ $employee_count }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tracking</h4>
                  </div>
                  <div class="card-body">
                    @php $status_count=collect($employee)->whereNotNull('emp_status')->count(); @endphp
                    {{ $status_count }}
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Infield Employee Updates</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="dataTable table table-striped mb-0">
                          <thead>
                            <tr>
                              <th>Company</th>
                              <th>Branch</th>
                              <th>Employee</th>
                              <th>Phone</th>
                              <th>Action</th>
                              <th>Updated</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Your Location</h4>
                </div>
                <div class="card-body">
                    <div id="mapholder" data-height="400"></div>
                    <input type="text" id="latitude" hidden>
                    <input type="text" id="longitude" hidden>
                </div>
              </div>

            </div>
          </div>

@endsection
@section('script')
<script>
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

// let map;

// function initMap() {
//   map = new google.maps.Map(document.getElementById("mapholder"), {
//     center: { lat: -34.397, lng: 150.644 },
//     zoom: 8
//   });
// }





var latitude = parseFloat("");
var longitude = parseFloat("");
function initMap() {
    // initial map setting
    map = new google.maps.Map(document.getElementById('mapholder'), {
        zoom: 16,
        styles:[
    {
        "featureType": "water",
        "stylers": [
            {
                "color": "#19a0d8"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "weight": 6
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#e85113"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#efe9e4"
            },
            {
                "lightness": -40
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#efe9e4"
            },
            {
                "lightness": -20
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "lightness": 100
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "lightness": -100
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.icon"
    },
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "stylers": [
            {
                "lightness": 20
            },
            {
                "color": "#efe9e4"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "lightness": 100
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "lightness": -100
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "hue": "#11ff00"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "lightness": 100
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.icon",
        "stylers": [
            {
                "hue": "#4cff00"
            },
            {
                "saturation": 58
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#f0e4d3"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#efe9e4"
            },
            {
                "lightness": -25
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#efe9e4"
            },
            {
                "lightness": -10
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    }
]
    });
    map.setCenter({lat: latitude, lng: longitude});


        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function geolocationSuccess(position) {
                latitude=position.coords.latitude;
                longitude=position.coords.longitude;
                map.setCenter({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                });
            }, function () {
                document.getElementById('error').innerHTML = 'Browser doesn\'t support geolocation';
                toastr.error("Browser doesn't support geolocation", "Error!");
            });
        }
}
</script>
@endsection

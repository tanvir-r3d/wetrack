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
                    <h4>{{ __('customLanguage.Total Company')}}</h4>
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
                    <h4>{{ __('customLanguage.Branch')}}</h4>
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
                    <h4>{{ __('customLanguage.Employee')}}</h4>
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
                    <h4>{{ __('customLanguage.Tracking')}}</h4>
                </div>
                <div class="card-body">
                    @php $status_count=collect($employee)->where('emp_status','==','on')->count(); @endphp
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
                <h4>{{ __('customLanguage.Infield Percentage')}}</h4>
            </div>
            <div class="card-body">

                <canvas id="pieChart"></canvas>

            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('customLanguage.Your Location')}}</h4>
            </div>
            <div class="card-body">
                <div id="mapholder" data-height="400"></div>
                <input type="text" id="latitude" hidden>
                <input type="text" id="longitude" hidden>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('customLanguage.Infield Days')}}</h4>
            </div>
            <div class="card-body">

                <canvas id="lineChart"></canvas>

            </div>
        </div>
    </div>
    @can('track employee')
    @include('admin.Dashboard.infield_list')
    @endcan
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
    crossorigin="anonymous"></script>
<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDXkzEIj9sB3J_ohqT0woVWqAJQiyRmAE&libraries=places&callback=initMap">
</script>
<script>
    let empPer = (parseInt({{$status_count}}) * 100) / parseInt({{$employee_count}});
    let infieldPer = (100 - empPer);
    let data = [(empPer / 2),(infieldPer / 2),];

    let ctx = document.getElementById('pieChart');
    let myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                'In-field Employee',
                'Employee',
            ],
            datasets: [{
                data: data,
                borderColor: ['rgba(252, 84, 75, 1)', 'rgba(103, 119, 239, 1)'],
                backgroundColor: ['rgba(252, 84, 75, 0.2)', 'rgba(103, 119, 239, 0.2)'],
            }]
        },
        options: {
            title: {
                display: true,
            }
        },
    });
    let mix = document.getElementById('lineChart');

    @php $employees = collect($employee)->where('emp_status', 'on')->sortByDesc('infield')->take(7);
    @endphp

    let labels = [
        @foreach($employees as $emp)
        `{{$emp->emp_full_name}}`,
        @endforeach
    ];
    let employees = [
        @foreach($employees as $emp)
        {{$emp->infield}},
        @endforeach
    ];
    let mixChart = new Chart(mix, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: "In-field",
                data: employees,
                borderColor: 'rgba(103, 119, 239, 1)',
                backgroundColor: 'rgba(103, 119, 239, 0.5)',
                yAxisID: 'Employees',
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    id: "Employees",
                    ticks: {
                        beginAtZero: true,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'In-field(Day)'
                    }
                }, ]
            },
        }
    });

</script>

<script>
    $(document).on("click", "#delete", function () {
        let id = $(this).attr("data-id");
        iziToast.question({
            timeout: 20000,
            close: true,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Wait!',
            message: 'Are you sure? You Want to inactive employee tracking!',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function () {
                    $.ajax({
                        url: "/employee_status/change",
                        type: "get",
                        data: {
                            'status': 0,
                            'id': id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function (data) {
                            if (data.status == 200) {
                                iziToast.success({
                                    title: "Employee",
                                    message: "Status Changed Successfully",
                                    position: 'topRight',
                                });
                                location.reload();
                            }
                        }
                    });
                }, true],
                ['<button>NO</button>', function (instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }],
            ],
        });
    });


    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/employee_status/",
        "columns": [{
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
                orderable: false,
            },
            {
                data: 'tracking',
            },
        ],
    });


    let latitude = parseFloat("");
    let longitude = parseFloat("");

    function initMap() {
        // initial map setting
        map = new google.maps.Map(document.getElementById('mapholder'), {
            zoom: 16,
            styles: [{
                    "featureType": "water",
                    "stylers": [{
                        "color": "#19a0d8"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
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
                    "stylers": [{
                        "color": "#e85113"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
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
                    "stylers": [{
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
                    "stylers": [{
                        "lightness": 100
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "lightness": -100
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.icon"
                },
                {
                    "featureType": "landscape",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "landscape",
                    "stylers": [{
                            "lightness": 20
                        },
                        {
                            "color": "#efe9e4"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "lightness": 100
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "lightness": -100
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "hue": "#11ff00"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "lightness": 100
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.icon",
                    "stylers": [{
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
                    "stylers": [{
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
                    "stylers": [{
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
                    "stylers": [{
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
                    "stylers": [{
                        "visibility": "simplified"
                    }]
                }
            ]
        });

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function geolocationSuccess(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
                map.setCenter({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                });
            }, function () {
                document.getElementById('error').innerHTML = 'Browser doesn\'t support geolocation';
                toastr.error("Browser doesn't support geolocation", "Error!");
            });
        }

        map.setCenter({
            lat: latitude,
            lng: longitude
        });
    }

</script>
@endsection

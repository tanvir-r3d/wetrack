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
                              <th>Company Name</th>
                              <th>Branch Name</th>
                              <th>Employee Name</th>
                              <th>Employee Phone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
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
                    <div id="map" data-height="400"></div>
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
</script>
@endsection

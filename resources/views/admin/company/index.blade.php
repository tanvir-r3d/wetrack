@extends('layouts.app')
@section('page_name') Company @endsection
@section('section_header') Company @endsection
@section('breadcrumb')
<div class="breadcrumb-item"><a href="/">Home</a></div>
<div class="breadcrumb-item"><a href="/company">Company</a></div>
<div class="breadcrumb-item active">Company List</div>
@endsection
@section('content')

            <h2 class="section-title">DataTables</h2>
            <p class="section-lead">
              We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Advanced Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      
                      <table id="dataTable" class="display dataTable table table-striped" style="width:100%">
                      <thead>
                      <tr>
                      <th>Logo</th>
                      <th>Name</th>
                      <th>Details</th>
                      <th>Action</th>
                      </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                      <tr>
                      <th>Logo</th>
                      <th>Name</th>
                      <th>Details</th>
                      <th>Action</th>
                      </tr>
                      </tfoot>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
@section('script')
<script>
$(document).ready(function() {
    var i = 1;
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax:"{{route('company.index')}}",
        "columns":[
            {
              data: 'com_logo',
              name: 'com_logo',
              orderable:false,
            },
            {
              data: 'com_name',
              },
            {
              data: 'com_details',
              },
            {
              data: 'action',
              },
        ],
    } );
} );
</script>
@endsection
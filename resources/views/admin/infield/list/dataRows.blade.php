<table class="table dataTable table-striped table-bordered zero-configuration" >
    <thead>
        <tr>
            <th class="text-center" style="width: 1%;">Sl</th>
            <th class="text-center">Full Name</th>
            <th class="text-center">User Name</th>
            <th class="text-center">Status</th>
            <th style="width: 15%;" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp 
        @foreach($statuss as $status)
        @php $emp=collect($employees)->where('emp_id',$status->emp_id)->first(); @endphp
      <tr>
        <td>{{$i++}}</td>
        
        <td>{{$emp->emp_full_name}}</td>
        <td>{{$emp->emp_username}}</td>
        <td>
        @if($status->emp_status=='active')
        <button type="button" class="btn mr-1 mb-1 btn-success btn-sm" id="status_btn" data-id="{{$status->emp_id}}" data-set="active"><i class="fa fa-check"></i>Active</button>
        @elseif($status->emp_status=='inactive')
        <button type="button" class="btn mr-1 mb-1 btn-danger btn-sm" id="status_btn" data-id="{{$status->emp_id}}" data-set="inactive"><i class="fa fa-times"></i>Inactive</button>
        @else
        <button type="button" class="btn mr-1 mb-1 btn-warning btn-sm" id="status_btn" data-id="{{$status->emp_id}}" data-set="unknown"><i class="fa fa-warning"></i>Not Set</button>
        @endif
        </td>

        <td>
          <div class="btn-group mx-2" role="group" aria-label="Second Group">
              <button type="button" data-toggle="modal" data-target="#viewModal" class="btn btn-icon btn-outline-info view"><i class="fa fa-map-marker"></i></button>
          </div>
        </td>
      </tr>
  @endforeach
    </tbody>

   </table>

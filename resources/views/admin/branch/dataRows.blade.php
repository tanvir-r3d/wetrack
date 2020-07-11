<table class="table dataTable table-striped table-bordered zero-configuration" >
    <thead>
        <tr>
            <th class="text-center" style="width: 20px;">Sl</th>
            <th class="text-center">Name</th>
            <th class="text-center">Location</th>
            <th class="text-center">Details</th>
            <th style="width: 20px;" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp @foreach($branches as $branch)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$branch->branch_name}}</td>
            <td>{{$branch->branch_location}}</td>
            <td>{{$branch->branch_details}}</td>
            <td>
                <div class="btn-group mx-2" role="group" aria-label="Second Group">
                    <button type="button" get_id="{{$branch->branch_id}}" data-toggle="modal" data-target="#viewModal" class="btn btn-icon btn-outline-info view"><i class="fa fa-eye"></i></button>
                    <button type="button" get_id="{{$branch->branch_id}}" data-toggle="modal" data-target="#editModal" class="btn btn-icon btn-outline-secondary edit"><i class="fa fa-pencil"></i></button>
                    <button type="button" get_id="{{$branch->branch_id}}" id="delete" class="btn btn-icon btn-outline-warning"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

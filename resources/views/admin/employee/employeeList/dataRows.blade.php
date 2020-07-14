<table class="table dataTable table-striped table-bordered zero-configuration" >
    <thead>
        <tr>
            <th class="text-center" style="width: 20px;">Sl</th>
            <th class="text-center">Name</th>
            <th class="text-center">Category</th>
            <th class="text-center">Branch</th>
            <th class="text-center">Image</th>
            <th class="text-center">Status</th>


            <th style="width: 20px;" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp @foreach(employees as employe)
        <tr>
            <td>{{$i++}}</td>
            <td>{{employe->emp_full_name}}</td>
            <td>{{employe->emp_branch_id}}</td>
            <td>{{employe->emp_cat_id}}</td>


            <td>
                <div class="btn-group mx-2" role="group" aria-label="Second Group">
                    <button type="button" get_id="{{employe->branch_id}}" data-toggle="modal" data-target="#viewModal" class="btn btn-icon btn-outline-info view"><i class="fa fa-eye"></i></button>
                    <button type="button" get_id="{{employe->branch_id}}" data-toggle="modal" data-target="#editModal" class="btn btn-icon btn-outline-secondary edit"><i class="fa fa-pencil"></i></button>
                    <button type="button" get_id="{{employe->branch_id}}" id="delete" class="btn btn-icon btn-outline-warning"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

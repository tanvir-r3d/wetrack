
                        <div class="card card">
                            <div class="text-center">
                                <div class="card-body">
                                @php $emp_img=collect($images)->where('emp_id',$employee->emp_id)->first(); @endphp
                                  @if($emp_img)
                                    <img src="{{'/images/employee/'.$emp_img->emp_img}}" class="rounded-circle  height-150" alt="Card image">
                                  @else
                                    <img src="{{asset('app-assets/images/avatar.png')}}" class="rounded-circle  height-150" alt="Card image">
                                  @endif
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{$employee->emp_full_name}}</h4>
                                    <h6 class="card-subtitle text-muted">@php $category=collect($categorys)->where('emp_cat_id',$employee->emp_cat_id)->first(); @endphp {{$category->emp_cat_name}}</h6>
                                </div>
                                <div class="card-body">
                                    <button type="button" get_id="{{$employee->emp_id}}" id="delete" class="btn btn-danger mr-1"  data-dismiss="modal"><i class="fa fa-trash"></i> Delete</button>
                                    <button type="button" get_id="{{$employee->emp_id}}" data-toggle="modal" data-target="#editModal" class="btn btn-primary mr-1 edit" data-dismiss="modal"><i class="fa fa-pencil-square"></i>Edit</button>
                                   
                                    @php $emp_status=collect($status)->where('emp_id',$employee->emp_id)->first();@endphp
                                    @if($emp_status->emp_status=='active')
                                    <button type="button" class="btn mr-1 btn-success" id="status_btn" data-id="{{$employee->emp_id}}" data-set="active" data-dismiss="modal"><i class="fa fa-check"></i>Active</button>
                                    @elseif($emp_status->emp_status=='inactive')
                                    <button type="button" class="btn mr-1 btn-danger" id="status_btn" data-id="{{$employee->emp_id}}" data-set="inactive" data-dismiss="modal"><i class="fa fa-times"></i>Inactive</button>
                                    @else
                                    <button type="button" class="btn mr-1 btn-warning" id="status_btn" data-id="{{$employee->emp_id}}" data-set="unknown" data-dismiss="modal"><i class="fa fa-warning"></i>Not Set</button>
                                    @endif
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                            @php $branch=collect($branchs)->where('branch_id',$employee->emp_branch_id)->first(); @endphp
                                <p class="list-group-item"><i class="fa fa-briefcase"></i> Branch: {{$branch->branch_name}}</p>
                                <p class="list-group-item"><i class="fa fa-briefcase"></i> Username: {{$employee->emp_username}}</p>
                                <p class="list-group-item"><i class="fa fa-briefcase"></i> Email: {{$employee->emp_email}}</p>
                                <p class="list-group-item"><i class="feather icon-mail"></i> Phone: {{$employee->emp_phone}}</p>
                                <p class="list-group-item"><i class="feather icon-check-square"></i> Adress: {{$employee->emp_address}}</p>
                                <p class="list-group-item"> <i class="feather icon-message-square"></i> Gender: {{$employee->emp_gender==1 ? 'Male' : 'Female'}}</p>
                                <p class="list-group-item"> <i class="feather icon-message-square"></i> Salery: {{$employee->emp_salery}}</p>
                            </div>
                        </div>
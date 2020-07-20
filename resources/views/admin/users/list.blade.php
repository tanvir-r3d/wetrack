<div class="table-responsive">
    <table id="users-list-datatable" class="table">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
        @foreach($users as $user)
            <tr>
                <td>{{$i++}}</td>
                <td>
                @php $image=collect($images)->where('user_id',$user->id)->first() @endphp
                @if($image)
                <img src="{{'/images/user/'.$image->user_img}}" class="rounded mr-75" alt="user image" height="64" width="64">
                @else
                <img src="{{asset('app-assets/images/avatar.png')}}" class="rounded mr-75" alt="user image" height="64" width="64">
                @endif
                </td>
                <td>{{$user->user_first_name}} {{$user->user_last_name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td><button id="geo"><i class="feather icon-map-pin"></i></button>
                <a href="#"><i class="feather icon-edit-1"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
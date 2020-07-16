<form method="post" id="editForm">
@csrf
    <div class="modal-body">
    <div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label for="edit_branch_id">Select Branch</label>
                <select class="form-control" id="edit_branch_id" name="branch_id">
                    @foreach($branchs as $branch)
                <option value="{{ $branch->branch_id}}" {{$branch->branch_id==$employee->emp_branch_id ? 'selected' : ''}}>{{ $branch->branch_name}}</option>
                @endforeach
                </select>
                </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="edit_cat_id">Select Category</label>
                <select class="form-control" id="edit_cat_id" name="cat_id">
                    @foreach($categorys as $category)
                    <option value="{{ $category->emp_cat_id}}" {{$category->emp_cat_id==$employee->emp_cat_id ? 'selected' : ''}}>{{ $category->emp_cat_name}}</option>
                    @endforeach
                </select>
                </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">

            <fieldset class="form-group floating-label-form-group">
                <label for="edit_name">Full Name</label>
                <input type="text" class="form-control" id="edit_name" name="full_name" value="{{$employee->emp_full_name}}">
            </fieldset>
        </div>

        <div class="col-md-6">
            <div id="div_id_gender" class="form-group required">
                <label for="id_gender"  class="control-label col-md-4  requiredField">Gender<span class="asteriskField"></span> </label>
                <div class="controls col-md-8 "  style="margin-bottom: 10px">
                    <label class="radio-inline"> <input type="radio" name="gender" id="gender_1" value="1"  style="margin-bottom: 10px" {{$employee->emp_gender==1 ? 'checked' : ''}}>Male</label>
                    <label class="radio-inline"> <input type="radio" name="gender" id="gender_2" value="2"  style="margin-bottom: 10px" {{$employee->emp_gender==2 ? 'checked' : ''}}>Female </label>
                </div>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-6">
            <fieldset class="form-group floating-label-form-group">
                <label for="edit_salery">Salary</label>
                <input type="text" class="form-control" id="edit_salery" name="salery" value="{{$employee->emp_salery}}">
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset class="form-group floating-label-form-group">
                <label for="edit_phone">Phone</label>
                <input type="text" class="form-control" id="edit_phone" name="phone" value="{{$employee->emp_phone}}" required data-validation-required-message="This field is required">
            </fieldset>
        </div>
        </div>

        <div class="row">
        <div class="col-md-6">
            <fieldset class="form-group floating-label-form-group">
                <label for="edit_user_name">User Name</label>
                <input type="text" class="form-control" id="edit_user_name" name="user_name" value="{{$employee->emp_username}}" required data-validation-required-message="This field is required">
            </fieldset>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="edit_email">Email address</label>
                <input type="email" class="form-control" id="edit_email" name="email" value="{{$employee->emp_email}}" required data-validation-required-message="This field is required">
            </div>
        </div>
        </div>
        
        <div class="row">
        <div class="col-md-6">
            <fieldset class="form-group floating-label-form-group">
                <label for="edit_address">Address</label>
                <textarea class="form-control" id="edit_address" rows="3" name="address">{{$employee->emp_address}}</textarea>
            </fieldset>
        </div>

        <div class="col-md-6">
            <fieldset class="form-group floating-label-form-group">
            @php $emp_img=collect($images)->where('emp_id',$employee->emp_id)->first(); @endphp
                <img id='previmage' src="{{$emp_img ? '/images/employee/'.$emp_img->emp_img : asset('app-assets/images/avatar.png') }}" class="rounded-circle  height-150 edit_img" alt="Employee image">
                <input onchange="readURL(this);" type="file" class="image" name="image" id="image" >
            </fieldset>
        </div>
        </div>


        <input type="hidden" id="edit_id" name="id" value={{$employee->emp_id}}>
    </div>
    <div class="modal-footer">
        <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
        <input type="submit" class="btn btn-outline-primary" value="Update">
    </div>
</form>
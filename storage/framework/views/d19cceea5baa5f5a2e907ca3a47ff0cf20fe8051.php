<?php $__env->startSection('page_name'); ?> Employee Category Data <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="/">Home</a>
</li>
<li class="breadcrumb-item active">Employee Category
</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Employee Category Table</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><button class="btn btn-secondary" data-toggle="modal" data-target="#addModal"><i class="feather icon-plus-circle"> Add</i></button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard" id="dataRow">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

<!-- ADD MODAL -->
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">Add EmployeeCategory</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="addForm">
            <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter EmployeeCategory Name" required data-validation-required-message="This field is required">
                    </fieldset>
                    <br>

                    <fieldset class="form-group floating-label-form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="details" rows="3" name="details" placeholder="Enter EmployeeCategory details" ></textarea>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-outline-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- VIEW MODAL -->
<div class="modal fade text-left" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel20">EmployeeCategory View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="viewBody"></div>

            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">Edit EmployeeCategory</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editForm">
            <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" placeholder="Enter EmployeeCategory Name" required data-validation-required-message="This field is required">
                    </fieldset>
                    <br>

                    <fieldset class="form-group floating-label-form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="edit_details" rows="3" name="details" placeholder="Enter EmployeeCategory details" ></textarea>
                    </fieldset>
                    <input type="hidden" id="edit_id" name="id">
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-outline-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$(document).ready(function(){
    dataList();

   $("#addForm").submit(function(e){
    e.preventDefault();
    var data=$(this).serializeArray();
    $.ajax({
        url:"<?php echo e(route('employeeCategorys.store')); ?>",
        data:data,
        dataType:'json',
        type:'post',
        success:function(data)
        {
            $("#addModal").modal('hide');
            $("#addForm").trigger( "reset" );
            dataList();
            toastr["success"](data.message);
        }
    });

   });

   $(document).on('click','.view',function(){
    var id=$(this).attr("get_id");
    $.ajax({
        url:"<?php echo e(route('employeeCategorys.show')); ?>",
        data:{'id':id},
        dataType:'html',
        type:'get',
        success:function(data)
        {
            $("#viewBody").html(data);
        }
    });
   });

   $(document).on('click','#delete',function(){
    var id=$(this).attr("get_id");
    $.ajax({
        url:"<?php echo e(route('employeeCategorys.destroy')); ?>",
        data:{'id':id, "_token": "<?php echo e(csrf_token()); ?>"},
        dataType:'json',
        type:'delete',
        success:function(data)
        {
            dataList();
            toastr["success"](data.message);
        }
    });
   });

   $(document).on("click",".edit",function(){
    var id=$(this).attr("get_id");
    $("#edit_id").val(id);
    $.ajax({
        url:"<?php echo e(url('employeeCategorys_edit')); ?>",
        type:"get",
        data:{id:id},
        dataType:"json",
        success:function(data)
        {
            $("#edit_name").val(data.emp_cat_name);

            $("#edit_details").val(data.emp_cat_detils);
        }
    });
   });

   $(document).on('submit','#editForm',function(e){
    e.preventDefault();
    var data=$(this).serializeArray();
    $.ajax({
        url:"<?php echo e(route('employeeCategorys.update')); ?>",
        data:data,
        type:"post",
        dataType:"json",
        success:function(data)
        {
            $("#editModal").modal('hide');
            dataList();
            toastr["success"](data.message);
        }
    });

   });

});

function dataList(){
    $.ajax({
        url:"<?php echo e(route('employeeCategorys.create')); ?>",
        dataType:'html',
        type:'get',
        success:function(data)
        {
            $("#dataRow").html(data);
        }
    });
};
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/admin/employee/employeeCategory/index.blade.php ENDPATH**/ ?>
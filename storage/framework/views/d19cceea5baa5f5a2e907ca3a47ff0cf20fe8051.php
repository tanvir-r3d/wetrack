<?php $__env->startSection('page_name'); ?> Employee Category <?php $__env->stopSection(); ?>
<?php $__env->startSection('section_header'); ?> Employee Category <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Employee Category</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h2 class="section-title">Employee Category List</h2>
<p class="section-lead">
	<button class="btn btn-primary mr-l" data-toggle="modal" data-target="#addModal">Add Employee Category</button>
</p>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4>Employee Category Table</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="display dataTable table table-striped" style="width:100%">
						<thead>
							<tr>

								<th class="text-center">Name</th>
								<th class="text-center">Details</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
							<tr>

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
</div>
</div>
<!-- ADD MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Employee Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form action="<?php echo e(route('employeeCategorys.store')); ?>" method="post" id="addForm">
      <?php echo csrf_field(); ?>
			<div class="modal-body">


      <div class="form-group">
        <label>Employee Category Name:</label>
          <input type="text"class="form-control" name="name" id="location" >
      </div>

      <div class="form-group">
        <label>Employee Category Details:</label>
        <textarea class="form-control" name="details" cols="30" rows="10"></textarea>
      </div>
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-primary">Save</button>
        </form>
			</div>
		</div>
	</div>
</div>

<!-- Edit MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Employee Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
      <form method="post" id="editForm" >
      <?php echo csrf_field(); ?>
	<div class="modal-body">
      <div class="form-group">


      <div class="form-group">
        <label>Employee Category Name:</label>
        <input type="text" class="form-control" name="name" id="e_name">
      </div>

      <div class="form-group">
        <label>Employee Category Details:</label>
        <textarea class="form-control" name="details" id="e_details" cols="30" rows="10"></textarea>
      </div>
			</div>
			<input type="hidden" id="edit_id" name="id">
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-primary">Save Changes</button>
        </form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
	$(document).ready(function() {
	    $('#dataTable').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax:"<?php echo e(route('employeeCategorys.index')); ?>",
	        "columns":[

	            {
	              data: 'emp_cat_name',
	              },
                {
  	              data: 'emp_cat_detils',
  	              },

	            {
	              data: 'action',
	              name: 'action',
				  orderable:false,
	              },
	        ],
	    });

	$(document).on("click","#delete",function(){
		var id=$(this).attr("data-id");
		$.ajax({
			url:"/employeeCategorys/delete/"+id,
			type:"get",
			dataType:"json",
			success:function(data)
			{
				location.reload();
			}
		});
	});

	$(document).on("click","#edit",function(){
		var id=$(this).attr("data-id");
		var __this=$(this);
		$.ajax({
			url:"<?php echo e(route('employeeCategorys_edit')); ?>",
			data:{'id':id,"_token": "<?php echo e(csrf_token()); ?>"},
			type:"get",
			dataType:"json",
			success:function(data)
			{
				console.log(data);
				$("#e_name").val(data.emp_cat_name);
				$("#e_details").val(data.emp_cat_detils);
				$("#editForm").attr("action","/employeeCategorys/update/"+data.emp_cat_id);

			}
		});
	});

});


</script>
<?php echo $validator->selector('#addForm'); ?>

<?php echo $validator->selector('#editForm'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/admin/employee/employeeCategory/index.blade.php ENDPATH**/ ?>
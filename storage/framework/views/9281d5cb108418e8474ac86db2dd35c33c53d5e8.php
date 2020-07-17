
                        <div class="card card">
                            <div class="text-center">
                                <div class="card-body">
                                <?php $emp_img=collect($images)->where('emp_id',$employee->emp_id)->first(); ?>
                                  <?php if($emp_img): ?>
                                    <img src="<?php echo e('/images/employee/'.$emp_img->emp_img); ?>" class="rounded-circle  height-150" alt="Card image">
                                  <?php else: ?>
                                    <img src="<?php echo e(asset('app-assets/images/avatar.png')); ?>" class="rounded-circle  height-150" alt="Card image">
                                  <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo e($employee->emp_full_name); ?></h4>
                                    <h6 class="card-subtitle text-muted"><?php $category=collect($categorys)->where('emp_cat_id',$employee->emp_cat_id)->first(); ?> <?php echo e($category->emp_cat_name); ?></h6>
                                </div>
                                <div class="card-body">
                                    <button type="button" get_id="<?php echo e($employee->emp_id); ?>" id="delete" class="btn btn-danger mr-1"  data-dismiss="modal"><i class="fa fa-trash"></i> Delete</button>
                                    <button type="button" get_id="<?php echo e($employee->emp_id); ?>" data-toggle="modal" data-target="#editModal" class="btn btn-primary mr-1 edit" data-dismiss="modal"><i class="fa fa-pencil-square"></i>Edit</button>
                                   
                                    <?php $emp_status=collect($status)->where('emp_id',$employee->emp_id)->first();?>
                                    <?php if($emp_status->emp_status=='active'): ?>
                                    <button type="button" class="btn mr-1 btn-success" id="status_btn" data-id="<?php echo e($employee->emp_id); ?>" data-set="active" data-dismiss="modal"><i class="fa fa-check"></i>Active</button>
                                    <?php elseif($emp_status->emp_status=='inactive'): ?>
                                    <button type="button" class="btn mr-1 btn-danger" id="status_btn" data-id="<?php echo e($employee->emp_id); ?>" data-set="inactive" data-dismiss="modal"><i class="fa fa-times"></i>Inactive</button>
                                    <?php else: ?>
                                    <button type="button" class="btn mr-1 btn-warning" id="status_btn" data-id="<?php echo e($employee->emp_id); ?>" data-set="unknown" data-dismiss="modal"><i class="fa fa-warning"></i>Not Set</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                            <?php $branch=collect($branchs)->where('branch_id',$employee->emp_branch_id)->first(); ?>
                                <p class="list-group-item"><i class="fa fa-briefcase"></i> Branch: <?php echo e($branch->branch_name); ?></p>
                                <p class="list-group-item"><i class="fa fa-briefcase"></i> Username: <?php echo e($employee->emp_username); ?></p>
                                <p class="list-group-item"><i class="fa fa-briefcase"></i> Email: <?php echo e($employee->emp_email); ?></p>
                                <p class="list-group-item"><i class="feather icon-mail"></i> Phone: <?php echo e($employee->emp_phone); ?></p>
                                <p class="list-group-item"><i class="feather icon-check-square"></i> Adress: <?php echo e($employee->emp_address); ?></p>
                                <p class="list-group-item"> <i class="feather icon-message-square"></i> Gender: <?php echo e($employee->emp_gender==1 ? 'Male' : 'Female'); ?></p>
                                <p class="list-group-item"> <i class="feather icon-message-square"></i> Salery: <?php echo e($employee->emp_salery); ?></p>
                            </div>
                        </div><?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/admin/employee/employeeList/viewBody.blade.php ENDPATH**/ ?>
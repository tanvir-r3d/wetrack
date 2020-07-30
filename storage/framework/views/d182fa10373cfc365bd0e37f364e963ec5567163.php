<?php $__env->startSection('page_name'); ?> Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('section_header'); ?> Dashboard <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Main Content -->
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Company</h4>
                  </div>
                  <div class="card-body">
                    <?php $company_count=collect($company)->count(); ?>
                    <?php echo e($company_count); ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Branch</h4>
                  </div>
                  <div class="card-body">
                    <?php $branch_count=collect($branch)->count(); ?>
                    <?php echo e($branch_count); ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Employee</h4>
                  </div>
                  <div class="card-body">
                    <?php $employee_count=collect($employee)->count(); ?>
                    <?php echo e($employee_count); ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tracking</h4>
                  </div>
                  <div class="card-body">
                    <?php $status_count=collect($employee)->whereNotNull('emp_status')->count(); ?>
                    <?php echo e($status_count); ?>

                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Infield Employee Updates</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="dataTable table table-striped mb-0">
                          <thead>
                            <tr>
                              <th>Company Name</th>
                              <th>Branch Name</th>
                              <th>Employee Name</th>
                              <th>Employee Phone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Your Location</h4>
                </div>
                <div class="card-body">
                    <div id="map" data-height="400"></div>
                    <input type="text" id="latitude" hidden>
                    <input type="text" id="longitude" hidden>
                </div>
              </div>

            </div>
          </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
 $('#dataTable').DataTable({
          processing: true,
          serverSide: true,
          ajax:"/employee_status/",
          "columns":[
              {
                data: 'com_name',
                },
              {
                data: 'branch_name',
                },
              {
                data: 'emp_full_name',
                },
              {
                data: 'emp_phone',
                },
              {
                data: 'action',
                name: 'action',
          orderable:false,
                },
                {
                    data:'tracking',
                },
          ],
      });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>
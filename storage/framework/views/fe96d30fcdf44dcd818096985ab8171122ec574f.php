 
<?php $__env->startSection('page_name'); ?> Profile <?php $__env->stopSection(); ?> 
<?php $__env->startSection('section_header'); ?> Profile <?php $__env->stopSection(); ?> 
<?php $__env->startSection('breadcrumb'); ?>
<div class="breadcrumb-item"><a href="/">Home</a>
</div>
<div class="breadcrumb-item active">Profile</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
            <div class="card">
               <div class="card-content">
                  
                     <div class="card-body">
                    <ul class="nav nav-tabs">

                      <li class="nav-item">
                        <a class="nav-link active" id="account-pill-profile" data-toggle="pill" href="#profile-view" aria-expanded="true">Profile</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="false">General</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">Password</a>
                      </li>
                      
                    </ul>
                  </div>
                  <div class="card-body">
                     <div class="tab-content">
                       
                        

                        <div role="tabpanel" class="tab-pane active" id="profile-view" aria-labelledby="account-pill-profile" aria-expanded="true">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" height="100" src="<?php echo e(Auth::user()->user_img ? '/images/user/'.Auth::user()->user_img : '/avatar.png'); ?>" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Role</div>
                        <div class="profile-widget-item-value">Admin</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Category</div>
                        <div class="profile-widget-item-value">Admin</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?php echo e(Auth::user()->user_first_name ? Auth::user()->user_first_name : 'Your'); ?> <?php echo e(Auth::user()->user_last_name ? Auth::user()->user_last_name : 'Name'); ?><div class="text-muted d-inline font-weight-normal"><div class="slash"></div><?php echo e(Auth::user()->username); ?></div></div>
                    <div class="section-title">General Info</div>
                     <p><b>Email:</b>&nbsp <?php echo e(Auth::user()->email); ?></small></p>
                     <p><b>Gender:</b>&nbsp <?php if(Auth::user()->user_gender==1): ?> Male <?php elseif(Auth::user()->user_gender==2): ?> Female <?php else: ?> Null <?php endif; ?></p>
                     <p><b>Contact:</b>&nbsp <?php echo e(Auth::user()->user_contact ? Auth::user()->user_contact : 'Null'); ?></p>
                  </div>
     
                </div>
              </div>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="false">
                           <form method="post" action="<?php echo e(url('profile/update')); ?>" id="generalForm" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <div class="media">
                                 <a href="javascript: void(0);">
                                 <?php if(Auth::user()->user_img): ?>
                                 <img src="<?php echo e('/images/user/'.Auth::user()->user_img); ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                 <?php else: ?>
                                 <img src="avatar.png" class="rounded mr-75" alt="profile image" height="64" width="64">
                                 <?php endif; ?>
                                 </a>
                                 <div class="media-body mt-75 ml-2">
                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                       <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="image">Upload new photo</label>
                                       <input type="file" id="image" class="image" name="image" hidden>
                                    </div>
                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG or PNG. Max size of 2048kB</small></p>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="username">Username</label>
                                          <input type="text" class="form-control username" id="username" name="username" placeholder="Username" value="<?php echo e(Auth::user()->username); ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-name">First Name</label>
                                          <input type="text" class="form-control first_name" id="first_name" name="first_name" placeholder="First Name" value="<?php echo e(Auth::user()->user_first_name); ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-name">Last Name</label>
                                          <input type="text" class="form-control last_name" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo e(Auth::user()->user_last_name); ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-name">Contact</label>
                                          <input type="text" class="form-control" id="contact" name="contact" placeholder="Ex: +88012345678" value="<?php echo e(Auth::user()->user_contact); ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-name">Gender</label>
                                          <div class="input-group">
                                             <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" name="gender" class="custom-control-input gender" id="male" value="1" <?php if(Auth::user()->user_gender==1): ?> <?php echo e('checked'); ?> <?php endif; ?>>
                                                <label class="custom-control-label" for="male">Male</label>
                                             </div>
                                             <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" name="gender" class="custom-control-input gender" id="female" value="2" <?php if(Auth::user()->user_gender==2): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                <label class="custom-control-label" for="female">Female</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-e-mail">E-mail</label>
                                          <input type="email" class="form-control emali" name="email" id="account-e-mail" placeholder="Email" value="<?php echo e(Auth::user()->email); ?>" required data-validation-required-message="This email field is required">
                                       </div>
                                    </div>
                                 </div>
                                 <?php if(Auth::user()->email_verified_at==NULL): ?>
                                 <div class="col-12">
                                    <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                       </button>
                                       <p class="mb-0">
                                          Your email is not confirmed. Please check your inbox.
                                       </p>
                                       <a href="javascript: void(0);">Resend confirmation</a>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                                 <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-success mr-sm-1 mb-1 mb-sm-0">Save
                                    changes</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>

                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                           <form id="passForm" method="POST" action="/profile/changepass">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="old_pass">Current Password</label>
                                          <input type="password" class="form-control old_pass" id="old_pass" name="old_pass" placeholder="Current Password">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="new_pass">New Password</label>
                                          <input type="password" name="new_pass" id="new_pass" class="form-control new_pass" placeholder="New Password">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="retype_pass">Retype New Password</label>
                                          <input type="password" name="retype_pass" class="form-control retype_pass" id="retype_pass" placeholder="Retype Password">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Change Password</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $generalValidator->selector('#generalForm'); ?> 
<?php echo $passValidator->selector('#passForm'); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/admin/profile/index.blade.php ENDPATH**/ ?>
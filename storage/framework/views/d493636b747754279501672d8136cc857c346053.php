<?php $__env->startSection('page_name'); ?> Account Settings <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="/profile">Profile</a></li>
<li class="breadcrumb-item active">Account Setting</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-body">
   <!-- account setting page start -->
   <section id="page-account-settings">
      <div class="row">
         <!-- left menu section -->
         <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
               <li class="nav-item">
                  <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                  <i class="feather icon-globe"></i>
                  General
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                  <i class="feather icon-lock"></i>
                  Change Password
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                  <i class="feather icon-info"></i>
                  Info
                  </a>
               </li>
              
            </ul>
         </div>
         <!-- right content section -->
         <div class="col-md-9">
            <div class="card">
               <div class="card-content">
                  <div class="card-body">
                     <div class="tab-content">
                       
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                           <form method="post" action="<?php echo e(route('profile.update',Auth::user()->id)); ?>" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('PATCH'); ?>
                              <div class="media">
                                 <a href="javascript: void(0);">
                                 <img src="<?php echo e(asset('app-assets/images/avatar.png')); ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                 </a>
                                 <div class="media-body mt-75">
                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                       <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                       <input type="file" id="account-upload" class="img" name="img" hidden>
                                       <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                                    </div>
                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG or PNG. Max size of 800kB</small></p>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-username">Username</label>
                                          <input type="text" class="form-control username" id="account-username" name="username" placeholder="Username" value="<?php echo e(Auth::user()->username); ?>" required data-validation-required-message="This username field is required">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-name">First Name</label>
                                          <input type="text" class="form-control first_name" id="account-name" name="first_name" placeholder="First Name" value="<?php echo e(Auth::user()->user_first_name); ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-name">Last Name</label>
                                          <input type="text" class="form-control last_name" id="account-name" name="last_name" placeholder="Last Name" value="<?php echo e(Auth::user()->user_last_name); ?>">
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
                                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                    changes</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>

                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                           <form id="pass" method="POST">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-old-password">Old Password</label>
                                          <input type="password" class="form-control old_pass" id="account-old-password" required placeholder="Old Password" data-validation-required-message="This old password field is required">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-new-password">New Password</label>
                                          <input type="password" name="password" id="account-new-password" class="form-control new_pass" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6" readonly>
                                          <span id="pass_error" style="color:red"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-retype-new-password">Retype New
                                          Password</label>
                                          <input type="password" name="con-password" class="form-control retype_pass" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6" readonly>
                                          <span id="pass_match"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0" id="change_btn" disabled>Change Password</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>

                        <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                           <form novalidate>
                              <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                       <label for="accountTextarea">Bio</label>
                                       <textarea class="form-control" id="accountTextarea" rows="3" placeholder="Your Bio data here..."></textarea>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-birth-date">Birth date</label>
                                          <input type="text" class="form-control birthdate-picker" required placeholder="Birth date" id="account-birth-date" data-validation-required-message="This birthdate field is required">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <label for="accountSelect">Country</label>
                                       <select class="form-control" id="accountSelect">
                                          <option>USA</option>
                                          <option>India</option>
                                          <option>Canada</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <label for="languageselect2">Languages</label>
                                       <select class="form-control" id="languageselect2" multiple="multiple">
                                          <option value="English" selected>English</option>
                                          <option value="Spanish">Spanish</option>
                                          <option value="French">French</option>
                                          <option value="Russian">Russian</option>
                                          <option value="German">German</option>
                                          <option value="Arabic" selected>Arabic</option>
                                          <option value="Sanskrit">Sanskrit</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <div class="controls">
                                          <label for="account-phone">Phone</label>
                                          <input type="text" class="form-control" id="account-phone" required placeholder="Phone number" value="(+656) 254 2568" data-validation-required-message="This phone number field is required">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <label for="account-website">Website</label>
                                       <input type="text" class="form-control" id="account-website" placeholder="Website address">
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <label for="musicselect2">Favourite Music</label>
                                       <select class="form-control" id="musicselect2" multiple="multiple">
                                          <option value="Rock">Rock</option>
                                          <option value="Jazz" selected>Jazz</option>
                                          <option value="Disco">Disco</option>
                                          <option value="Pop">Pop</option>
                                          <option value="Techno">Techno</option>
                                          <option value="Folk" selected>Folk</option>
                                          <option value="Hip hop">Hip hop</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                       <label for="moviesselect2">Favourite movies</label>
                                       <select class="form-control" id="moviesselect2" multiple="multiple">
                                          <option value="The Dark Knight" selected>The Dark Knight
                                          </option>
                                          <option value="Harry Potter" selected>Harry Potter</option>
                                          <option value="Airplane!">Airplane!</option>
                                          <option value="Perl Harbour">Perl Harbour</option>
                                          <option value="Spider Man">Spider Man</option>
                                          <option value="Iron Man" selected>Iron Man</option>
                                          <option value="Avatar">Avatar</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                    changes</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- account setting page end -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
var patt =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g;
   $(document).on("keyup change",".old_pass",function(){
      var old_pass=$(this).val();

      $.ajax({
         url:"<?php echo e(url('/profile/oldpass')); ?>",
         data:{'old_pass':old_pass, "_token": "<?php echo e(csrf_token()); ?>"},
         type:'post',
         success:function(data)
         {
            if(data==0)
            {
               $(".new_pass").attr("readonly", "readonly");
               
            }
            else if(data==1)
            {
               $(".new_pass").removeAttr("readonly");
            }
            else
            {
               $(".new_pass").attr("readonly", "readonly");
            }
         }
      });  

      $(document).on('change keyup',".new_pass",function(){
         var new_pass= $(this).val();
      
         if(!$(this).val().match(patt))
         {
            $("#pass_error").removeAttr("hidden","hidden");
            $("#pass_error").html("<p>Password Must Contain At least one digit [0-9] <br> At least one lowercase character [a-z] <br> At least one uppercase character [A-Z] <br> At least 8 characters in length.</p>");
            $(".retype_pass").attr("readonly", "readonly");
         }
         else if($(this).val().match(patt))
         {
            $("#pass_error").attr("hidden","hidden");
            $(".retype_pass").removeAttr("readonly");
         }
         else
         {
            $("#pass_error").removeAttr("hidden","hidden");
            $("#pass_error").html("<p>Password Must Contain At least one digit [0-9] <br> At least one lowercase character [a-z] <br> At least one uppercase character [A-Z] <br> At least 8 characters in length.</p>");
            $(".retype_pass").attr("readonly", "readonly");
         }
      });     
      
      $(document).on("change keyup",".retype_pass",function(){
         var new_pass=$(".new_pass").val();
         var retype_pass= $(this).val();
            if(new_pass == '' && retype_pass =='' && new_pass != retype_pass)
            {
               $("#pass_match").html("<p style='color:red'><i class='fa fa-times'></i>Not Matched</p>");
               $("#change_btn").attr("disabled","disabled");
            }
            else if(new_pass != '' && retype_pass !='' && new_pass == retype_pass)
            {
               $("#pass_match").html("<p style='color:green'><i class='fa fa-check'></i>Matched</p>");
               $("#change_btn").removeAttr("disabled","disabled");
            }
            else
            {
               $("#pass_match").html("<p style='color:red'><i class='fa fa-times'></i>Not Matched</p>");
               $("#change_btn").attr("disabled","disabled");
            }
      });
   });
   $("#change_btn").click(function(e){
      e.preventDefault();
      var new_pass=$(".new_pass").val();
      var retype_pass=$(".retype_pass").val();
      if(new_pass != '' && retype_pass !='' && new_pass == retype_pass)
      {
         $.ajax({
            url:"<?php echo e(url('/profile/changepass')); ?>",
            type:"post",
            dataType:"json",
            data:{'new_pass':new_pass, 'retype_pass':retype_pass, "_token": "<?php echo e(csrf_token()); ?>"},
            success:function(data)
            {
               $("#pass").trigger( "reset" );
               toastr["success"](data.message);
            }
         });
      }
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/admin/profile/settings.blade.php ENDPATH**/ ?>
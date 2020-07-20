<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
        <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app" />
        <meta name="author" content="PIXINVENT" />
        <title>Login We Track</title>
        <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/ico/apple-icon-120.png')); ?>" />
          <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/ico/favicon.png')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet" />

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/vendors.min.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/icheck/icheck.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/icheck/custom.css')); ?>" />
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap-extended.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/colors.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/components.css')); ?>" />
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/colors/palette-gradient.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/login-register.css')); ?>" />
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>" />
        <!-- END: Custom CSS-->
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="horizontal-layout horizontal-menu 1-column bg-full-screen-image blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row"></div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0">
                                        <div class="card-title text-center">
                                            <img src="<?php echo e(asset('app-assets/images/logo/logo1.png')); ?>" alt="branding logo" />
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>" novalidate>
                                                <?php echo csrf_field(); ?>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input
                                                        id="email"
                                                        type="email"
                                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        placeholder="Enter Email"
                                                        name="email"
                                                        value="<?php echo e(old('email')); ?>"
                                                        required
                                                        autocomplete="email"
                                                        autofocus
                                                    />
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Password" name="password" required autocomplete="current-password" />
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </fieldset>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                        <fieldset>
                                                            <input type="checkbox" class="form-check-input chk-remember" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                            <label for="remember"> Remember Me</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right">
                                                        <?php if(Route::has('password.request')): ?><a class="card-link" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a><?php endif; ?>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-unlock"></i> Login</button>
                                            </form>
                                        </div>
                                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New to Stack ?</span></p>
                                        <div class="card-body">
                                            <a href="/register" class="btn btn-outline-danger btn-block"><i class="feather icon-user"></i> Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- END: Content-->

        <!-- BEGIN: Vendor JS-->
        <script src="<?php echo e(asset('app-assets/vendors/js/vendors.min.js')); ?>"></script>
        <!-- BEGIN Vendor JS-->
        

        <!-- BEGIN: Page Vendor JS-->
        <script src="<?php echo e(asset('app-assets/vendors/js/ui/jquery.sticky.js')); ?>"></script>
        <script src="<?php echo e(asset('app-assets/vendors/js/charts/jquery.sparkline.min.js')); ?>"></script>
        <script src="<?php echo e(asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')); ?>"></script>
        <script src="<?php echo e(asset('app-assets/vendors/js/forms/icheck/icheck.min.js')); ?>"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="<?php echo e(asset('app-assets/js/core/app-menu.js')); ?>"></script>
        <script src="<?php echo e(asset('app-assets/js/core/app.js')); ?>"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <!-- <script src="<?php echo e(asset('app-assets/js/scripts/ui/breadcrumbs-with-stats.js')); ?>"></script> -->
        <script src="<?php echo e(asset('app-assets/js/scripts/forms/form-login-register.js')); ?>"></script>
        <!-- END: Page JS-->
    </body>
    <!-- END: Body-->
</html>
<?php /**PATH /home/tanvir/LARAVEL/weTrack/resources/views/auth/login.blade.php ENDPATH**/ ?>
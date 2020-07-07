<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
        <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app" />
        <meta name="author" content="PIXINVENT" />
        <title>Login with Background Image - Stack Responsive Bootstrap 4 Admin Template</title>
        <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}" />
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet" />

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}" />
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}" />
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/login-register.css')}}" />
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
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
                                    <div class="card-header border-0 pb-0">
                                        <div class="card-title text-center">
                                            <img src="{{asset('app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo" />
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form-horizontal" method="POST" action="{{ route('register') }}" novalidate>
                                                @csrf
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input
                                                        id="username"
                                                        type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="User Name"
                                                        name="username"
                                                        value="{{ old('username') }}"
                                                        required
                                                        autocomplete="username"
                                                        autofocus
                                                    />
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input
                                                        id="email"
                                                        type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email"
                                                        value="{{ old('email') }}"
                                                        required
                                                        autocomplete="email"
                                                        placeholder="Your Email Address"
                                                        required
                                                    />
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="new-password" />
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input id="password-confirm" type="password" class="form-control" placeholder="Re-Type Password" name="password_confirmation" required autocomplete="new-password" />
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                </fieldset>
                                                <button type="submit" class="btn btn-outline-primary btn-block"><i class="feather icon-user"></i> Register</button>
                                            </form>
                                            <a href="/login" class="btn btn-outline-danger btn-block mt-2"><i class="feather icon-unlock"></i> Login</a>
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
        <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
        <script src="{{asset('app-assets/js/core/app.js')}}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{asset('app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
        <script src="{{asset('app-assets/js/scripts/forms/form-login-register.js')}}"></script>
        <!-- END: Page JS-->
    </body>
    <!-- END: Body-->
</html>

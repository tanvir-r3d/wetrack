<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; WeTrack</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/components.css">
</head>

<style>
     body{
        background: url(https://duuro.net/wp-content/uploads/2020/03/GPS-Tracking-and-Fleet-Mgmt-1920x960.jpg);
    };
</style>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">@csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="username">User Name</label>
                      <input type="text" id="username" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your User Name" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email Address">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                    </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password_confirmation" placeholder="Re-Type Password">
                    </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
                <div class="col-3"></div>
                <div class="form-group col-6 mt-2">
                <p>Already Have an account?<a href="/login" style="text-decoration: none;"><i class="feather icon-unlock"></i> Login</a></p>
                </div>
                </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; WeTrack 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



  <script src="/js/jquery.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.nicescroll.min.js"></script>
  <script src="/js/moment.min.js"></script>
  <script src="/js/stisla.js"></script>
  <script src="/js/scripts.js"></script>
  <script src="/js/custom.js"></script>

  <script src="/js/page/auth-register.js"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Forget Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
<body>
<style>
    body {
        
        height: 100vh;
        background-image: url(/reset.jpg);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;

    }

.title {
    font-family: initial;
    color: #fff;
    text-align: ;
    margin-top: 1rem;
    margin-left: 3rem;
    font-size: x-large;
    text-align: center;
    margin-bottom: 1rem;
}

.pTag{
    margin-top: 1rem;
margin-left: 4rem;
font-size: smaller;
font-family: rever
}
.font{



    font-size: initial;
    font-family: initial;
    color: #ffffff;


}
.topBannerOverlay{
     position: relative;
     min-height: 110px;
     width: 100%;
     background: rgba(0,0,0,0.6);
 }

</style>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card topBannerOverlay" >
                <div class="title">{{ __('Reset Password') }}</div>

                <div class="">
                    @if (session('status'))
                        <div class="alert alert-success pTag" role="alert">

                            {{ session('status') }}
                            <a href="https://mail.google.com/mail/u/0/#inbox"  style="color: red;">Click & Check Mail</a>

                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


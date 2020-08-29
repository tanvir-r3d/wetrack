
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
.mainContent {
        
        height: 100vh;
        background-image: url(/email2.jpg);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;

    }
.overlay
{
     position: absolute;
     min-height: 100vh;
     width: 100%;
     background: rgba(0,0,0,0.4);

}

.title {
    font-family: initial;
    color: #fff;
    text-align: ;
    margin-top: 5rem;
    margin-left: 3rem;
    font-size: x-large;
    font-weight: 400;
    
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
.bodyOverlay{
     position: relative;
     min-height: 110px;
     width: 100%;
     background: rgba(0,0,0,0.7);
 }

</style>

<div class="container-fluid mainContent p-0">
    <div class="overlay p-0">
        <div class="row justify-content-center ">
        <div class="col-md-5 mt-5">
            <div class=" bodyOverlay">
                <div class="title card-header">{{ __('Reset Password') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row font">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row font">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mb-3 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</div>
</body>
</html>


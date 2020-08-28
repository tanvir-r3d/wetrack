
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Email Verify</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>
<body>
<style>
    body {
        
        height: 100vh;
        background-image: url(/verify.jpg);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
    }
 .logoimg{
    margin-left: 40%;
 }
 .title {
    font-family: initial;
    color: #5c6c6f;
    text-align: ;
    margin-top: 2rem;
    margin-left: 3rem;
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
    color: #282525;


}

</style>

 <div class="container">
    <div class="row justify-content">
        <div class="col-md-8">
            <div class="logoimg">
                   <img src="/logo1.png">

            </div>
            <hr>
            <br>
            <div class="card">
                <div class=""></div>
                <h2 class="title">Please Verifiy Your Email Address</h2>

                <p class="pTag">Thank you for using our Application </p>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success pTag" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <h6 class="ml-5 font">
                        Before proceeding, please check your email for a verification link.
                    </h6>
                    <a  class="ml-5" href="https://mail.google.com/mail/u/0/#inbox">Check email</a>
                    <br><br>

                     
                    
                    <h5 class="ml-5 text-center font">If you did not receive the email</h5>
                    <br>
                    <form class="text-center" method="POST" action="{{ route('verification.resend') }}">

                        @csrf
                        <button type="submit" class="btn btn-primary ">{{ __(' another request') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


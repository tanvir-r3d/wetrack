<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<style>
    body {
        font-family: tahoma;
        height: 100vh;
        background-image: url(https://images.freecreatives.com/wp-content/uploads/2015/03/Huge-Backgrounds-62.jpg);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
    }

    .our-team {
        padding: 30px 0 40px;
        margin-bottom: 30px;
        background-color: #f7f5ec;
        text-align: center;
        overflow: hidden;
        position: relative;
    }

    .our-team .picture {
        display: inline-block;
        height: 130px;
        width: 130px;
        margin-bottom: 50px;
        z-index: 1;
        position: relative;
    }

    .our-team .picture::before {
        content: "";
        width: 100%;
        height: 0;
        border-radius: 50%;
        background-color: #1369ce;
        position: absolute;
        bottom: 135%;
        right: 0;
        left: 0;
        opacity: 0.9;
        transform: scale(3);
        transition: all 0.3s linear 0s;
    }

    .our-team:hover .picture::before {
        height: 100%;
    }

    .our-team .picture::after {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #1369ce;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .our-team .picture img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        transform: scale(1);
        transition: all 0.9s ease 0s;
    }

    .our-team:hover .picture img {
        box-shadow: 0 0 0 14px #f7f5ec;
        transform: scale(0.7);
    }

    .our-team .title {
        display: block;
        font-size: 15px;
        color: #4e5052;
        text-transform: capitalize;
    }

    .our-team .social {
        width: 100%;
        padding: 0;
        margin: 0;
        background-color: #1369ce;
        position: absolute;
        bottom: -100px;
        left: 0;
        transition: all 0.5s ease 0s;
    }

    .our-team:hover .social {
        bottom: 0;
    }

    .our-team .social li {
        display: inline-block;
    }

    .our-team .social li a {
        display: block;
        padding: 10px;
        font-size: 17px;
        color: white;
        transition: all 0.3s ease 0s;
        text-decoration: none;
    }

    .our-team .social li a:hover {
        color: #1369ce;
        background-color: #f7f5ec;
    }
    .team-name{
        font-family: 'Kaushan Script', cursive;
        color: #1369ce;
    }
    .team-title{
        display: flex;
        justify-content: center;
    }
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
        background-color: #1369ce;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        text-decoration: none;
        z-index: 99;
        box-shadow: 2px 2px 3px #999;
    }

    .my-float{
        margin-top:22px;
    }
</style>

<a href="/home" class="float">
    <i class="fa fa-home my-float"></i>
</a>

<div class="container">
    <div class="row">
        <div class="team-title col-12 col-lg-12 col-md-12 col-sm-12">
            <h1 class="team-name">Code Carnival</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="our-team">
                <div class="picture">
                    <img class="img-fluid" src="/images/about_us/tanvir.jpg">
                </div>
                <div class="team-content">
                    <h3 class="name">Tanvir Hossen</h3>
                    <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                    <li><a href="https://www.facebook.com/r3dr0k37/" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://github.com/tanvir-r3d/" class="fa fa-github" aria-hidden="true"></a></li>
                    <li><a href="https://www.linkedin.com/in/tanvir112/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="our-team">
                <div class="picture">
                    <img class="img-fluid" src="/images/about_us/refat.jpg">
                </div>
                <div class="team-content">
                    <h3 class="name">Abdur Rahim Refat</h3>
                    <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                    <li><a href="https://www.facebook.com/rjsnss" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://github.com/Refat5" class="fa fa-github" aria-hidden="true"></a></li>
                    <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="our-team">
                <div class="picture">
                    <img class="img-fluid" src="https://picsum.photos/130/130?image=856">
                </div>
                <div class="team-content">
                    <h3 class="name">Azim Sabbir</h3>
                    <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                    <li><a href="https://www.facebook.com/A2imS4bb1r" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://github.com/Azim-Sabbir" class="fa fa-github" aria-hidden="true"></a></li>
                    <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="our-team">
                <div class="picture">
                    <img class="img-fluid" src="https://picsum.photos/130/130?image=836">
                </div>
                <div class="team-content">
                    <h3 class="name">Meheraj Ullah</h3>
                    <h4 class="title">Web Developer</h4>
                </div>
                <ul class="social">
                    <li><a href="https://www.facebook.com/mdmehraj.ullah" class="fa fa-facebook" aria-hidden="true"></a></li>
                    <li><a href="https://github.com/meheraj1999" class="fa fa-github" aria-hidden="true"></a></li>
                    <li><a href="https://codepen.io/collection/XdWJOQ/" class="fa fa-linkedin" aria-hidden="true"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/site-styles.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <title>{{ config('app.name', 'Ecospotless') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>
<ul id="dropdown1" class="dropdown-content">
    <li><a href="{{url('login')}}">Login</a></li>
    <li><a href="{{url('register')}}">Register</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="{{url('login')}}">Login</a></li>
    <li><a href="{{url('register')}}">Register</a></li>
</ul>
<div class="container-fluid">
    <div class="navbar-fixed">
        <nav style="height:64px!important;">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><img src="{{asset('img/logo.jpg')}}" /></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#employment-opportunities"><i class="material-icons left">nature_people</i>Opportunities</a></li>
                    <li><a href="#"><i class="material-icons left">payment</i>Book Now</a></li>
                    <li><a href="#about-us"><i class="material-icons left">info_outline</i>About Us</a></li>
                    <li><a href="#contact-us"><i class="material-icons left">contact_mail</i>Contact Us</a></li>
                    <li><a class="dropdown-trigger-cus" href="#!" data-target="dropdown2">Account<i class="material-icons right">arrow_drop_down</i></a></li>

                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="#"><i class="material-icons left">home</i>Home</a></li>
        <li><a href="#employment-opportunities"><i class="material-icons left">nature_people</i>Opportunities</a></li>
        <li><a href="#"><i class="material-icons left">payment</i>Book Now</a></li>
        <li><a href="#about-us"><i class="material-icons left">info_outline</i>About Us</a></li>
        <li><a href="#contact-us"><i class="material-icons left">contact_mail</i>Contact Us</a></li>
        <li class="divider"></li>
        <li><a class="dropdown-trigger-c" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
</div>
@yield('content')

<footer class="page-footer" style=" background-color: #22BC67!important;">
    <div class="container">
        <div class="row">
            <div class="col l6 s12" id="about-us">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4" style="text-align: justify;font-size: 16px!important;"> We are a black owned company with innovative ways to save the environment and the unemployment crisis. We do not use any Carbon
                emmiting machinery, therefore our services are 100% environmentally friendly. We are passionate about saving water as it is said by 2025 we can not have fresh water because of climate change.
                It takes 3 litres of freshwater to produce 1 litre of drinkable water. Ecospotless wash is cost effective, per 1 wash we save more than 150 litres and create 2 jobs.
                </p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">marketing@ecospotless.co.za</a></li>
                    <li><a class="white-text" href="#!">+27 84 255 3043</a></li>

                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Facebook</a></li>
                    <li><a class="white-text" href="#!">Twitter</a></li>
                    <li><a class="white-text" href="#!">Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class=" text-lighten-3" style="color:#fff!important;" href="#">MARSHTEQ</a>
        </div>
    </div>
</footer>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        M.AutoInit();
        $('.dropdown-trigger-cus').dropdown();
        $('.dropdown-trigger-c').dropdown();
    });
</script>
</body>
</html>

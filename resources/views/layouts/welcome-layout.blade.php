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
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><img src="{{asset('img/logo.jpg')}}" /></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="!#"><i class="material-icons left">info_outline</i>About Us</a></li>
                    <li><a href="!#"><i class="material-icons left">contact_mail</i>Contact Us</a></li>
                    <li><a class="dropdown-trigger-cus" href="#!" data-target="dropdown2">Account<i class="material-icons right">arrow_drop_down</i></a></li>

                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="#"><i class="material-icons left">home</i>Home</a></li>
        <li><a href="#"><i class="material-icons left">info_outline</i>About Us</a></li>
        <li><a href="#"><i class="material-icons left">contact_mail</i>Contact Us</a></li>
        <li class="divider"></li>
        <li><a class="dropdown-trigger-c" href="#!" data-target="dropdown1">Account<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
</div>
@yield('content')
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

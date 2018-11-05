@extends('layouts.welcome-layout')

@section('content')
<ul class="sidenav" id="mobile-demo">
    <li><a href="#"><i class="material-icons left">home</i>Home</a></li>
    <li><a href="#"><i class="material-icons left">info_outline</i>About Us</a></li>
    <li><a href="#"><i class="material-icons left">contact_mail</i>Contact Us</a></li>
    <li class="divider"></li>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Account<i class="material-icons right">arrow_drop_down</i></a></li>
</ul>
    <div class="parallax-container">
        <div class="parallax"><img src="https://picsum.photos/1000/800/?random"></div>
    </div>
    <div class="section white">
        <div class="row container">
            <h2 class="header">Parallax</h2>
            <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
        </div>
    </div>
</div>

@endsection
        
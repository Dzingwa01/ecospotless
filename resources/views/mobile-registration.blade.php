
<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/site-styles.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="register-form">
            <form class="col s12 card" method="POST" action="/register">
                @csrf
                <div class="center">
                    <img style="width: 40%" src="{{asset('img/ecospotless_cover.jpg')}}"/></a>
                </div>
                <div>
                    <h5 class="center-align">Register</h5>
                </div>
                <div class="input-field col s12">
                    <select name="role" required>
                        <option value="" disabled selected>Select Account Type</option>
                        <option value="client">Car Owner</option>
                        <option value="franchisee">Franchisee</option>
                        <option value="car-valet">Car Valet</option>
                    </select>
                    <label>Account Type</label>
                </div>
                {{--<p>--}}
                {{--<label>--}}
                {{--<input name="role" value="client" required type="radio"  />--}}
                {{--<span>Car Owner</span>--}}
                {{--</label>--}}
                {{--<label>--}}
                {{--<input value="car-valet" name="role" required type="radio" />--}}
                {{--<span>Car Valet</span>--}}
                {{--</label>--}}
                {{--</p>--}}
                <div class="row" style="padding-left: 1em;padding-right: 1em;">
                    <div class="input-field col s12">
                        <input  name="email" id="email" required type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row" style=";padding-left: 1em;padding-right: 1em;">
                    <div class="input-field col s12">
                        <input required  name="name" id="name" type="text" class="validate">
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="row" style="padding-left: 1em;padding-right: 1em;">
                    <div class="input-field col s12">
                        <input required  name="surname" id="surname" type="text" class="validate">
                        <label for="surname">Surname</label>
                    </div>
                </div>
                <div class="row" style="padding-left: 1em;padding-right: 1em;">
                    <div class="input-field col s12">
                        <input required  name="contact_number" id="contact_number" type="text" class="validate">
                        <label for="contact_number">Phone Number</label>
                    </div>
                </div>
                <div class="row" style="padding-left: 1em;padding-right: 1em;">
                    <div class="input-field col s12">
                        <input required  name="password" id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row" style="padding-left: 1em;padding-right: 1em;">
                    <div class="input-field col s12">
                        <input required  name="password-confirm" id="password-confirm" type="password" class="validate">
                        <label for="password-confirm">Repeat Password</label>
                    </div>
                </div>

                <div class="row" style="padding-left: 1em;padding-right: 1em;">
                    <button class="btn right" type="submit">Register</button>
                </div>
                {{--<div class="row" style="padding-left: 1em;padding-right: 1em;;">--}}
                    {{--<a class="right" href="login">Have an account? Login Now</a>--}}
                {{--</div>--}}
            </form>
        </div>
    </div>
</div>
<!--JavaScript at end of body for optimized loading-->
{{--<script type="text/javascript" src="js/materialize.min.js"></script>--}}
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
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
        <div class="login-form">
            <form class="col s12 card" method="post">
                <div><a href="/">
                <img style="width: 100%" src="{{asset('img/ecospotless_cover.jpg')}}"/></a>
                </div>
                <div>
                <h5 class="center-align">Log In</h5>
                </div>
                <div class="row" style="padding-top:2em;padding-left: 2em;padding-right: 2em;">
                    <div class="input-field col s12">
                        <input placeholder="Enter email address" name="email" id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row" style="padding-left: 2em;padding-right: 2em;">
                    <div class="input-field col s12">
                        <input placeholder="Enter password" name="password" id="password" type="password" class="validate">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row" style="padding-left: 3em;padding-right: 2em;">
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in"  />
                            <span>Remember Me</span>
                        </label>
                    </p>
                </div>
                <div class="row" style="padding-left: 2em;padding-right: 2em;">
                       <button class="btn right" type="submit">Login</button>
                </div>
                <div class="row" style="padding-left: 2em;padding-right: 2em;">
                    <a class="right" href="register">Don't have an account? Register Now</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
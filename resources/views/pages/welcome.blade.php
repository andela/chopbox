<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>ChopBox | Welcome</title>

    <!-- styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css' />
    <link href="//cdn.shopify.com/s/files/1/0691/5403/t/82/assets/style.scss.css?16677709998824235896" rel="stylesheet" type="text/css"  media="all"  />
    <link href="{!! asset('css/toolkit.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/application.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/homepage.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <link href="{!! asset('css/bootstrap-social.css') !!}" rel="stylesheet" />
    <link href="{!! asset('css/landing-page.css') !!}" rel="stylesheet" />

    <link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />

    <style>
        /* note: this is a hack for ios iframe for bootstrap themes shopify page */
        /* this chunk of css is not part of the toolkit :) */
        body {
            width: 1px;
            min-width: 100%;
            width: 100%;
        }

    </style>
</head>
<body class="anf">
    <nav class="pd ot" style="background-color: #ffffff">
        <div class="by">
            <a class="chopbox navbar-brand" style="color: #286090 !important;" href="{{url('/')}}">
                ChopBox
            </a>
        </div>
    </nav>

    <div class="container-fluid bg-image">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-6">
                <div class="row">
			 <span class="push-down white-text small_font dark-background">
				<h1 class="welcome-header">Welcome to ChopBox</h1>
				<p class="welcome-text">Connect with your friends -- and more fascinating
                    people.<br>Get in-the-moment updates on the delicacies that interest<br> you.
                    Feel the savour of the dishes, in real time from<br> different parts of the world.
			 </span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <!-- login form -->
                    <form class="form-shadow" method="post" id="login" role="form"
                          action="{{ url('/login') }}">
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text" required="" name="email" class="form-control input-sm" placeholder="email or username">
                        </div>
                        <div class="form-inline">
                            <input type="password" required="" name="password" class="input-sm form-control" placeholder="password">
                            <input type="submit" name="login" class="btn btn-primary input-sm pull-right" value="Log In">
                        </div>
                        <div class="form-inline form-group form-bottom">
                            <input type="checkbox" value="remember" class="pull-left some-space" name="remember">
                            <label for="remember" class="some-space small_font">Remember me</label>
                            <span><a href="{{ url('/password/email') }}" class="small_font pull-right some-space">Forgot password?</a></span>
                        </div>
                    </form>

                    <!-- end login form -->

                    <!-- signup form -->
                    <form class="form-shadow" method="post" id="register" role="form"
                          action="{{ url('/register') }}">
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }}">
                        <span class="some-space pull-right big-text">Sign Up</span>
                        <div class="form-group">
                            <input type="text" required="" name="name" class="form-control input-sm" placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" required="" class="form-control input-sm" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" required="" name="password" class="form-control input-sm" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="password" required="" class="form-control" name="password_confirmation" placeholder="confirm password">
                        </div>
                        <div class="form-group col-sm-offset-6 form-bottom">
                            <input type="submit" required="" name="register" class="btn btn-primary input-sm" value="Sign up for Chopbox">
                        </div>
                    </form>
                    <!-- end signup form -->

                    <!-- social network login buttons -->
                    <form class="form-shadow form" method="get" id="socialform">
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }}">
                        <div class="form-group">
                            <a class="btn btn-block btn-social btn-google" href="{{url('/login/google')}}">
                                <i class="fa fa-google"></i>
                                Sign in with google
                            </a>
                        </div>
                        <div class="form-group form-bottom">
                            <a class="btn btn-block btn-social btn-facebook" href="{{url('/login/facebook')}}">
                                <i class="fa fa-facebook"></i>
                                Sign in with facebook
                            </a>
                        </div>
                    </form>
                    <!-- end social network login buttons -->
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>

        <div class="space-out">
            <p>
                <a href="{{url('about')}}">About</a>
                <a href="{{url('terms')}}">Terms</a>
                <a href="{{url('privacy')}}">Privacy</a>
                <a href="{{url('help')}}">Help</a>
                <span>© 2015 ChopBox</span>
            </p>
        </div>
    </div>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/expanding.js') !!}"></script>
    <script src="{!! asset('js/chart.js') !!}"></script>
    <script src="{!! asset('js/toolkit.js') !!}"></script>
    <script src="{!! asset('js/application.js') !!}"></script>
</body>
</html>
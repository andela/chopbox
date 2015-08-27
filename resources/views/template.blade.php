<!doctype html>
<html>
<head>

    <!-- General Head Content -->
    <!-- meta tags -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="4--Yv8-XVyrl4hAM2ceeBXt8H8iiI_3Ms3vDSIV5xN0" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    @yield('title')

    <!-- styles -->
    <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

    @yield('customized_css')

    <link href="{!! asset('css/toolkit.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <link href="{!! asset('css/application.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
    <![endif]-->
</head>

<body id="hey-everyone" class="swag-line template-page">
<div class="container-fluid">

    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('about')}}"><b>ChopBox</b></a>
        </div>

        <div class="collapse navbar-collapse" id="global-nav">
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('chops')}}"><b>Home</b></a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</div>

<footer class="footer clearfix">
    <ul class="footer-list">
        <li class="footer-list-item">
            <a class="footer-list-link" href="{{url('about')}}">About</a>
        </li>

        <li class="footer-list-item">
            <a class="footer-list-link" href="{{url('terms')}}">Terms</a>
        </li>

        <li class="footer-list-item">
            <a class="footer-list-link" href="{{url('privacy')}}">Privacy</a>
        </li>

        <li class="footer-list-item">
            <a class="footer-list-link" href="{{url('help')}}">Help</a>
        </li>

    </ul>
    <p>© 2015 Chopbox</p>
</footer>

<!-- Scripts -->
<script src="{!! asset('js/jquery.js') !!}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/chart.js') !!}"></script>
<script src="{!! asset('js/toolkit.js') !!}"></script>
<script src="{!! asset('js/application.js') !!}"></script>

</body>
</html>

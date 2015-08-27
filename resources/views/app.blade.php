<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ChopBox | @yield('title')</title>
<link href="{!! asset('css/bootstrap.css') !!}" media="all"
  rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="{!!asset('css/bootstrap-social.css') !!}"/>
<!-- Custom CSS -->
    <link href="{!! asset('css/social.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/custom.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="http://x.tagstat.com/dyn/css/0/ax8U-nqOs.css">
    <link href="{!! asset('css/landing-page.css') !!}" rel="stylesheet">
<!-- Custom Fonts -->
<link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}"
  rel="stylesheet" type="text/css">
<link href="{!! asset('css/forms.css') !!}" rel="stylesheet">
<link
  href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
  rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed"
          data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span> <span
            class="icon-bar"></span> <span class="icon-bar"></span> <span
            class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">ChopBox</a>
      </div>

      <div class="collapse navbar-collapse"
        id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

        </ul>

        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest()) @else
          <li class="dropdown"><a href="#" class="dropdown-toggle"
            data-toggle="dropdown" role="button" aria-expanded="false">{{
              Auth::user()->name }} <span class="caret"></span>
          </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/logout') }}">Logout</a></li>
            </ul></li> @endif
        </ul>
      </div>
    </div>
  </nav>
  @yield('content')
  <!-- Scripts -->
  <script src="{!! asset('js/jquery.js') !!}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
</body>
</html>

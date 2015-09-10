<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ChopBox | @yield('title')</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link href="//cdn.shopify.com/s/files/1/0691/5403/t/82/assets/style.scss.css?16677709998824235896" rel="stylesheet" type="text/css"  media="all"  />
<link href="{!! asset('css/toolkit.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/application.css') !!}" media="all" rel="stylesheet" type="text/css" />

<link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet"/>

<link rel="stylesheet" href="{!! asset('css/bootstrap-social.css') !!}"/>
<!-- Custom CSS -->
<link href="{!! asset('css/homepage.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/landing-page.css') !!}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
<link href="{!! asset('css/forms.css') !!}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        width: 100%;
      }
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="anf">
  <div class="anp" id="app-growl"></div>
<nav class="ck pd ot app-navbar">
  <div class="by">
    <div class="os">
      <button type="button" class="ov collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
        <span class="cv">Toggle navigation</span>
        <span class="ow"></span>
        <span class="ow"></span>
        <span class="ow"></span>
      </button>
      <a class="chopbox navbar-brand" href="index.html">
        ChopBox
      </a>
    </div>
    <div class="f collapse" id="navbar-collapse-main">
        <ul class="nav navbar-nav st">
          <li>
            <a href="profile.1">Profile</a>
          </li>
          <li>
            <a data-toggle="modal" href="index.html#msgModal">Messages</a>
          </li>
        </ul>
        <ul class="nav navbar-nav oh ald st">
          <li >
            <a class="g" href="notifications/index.html">
             <i class="glyphicon glyphicon-bell"></i>
            </a>
          </li>
          <li>
            <button class="cg fm oy ank" data-toggle="popover">
              <img class="cu" src="{{ $user->image_uri }}">
            </button>
          </li>
        </ul>

        <form class="ox oh i" role="search">
          <div class="et">
            <input type="text" class="form-control" data-action="grow" placeholder="Search">
          </div>
        </form>

        <ul class="nav navbar-nav su sv sw">
          <li><a href="profile.1">Profile</a></li>
          <li><a href="notifications/index.html">Notifications</a></li>
          <li><a data-toggle="modal" href="index.html#msgModal">Messages</a></li>
          <li><a href="logout">Logout</a></li>
        </ul>

        <ul class="nav navbar-nav hidden">
          <li><a href="logout">Logout</a></li>
        </ul>
      </div>
  </div>
</nav>
  @yield('content')
  <!-- Scripts -->
  <script src="{!! asset('js/jquery.js') !!}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('js/expanding.js') !!}"></script>
  
</body>
</html>

{{--Nav bar--}}
<nav class="ck pd ot app-navbar">
  <div class="by">
      <a class="chopbox navbar-brand" href="{{url('/')}}">
        ChopBox
      </a>

      @if (Auth::check())
      <a class="chopbox navbar-brand pull-right hidden-lg hidden-md hidden-sm" href="{{url('logout')}}">
          Logout
      </a>
      @endif

      @yield('navbar')
  </div>
</nav>

{{--Content--}}
@yield('content')

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
<script src="{!! asset('js/deleteComment.js') !!}"></script>
<script src="{!! asset('js/jquery.toaster.js') !!}"></script>
<script src="{!! asset('js/message.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>

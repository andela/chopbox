{{--Nav bar--}}
<nav class="ck pd ot app-navbar">
  <div class="by">
      <a class="chopbox navbar-brand" href="{{url('/')}}">
        ChopBox
      </a>

      @if (Auth::check())
      <a class="chopbox navbar-brand pull-right" id="hide" href="{{url('logout')}}">
          Logout
      </a>
      @endif

      @yield('navbar')
  </div>
</nav>

{{--Content--}}
@yield('content')
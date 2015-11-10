{{--Nav bar--}}
@if ( Auth::check() )
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
@else
    <nav class="ot" style="background-color: #ccc; opacity: .9;">
        <div class="by">
            <a class="chopbox navbar-brand" style="color: #286090 !important;" href="{{url('/')}}">
                ChopBox
            </a>
        </div>
    </nav>
@endif


{{--Content--}}
@yield('content')
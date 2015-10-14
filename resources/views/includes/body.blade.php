{{--Nav bar--}}
@if ( Auth::check() )
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
                <a class="chopbox navbar-brand" href="{{url('/')}}">
                    ChopBox
                </a>
            </div>

            @yield('navbar')

        </div>
    </nav>
@else
    <div class="anp" id="app-growl"></div>
    <nav class="ck pd ot landing-navbar">
        <div class="by">
            <div class="os">
                <button type="button" class="ov collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
                    <span class="cv">Toggle navigation</span>
                    <span class="ow"></span>
                    <span class="ow"></span>
                    <span class="ow"></span>
                </button>
                <a class="chopbox navbar-brand landing-navbar-brand" href="{{url('/')}}">
                    ChopBox
                </a>
            </div>

            @yield('navbar')

        </div>
    </nav>
@endif

{{--Content--}}
@yield('content')
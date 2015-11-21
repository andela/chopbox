@if (Auth::check())
    <a class="chopbox navbar-brand pull-right" href="{{url('logout')}}">
        Logout
    </a>
@endif
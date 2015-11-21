<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
    <span class="sr-only">Navigation toggle</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<div class="f collapse navbar-collapse" id="navbar-collapse-main">
    <ul class="nav navbar-nav oh ald st">
        <li>
            <a class="g" href="#">
                <i class="glyphicon glyphicon-bell"></i>
            </a>
        </li>
        <li>
            <button class="cg fm oy ank" data-toggle="popover">
                <img class="cu" src="{{ Auth::user()->image_uri }}">
            </button>
        </li>
    </ul>

    <form class="ox oh i" role="search">
        <div class="et">
            <input type="text" class="form-control" data-action="grow" placeholder="Search">
        </div>
    </form>

    <ul class="nav navbar-nav oh">
        <li>
            <a data-toggle="modal" href="index.html#msgModal">Messages</a>
        </li>
    </ul>

    {{--------------For mobile screen display------------}}
    <ul class="nav navbar-nav su sv sw">
        <li><a href="{{ route('user.profile', Auth::user()->id) }}">Edit Profile</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>
    </ul>

    {{-------------For medium and large screen displays------------}}
    <ul class="nav navbar-nav hidden">
        <li><a href="{{ route('user.profile', Auth::user()->id) }}">Edit Profile</a></li>
        <li><a href="{{ url('/logout') }}">Logout</a></li>
    </ul>
</div>
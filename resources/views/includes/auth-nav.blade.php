<div class="f collapse" id="navbar-collapse-main">
    <ul class="nav navbar-nav st">
        <li>
            <a href="#">Profile</a>
        </li>
        <li>
            <a data-toggle="modal" href="index.html#msgModal">Messages</a>
        </li>
    </ul>
    <ul class="nav navbar-nav oh ald st">
        <li>
            <a class="g" href="#">
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
        <li><a href="#">Profile</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a data-toggle="modal" href="index.html#msgModal">Messages</a></li>
        <li><a href="logout">Logout</a></li>
    </ul>

    <ul class="nav navbar-nav hidden">
        <li><a href="logout">Logout</a></li>
    </ul>
</div>
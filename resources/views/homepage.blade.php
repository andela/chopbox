<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>Home</title>

      <!-- styles -->
      
      
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
      <link href="//cdn.shopify.com/s/files/1/0691/5403/t/82/assets/style.scss.css?16677709998824235896" rel="stylesheet" type="text/css"  media="all"  />
      <link href="{!! asset('css/toolkit.css') !!}" media="all" rel="stylesheet" type="text/css" />
      <link href="{!! asset('css/application.css') !!}" media="all" rel="stylesheet" type="text/css" />
      <link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
      <link href="{!! asset('css/homepage.css') !!}" media="all" rel="stylesheet" type="text/css" />
      <link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

      <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        width: 100%;
      }
    </style>

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
      <a class="e" href="index.html">
        <h1>Chopbox</h1>
      </a>
    </div>
    <div class="f collapse" id="navbar-collapse-main">

        <ul class="nav navbar-nav st">
          <li>
            <a href="index.html">Home</a>
          </li>
          <li>
            <a href="profile.1">Profile</a>
          </li>
          <li>
            <a data-toggle="modal" href="index.html#msgModal">Messages</a>
          </li>
          <li>
            <a href="docs/index.html">Docs</a>
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
          <li><a href="index.html">Home</a></li>
          <li><a href="profile.1">Profile</a></li>
          <li><a href="notifications/index.html">Notifications</a></li>
          <li><a data-toggle="modal" href="index.html#msgModal">Messages</a></li>
          <li><a href="docs/index.html">Docs</a></li>
          <li><a href="index.html#" data-action="growl">Growl</a></li>
          <li><a href="login/index.html">Logout</a></li>
        </ul>

        <ul class="nav navbar-nav hidden">
          <li><a href="index.html#" data-action="growl">Growl</a></li>
          <li><a href="login/index.html">Logout</a></li>
        </ul>
      </div>
  </div>
</nav>

<div class="cd fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <button type="button" class="cg fx fp eg k js-newMsg">New message</button>
        <h4 class="modal-title">Messages</h4>
      </div>

      <div class="modal-body ame js-modalBody">
        <div class="up">
          <div class="qp cj ca js-msgGroup">
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                <img class="cu qi" src="http://lorempixel.com/120/120">
                </span>
                <div class="qh">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="aoe">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="http://lorempixel.com/120/120">
                </span>
                <div class="qh">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="aoe">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="http://lorempixel.com/120/120">
                </span>
                <div class="qh">
                  <strong>Dave Gamache</strong>
                  <div class="aoe">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="http://lorempixel.com/120/120">
                </span>
                <div class="qh">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="aoe">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="assets/img/avatar-mdo.png">
                </span>
                <div class="qh">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="aoe">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="assets/img/avatar-dhg.png">
                </span>
                <div class="qh">
                  <strong>Dave Gamache</strong>
                  <div class="aoe">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="http://lorempixel.com/120/120">
                </span>
                <div class="qh">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="aoe">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="http://lorempixel.com/120/120">
                </span>
                <div class="qh">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="aoe">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk">
                  <img class="cu qi" src="assets/img/avatar-dhg.png">
                </span>
                <div class="qh">
                  <strong>Dave Gamache</strong>
                  <div class="aoe">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="hide ali js-conversation">
            <ul class="qp aoa">
              <li class="qg aod alt">
                <div class="qh">
                  <div class="aob">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="aoc">
                    <small class="dp">
                      <a href="index.html#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <a class="qj" href="index.html#">
                  <img class="cu qi" src="assets/img/avatar-dhg.png">
                </a>
              </li>

              <li class="qg alt">
                <a class="qk" href="index.html#">
                  <img class="cu qi" src="assets/img/avatar-fat.jpg">
                </a>
                <div class="qh">
                  <div class="aob">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="aob">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="aob">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="aoc">
                    <small class="dp">
                      <a href="index.html#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="qg alt">
                <a class="qk" href="index.html#">
                  <img class="cu qi" src="assets/img/avatar-mdo.png">
                </a>
                <div class="qh">
                  <div class="aob">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="aob">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="aoc">
                    <small class="dp">
                      <a href="index.html#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="qg aod alt">
                <div class="qh">
                  <div class="aob">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="aoc">
                    <small class="dp">
                      <a href="index.html#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <a class="qj" href="index.html#">
                  <img class="cu qi" src="assets/img/avatar-dhg.png">
                </a>
              </li>

              <li class="qg alt">
                <a class="qk" href="index.html#">
                  <img class="cu qi" src="assets/img/avatar-fat.jpg">
                </a>
                <div class="qh">
                  <div class="aob">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="aob">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="aob">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="aoc">
                    <small class="dp">
                      <a href="index.html#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="qg all">
                <a class="qk" href="index.html#">
                  <img class="cu qi" src="assets/img/avatar-mdo.png">
                </a>
                <div class="qh">
                  <div class="aob">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="aob">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="aoc">
                    <small class="dp">
                      <a href="index.html#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="cd fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Users</h4>
      </div>

      <div class="modal-body ame">
        <div class="up">
          <ul class="qp cj ca">
            <li class="b">
              <div class="qg">
                <a class="qk" href="index.html#">
                  <img class="qi cu" src="assets/img/avatar-fat.jpg">
                </a>
                <div class="qh">
                  <button class="cg fm fx eg">
                    <span class="c aok"></span> Follow
                  </button>
                  <strong>Jacob Thornton</strong>
                  <p>@fat - San Francisco</p>
                </div>
              </div>
            </li>
            <li class="b">
              <div class="qg">
                <a class="qk" href="index.html#">
                  <img class="qi cu" src="assets/img/avatar-dhg.png">
                </a>
                <div class="qh">
                  <button class="cg fm fx eg">
                    <span class="c aok"></span> Follow
                  </button>
                  <strong>Dave Gamache</strong>
                  <p>@dhg - Palo Alto</p>
                </div>
              </div>
            </li>
            <li class="b">
              <div class="qg">
                <a class="qk" href="index.html#">
                  <img class="qi cu" src="assets/img/avatar-mdo.png">
                </a>
                <div class="qh">
                  <button class="cg fm fx eg">
                    <span class="c aok"></span> Follow
                  </button>
                  <strong>Mark Otto</strong>
                  <p>@mdo - San Francisco</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="by ams">
  <div class="gd">
    <div class="go fixLeft">
      <div class="qw rd aof alt">
        <div class="qy" style="background-image: url('{{ $user->image_uri }}');"></div>
        <div class="qx dj">
          <a href="profile.1">
            <img class="aog" src="{{ $user->image_uri }}">
          </a>

          <h5 class="qz">
            <a class="akt" href="profile.1">Dave Gamache</a>
          </h5>

          <p class="alt">I wish i was a little bit taller, wish i was a baller, wish i had a girl… also.</p>

          <ul class="aoh">
            <li class="aoi">
              <a href="index.html#userModal" class="akt" data-toggle="modal">
                Friends
                <h5 class="alh">12M</h5>
              </a>
            </li>

            <li class="aoi">
              <a href="index.html#userModal" class="akt" data-toggle="modal">
                Enemies
                <h5 class="alh">1</h5>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="qw rd sn sq">
        <div class="qx">
          <h5 class="alc">About <small>· <a href="index.html#">Edit</a></small></h5>
          <ul class="eb tc">
            <li><span class="dp h xh alk"></span>Went to <a href="index.html#">Oh, Canada</a>
            <li><span class="dp h ajv alk"></span>Became friends with <a href="index.html#">Obama</a>
            <li><span class="dp h abu alk"></span>Worked at <a href="index.html#">Github</a>
            <li><span class="dp h acj alk"></span>Lives in <a href="index.html#">San Francisco, CA</a>
            <li><span class="dp h ads alk"></span>From <a href="index.html#">Seattle, WA</a>
          </ul>
        </div>
      </div>

       <div class="qw rd sn sq">
        <div class="qx">
          <h5 class="alc">Photos <small>· <a href="index.html#">Edit</a></small></h5>
          <div data-grid="images" data-target-height="150">
            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="http://lorempixel.com/640/640">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_6.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_7.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_8.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_9.jpg">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_10.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="ha">
      <ul class="ca qp anw">

        <li class="qg b amk">
          {!! Form::open(['url' => 'chops', 'files' => true, 'method'=>'post']) !!}
          {!! Form::textarea('about', null, ['class' => 'form-control expanding', 'rows'=>'4', 'required' => 'required', 'placeholder'=>"What's that special meal you ate today?"]) !!}
          {!! Form::file('image[]', ['multiple'=> true, 'required' => 'required', 'id'=>'file']) !!}
          <button type="button" class="cg fm glyphicon glyphicon-camera" id="camera" title="Attach photos"></button>
          {!! Form::submit('Post', ['class' =>'btn btn-primary pull-right', 'name' =>'submitButton']) !!}
          {!! Form::close() !!}

            @if($errors->any())
                <div class="has-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </li><br/>
          @foreach($all_chops as $chop)
          <li class="qg b amk">
              <a class="qk" href="index.html#">
                  <img class="qi cu round"  src="{{ $chop->user->image_uri }}"> 
              </a>
            <div class="qh">
              <div class="qo">
                  @if($chop->user_id == $user->id)
                      <div class="eg">
                          <a href="edit.php">
                            <small class="dp">Edit</small>
                          </a>

                          <a href="delete.php">
                            <small class="dp">X</small>
                          </a>
                      </div>
                  @endif

                  <a href="">
                      <h5 class="username"> {{ '@'.strtolower($chop->user->username) }} </h5>
                  </a>

              </div>

              <div class="anx" data-grid="images">
                  @foreach($chop->uploads as $upload)
                      <div style="display: none">
                          <img data-action="zoom" data-width="1050" data-height="700" src="{{ $upload->file_uri }}">
                      </div>
                  @endforeach

                      <p>{{ $chop->about }}</p>
                      <br />
                      <div>
                          @if($chop->likes > 0)
                              <a href="#">
                                  <span class="glyphicon glyphicon-heart"></span>
                              </a>
                          @else
                              <a href="#">
                                  <span id="unpopular" class="glyphicon glyphicon-heart"></span>
                              </a>
                          @endif
                          {{ $chop->likes }}
                      </div>

              </div>

              <ul class="qp all">
                  @foreach ($chop->comments as $comment)
                  <li class="qg">
                      <a class="qk" href="index.html#">
                          <img class="qi cu small-round" src="{{ $all_users->find($comment->user_id)->image_uri }}">
                      </a>
                      <div class="qh">
                          <a href="">
                              <strong>
                                  <span class="username">{{ '@'.strtolower($all_users->find($comment->user_id)->username).': ' }}</span>
                              </strong>
                          </a>
                          {{ $comment->comment }}
                      </div>
                  </li>
                  @endforeach
              </ul>

                <form action="" method="POST">
                    <input class="form-control" rows="1" placeholder="Comment..."></input>
                </form>
            </div>
          </li><br/>
          @endforeach
      </ul>
    </div>
    <div class="go fixRight">
      <div class="alert pw alert-dismissible st" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <a class="ps" href="profile.1">Visit your profile!</a> Check your self, you aren't looking too good.
      </div>

      <div class="qw rd alt st">
        <div class="qx">
          <h5 class="alc">Sponsored</h5>
          <div data-grid="images" data-target-height="150">
            <img class="qi" data-width="640" data-height="640" data-action="zoom" src="http://lorempixel.com/480/480">
          </div>
          <p><strong>It might be time to visit Iceland.</strong> Iceland is so chill, and everything looks cool here. Also, we heard the people are pretty nice. What are you waiting for?</p>
          <button class="cg ts fx">Buy a ticket</button>
        </div>
      </div>

      <div class="qw rd alt st">
        <div class="qx">
        <h5 class="alc">Likes <small>· <a href="index.html#">View All</a></small></h5>
        <ul class="qp anw">
          <li class="qg all">
            <a class="qk" href="index.html#">
              <img
                class="qi cu"
                src="http://lorempixel.com/120/120">
            </a>
            <div class="qh">
              <strong>Jacob Thornton</strong> @fat
              <div class="anz">
                <button class="cg ts fx">
                  <span class="h vc"></span> Follow</button>
              </div>
            </div>
          </li>
           <li class="qg">
            <a class="qk" href="index.html#">
              <img
                class="qi cu"
                src="http://lorempixel.com/120/120">
            </a>
            <div class="qh">
              <strong>Mark Otto</strong> @mdo
              <div class="anz">
                <button class="cg ts fx">
                  <span class="h vc"></span> Follow</button></button>
              </div>
            </div>
          </li>
        </ul>
        </div>
        <div class="ra">
          Dave really likes these nerds, no one knows why though.
        </div>
      </div>
      <div class="qw rd aoj">
        <div class="qx centralize">
          <a href="index.html#">About</a>
          <a href="index.html#">Help</a>
          <a href="index.html#">Terms</a>
          <a href="index.html#">Privacy</a><br>
            © 2015 Chopbox
        </div>
      </div>
    </div>
  </div>
</div>
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/expanding.js') !!}"></script>
    <script src="{!! asset('js/chart.js') !!}"></script>
    <script src="{!! asset('js/toolkit.js') !!}"></script>
    <script src="{!! asset('js/application.js') !!}"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
          while(BS.loader.length){(BS.loader.pop())()}
        }
      })
    </script>

    <script>
      $('#camera').click(function() {
        $( "#file" ).click();
      });

        $('')
    </script>

  </body>
</html>

@extends('layouts.app') 
@section('title') 
ChopBox 
@stop
@section('content')

<!-- styles -->


<link
  href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600'
  rel='stylesheet' type='text/css'>
<link
  href="//cdn.shopify.com/s/files/1/0691/5403/t/82/assets/style.scss.css?16677709998824235896"
  rel="stylesheet" type="text/css" media="all" />
<link href="{!! asset('css/toolkit.css') !!}" media="all"
  rel="stylesheet" type="text/css" />
<link href="{!! asset('css/application.css') !!}" media="all"
  rel="stylesheet" type="text/css" />
<link href="{!! asset('css/homepage.css') !!}" media="all"
  rel="stylesheet" type="text/css" />
    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>
<div class="cd fade" id="msgModal" tabindex="-1" role="dialog"
  aria-labelledby="msgModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d">
        <button type="button" class="close" data-dismiss="modal"
          aria-hidden="true">&times;</button>
        <button type="button" class="cg fx fp eg k js-newMsg">New
          message</button>
        <h4 class="modal-title">Messages</h4>
      </div>

      <div class="modal-body ame js-modalBody">
        <div class="up">
          <div class="qp cj ca js-msgGroup">
            <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-fat.jpg') !!}">
                </span>
                <div class="qh">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="aoe">Aenean eu leo quam. Pellentesque
                    ornare sem lacinia quam &hellip;</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-mdo.png') !!}">
                </span>
                <div class="qh">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="aoe">Brunch sustainable placeat vegan
                    bicycle rights yeah…</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-dhg.png') !!}">
                </span>
                <div class="qh">
                  <strong>Dave Gamache</strong>
                  <div class="aoe">Brunch sustainable placeat vegan
                    bicycle rights yeah…</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-fat.jpg') !!}">
                </span>
                <div class="qh">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="aoe">Aenean eu leo quam. Pellentesque
                    ornare sem lacinia quam &hellip;</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-mdo.png') !!}">
                </span>
                <div class="qh">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="aoe">Brunch sustainable placeat vegan
                    bicycle rights yeah…</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-dhg.png') !!}">
                </span>
                <div class="qh">
                  <strong>Dave Gamache</strong>
                  <div class="aoe">Brunch sustainable placeat vegan
                    bicycle rights yeah…</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-fat.jpg') !!}">
                </span>
                <div class="qh">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="aoe">Aenean eu leo quam. Pellentesque
                    ornare sem lacinia quam &hellip;</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-mdo.png') !!}">
                </span>
                <div class="qh">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="aoe">Brunch sustainable placeat vegan
                    bicycle rights yeah…</div>
                </div>
              </div>
            </a> <a href="index.html#" class="b">
              <div class="qg">
                <span class="qk"> <img class="cu qi"
                  src="{!! asset('img/avatar-dhg.png') !!}">
                </span>
                <div class="qh">
                  <strong>Dave Gamache</strong>
                  <div class="aoe">Brunch sustainable placeat vegan
                    bicycle rights yeah…</div>
                </div>
              </div>
            </a>
          </div>

          <div class="hide ali js-conversation">
            <ul class="qp aoa">
              <li class="qg aod alt">
                <div class="qh">
                  <div class="aob">Aenean eu leo quam. Pellentesque
                    ornare sem lacinia quam venenatis vestibulum. Nulla
                    vitae elit libero, a pharetra augue. Maecenas sed
                    diam eget risus varius blandit sit amet non magna.
                    Morbi leo risus, porta ac consectetur ac, vestibulum
                    at eros. Sed posuere consectetur est at lobortis.</div>
                  <div class="aoc">
                    <small class="dp"> <a href="index.html#">Dave
                        Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div> <a class="qj" href="index.html#"> <img
                  class="cu qi" src="{!! asset('img/avatar-dhg.png') !!}">
              </a>
              </li>

              <li class="qg alt"><a class="qk" href="index.html#"> <img
                  class="cu qi" src="{!! asset('img/avatar-fat.jpg') !!}">
              </a>
                <div class="qh">
                  <div class="aob">Cras justo odio, dapibus ac facilisis
                    in, egestas eget quam. Duis mollis, est non commodo
                    luctus, nisi erat porttitor ligula, eget lacinia
                    odio sem nec elit. Praesent commodo cursus magna,
                    vel scelerisque nisl consectetur et.</div>
                  <div class="aob">Vestibulum id ligula porta felis
                    euismod semper. Aenean lacinia bibendum nulla sed
                    consectetur. Cras justo odio, dapibus ac facilisis
                    in, egestas eget quam. Morbi leo risus, porta ac
                    consectetur ac, vestibulum at eros. Praesent commodo
                    cursus magna, vel scelerisque nisl consectetur et.
                    Nullam quis risus eget urna mollis ornare vel eu
                    leo. Morbi leo risus, porta ac consectetur ac,
                    vestibulum at eros.</div>
                  <div class="aob">Cras mattis consectetur purus sit
                    amet fermentum. Donec sed odio dui. Integer posuere
                    erat a ante venenatis dapibus posuere velit aliquet.
                    Nulla vitae elit libero, a pharetra augue. Donec id
                    elit non mi porta gravida at eget metus.</div>
                  <div class="aoc">
                    <small class="dp"> <a href="index.html#">Fat</a> at
                      4:28PM
                    </small>
                  </div>
                </div></li>

              <li class="qg alt"><a class="qk" href="index.html#"> <img
                  class="cu qi" src="{!! asset('img/avatar-mdo.png') !!}">
              </a>
                <div class="qh">
                  <div class="aob">Etiam porta sem malesuada magna
                    mollis euismod. Donec id elit non mi porta gravida
                    at eget metus. Praesent commodo cursus magna, vel
                    scelerisque nisl consectetur et. Etiam porta sem
                    malesuada magna mollis euismod. Morbi leo risus,
                    porta ac consectetur ac, vestibulum at eros. Aenean
                    lacinia bibendum nulla sed consectetur.</div>
                  <div class="aob">Curabitur blandit tempus porttitor.
                    Integer posuere erat a ante venenatis dapibus
                    posuere velit aliquet. Duis mollis, est non commodo
                    luctus, nisi erat porttitor ligula, eget lacinia
                    odio sem nec elit.</div>
                  <div class="aoc">
                    <small class="dp"> <a href="index.html#">Mark Otto</a>
                      at 4:20PM
                    </small>
                  </div>
                </div></li>

              <li class="qg aod alt">
                <div class="qh">
                  <div class="aob">Aenean eu leo quam. Pellentesque
                    ornare sem lacinia quam venenatis vestibulum. Nulla
                    vitae elit libero, a pharetra augue. Maecenas sed
                    diam eget risus varius blandit sit amet non magna.
                    Morbi leo risus, porta ac consectetur ac, vestibulum
                    at eros. Sed posuere consectetur est at lobortis.</div>
                  <div class="aoc">
                    <small class="dp"> <a href="index.html#">Dave
                        Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div> <a class="qj" href="index.html#"> <img
                  class="cu qi" src="{!! asset('img/avatar-dhg.png') !!}">
              </a>
              </li>

              <li class="qg alt"><a class="qk" href="index.html#"> <img
                  class="cu qi" src="{!! asset('img/avatar-fat.jpg') !!}">
              </a>
                <div class="qh">
                  <div class="aob">Cras justo odio, dapibus ac facilisis
                    in, egestas eget quam. Duis mollis, est non commodo
                    luctus, nisi erat porttitor ligula, eget lacinia
                    odio sem nec elit. Praesent commodo cursus magna,
                    vel scelerisque nisl consectetur et.</div>
                  <div class="aob">Vestibulum id ligula porta felis
                    euismod semper. Aenean lacinia bibendum nulla sed
                    consectetur. Cras justo odio, dapibus ac facilisis
                    in, egestas eget quam. Morbi leo risus, porta ac
                    consectetur ac, vestibulum at eros. Praesent commodo
                    cursus magna, vel scelerisque nisl consectetur et.
                    Nullam quis risus eget urna mollis ornare vel eu
                    leo. Morbi leo risus, porta ac consectetur ac,
                    vestibulum at eros.</div>
                  <div class="aob">Cras mattis consectetur purus sit
                    amet fermentum. Donec sed odio dui. Integer posuere
                    erat a ante venenatis dapibus posuere velit aliquet.
                    Nulla vitae elit libero, a pharetra augue. Donec id
                    elit non mi porta gravida at eget metus.</div>
                  <div class="aoc">
                    <small class="dp"> <a href="index.html#">Fat</a> at
                      4:28PM
                    </small>
                  </div>
                </div></li>

              <li class="qg all"><a class="qk" href="index.html#"> <img
                  class="cu qi" src="{!! asset('img/avatar-mdo.png') !!}">
              </a>
                <div class="qh">
                  <div class="aob">Etiam porta sem malesuada magna
                    mollis euismod. Donec id elit non mi porta gravida
                    at eget metus. Praesent commodo cursus magna, vel
                    scelerisque nisl consectetur et. Etiam porta sem
                    malesuada magna mollis euismod. Morbi leo risus,
                    porta ac consectetur ac, vestibulum at eros. Aenean
                    lacinia bibendum nulla sed consectetur.</div>
                  <div class="aob">Curabitur blandit tempus porttitor.
                    Integer posuere erat a ante venenatis dapibus
                    posuere velit aliquet. Duis mollis, est non commodo
                    luctus, nisi erat porttitor ligula, eget lacinia
                    odio sem nec elit.</div>
                  <div class="aoc">
                    <small class="dp"> <a href="index.html#">Mark Otto</a>
                      at 4:20PM
                    </small>
                  </div>
                </div></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="cd fade" id="userModal" tabindex="-1" role="dialog"
  aria-labelledby="userModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d">
        <button type="button" class="close" data-dismiss="modal"
          aria-hidden="true">&times;</button>
        <h4 class="modal-title">Users</h4>
      </div>

      <div class="modal-body ame">
        <div class="up">
          <ul class="qp cj ca">
            <li class="b">
              <div class="qg">
                <a class="qk" href="index.html#"> <img class="qi cu"
                  src="{!! asset('img/avatar-fat.jpg') !!}">
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
                <a class="qk" href="index.html#"> <img class="qi cu"
                  src="{!! asset('img/avatar-dhg.png') !!}">
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
                <a class="qk" href="index.html#"> <img class="qi cu"
                  src="{!! asset('img/avatar-mdo.png') !!}">
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
    <div class="go">
      <div class="qw rd aof alt">
        <div class="qy"
          style="background-image: url({!! asset('img/iceland.jpg') !!};"></div>
        <div class="qx dj">
          <a href="profile.1"> <img class="aog"
            src="{!! asset('img/avatar-dhg.png') !!}">
          </a>

          <h5 class="qz">
            <a class="akt" href="profile.1">Dave Gamache</a>
          </h5>

          <p class="alt">I wish i was a little bit taller, wish i was a
            baller, wish i had a girl… also.</p>

          <ul class="aoh">
            <li class="aoi"><a href="index.html#userModal" class="akt"
              data-toggle="modal"> Friends
                <h5 class="alh">12M</h5>
            </a></li>

            <li class="aoi"><a href="index.html#userModal" class="akt"
              data-toggle="modal"> Enemies
                <h5 class="alh">1</h5>
            </a></li>
          </ul>
        </div>
      </div>

      <div class="qw rd sn sq">
        <div class="qx">
          <h5 class="alc">
            About <small>· <a href="index.html#">Edit</a></small>
          </h5>
          <ul class="eb tc">
            <li><span class="dp h xh alk"></span>Went to <a
              href="index.html#">Oh, Canada</a> <li><span
              class="dp h ajv alk"></span>Became friends with <a
              href="index.html#">Obama</a><li><span cla
              ss="dp h abu alk"></span>Worked at <a href="index.html#">Github</a>
            
            
            <li><span class="dp h acj alk"></span>Lives in <a
              href="index.html#">San Francisco, CA</a>
            
            
            <li><span class="dp h ads alk"></span>From <a
              href="index.html#">Seattle, WA</a>
          
          
          </ul>
        </div>
      </div>

       <div class="qw rd sn sq">
        <div class="qx">
          <h5 class="alc">Photos <small>· <a href="index.html#">Edit</a></small>
          
          </h5>
          <div data-grid="images" data-target-height="150">
            <div>
              <img data-width="640" data-height="640" data-action="zoom"
                src="{!! asset('img/instagram_5.jpg') !!}">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom"
                src="{!! asset('img/instagram_6.jpg') !!}">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom"
                src="{!! asset('img/instagram_7.jpg') !!}">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom"
                src="{!! asset('img/instagram_8.jpg') !!}">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom"
                src="{!! asset('img/instagram_9.jpg') !!}">
            </div>

            <div>
              <img data-width="640" data-height="640" data-action="zoom"
                src="{!! asset('img/instagram_10.jpg') !!}">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ha">
      <ul class="ca qp anw">

        <li class="qg b amk">
          <div class="input-group">
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
          </div>
        </li>

        <li class="qg b amk">
          <a class="qk" href="index.html#">
            <img class="qi cu" src="{!! asset('img/instagram_1.jpg') !!}">
          </a>
          <div class="qh">
            <div class="qo">
              <small class="eg dp">4 min</small>
              <h5>Dave Gamache</h5>
            </div>

            <p>
              Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            </p>

            <div class="anx" data-grid="images">
              <div style="display: none">
                <img data-action="zoom" data-width="1050"
                  data-height="700" src="{!! asset('img/unsplash_1.jpg') !!}">
              </div>

              <div style="display: none">
                <img data-action="zoom" data-width="640"
                  data-height="640" src="{!! asset('img/instagram_1.jpg') !!}">
              </div>

              <div style="display: none">
                <img data-action="zoom" data-width="640"
                  data-height="640" src="{!! asset('img/instagram_13.jpg') !!}">
              </div>

              <div style="display: none">
                <img data-action="zoom" data-width="1048"
                  data-height="700" src="{!! asset('img/unsplash_2.jpg') !!}">
              </div>
            </div>

            <ul class="qp all">
              <li class="qg">
                <a class="qk" href="index.html#">
                  <img class="qi cu" src="{!! asset('img/avatar-fat.jpg') !!}">
                </a>
                <div class="qh">
                  <strong>Jacon Thornton: </strong>
                  Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.
                </div>
              </li>
              <li class="qg">
                <a class="qk" href="index.html#">
                  <img class="qi cu" src="{!! asset('img/avatar-mdo.png') !!}">
                </a>
                <div class="qh">
                  <strong>Mark Otto: </strong>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                </div>
              </li>
            </ul>
          </div>
        </li>

        <li class="qg b amk">
          <a class="qk" href="index.html#">
            <img class="qi cu" src="{!! asset('img/avatar-fat.jpg') !!}">
          </a>
          <div class="qh">
            <div class="aob">
              <div class="qo">
                <small class="eg dp">12 min</small>
                <h5>Jacob Thornton</h5>
              </div>
              <p>
                Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
            </div>
          </div>
        </li>

        <li class="qg b amk">
          <a class="qk" href="index.html#">
            <img class="qi cu" src="{!! asset('img/avatar-mdo.png') !!}">
          </a>
          <div class="qh">
            <div class="qo">
              <small class="eg dp">34 min</small>
              <h5>Mark Otto</h5>
            </div>

            <p>
              Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
            </p>

            <div class="anx" data-grid="images">
              <img style="display: none" data-width="640"
                data-height="640" data-action="zoom"
                src="{!! asset('img/instagram_3.jpg') !!}">
            </div>

            <ul class="qp">
              <li class="qg">
                <a class="qk" href="index.html#">
                  <img class="qi cu" src="{!! asset('img/avatar-dhg.png') !!}">
                </a>
                <div class="qh">
                  <strong>Dave Gamache: </strong>
                  Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis.
                </div>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
    <div class="go">
      <div class="alert pw alert-dismissible st" role="alert">
        <button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          
          <span aria-hidden="true">&times;</span>
        
        </button>
        <a class="ps" href="profile.1">Visit your profile!</a> Check your self, you aren't looking too good.
      </div>

      <div class="qw rd alt st">
        <div class="qx">
          <h5 class="alc">Sponsored</h5>
          <div data-grid="images" data-target-height="150">
            <img class="qi" data-width="640" data-height="640"
              data-action="zoom" src="{!! asset('img/instagram_2.jpg') !!}">
          </div>
          <p>
            
            <strong>It might be time to visit Iceland.</strong> Iceland is so chill, and everything looks cool here. Also, we heard the people are pretty nice. What are you waiting for?</p>
          <button class="cg ts fx">Buy a ticket</button>
        </div>
      </div>

      <div class="qw rd alt st">
        <div class="qx">
        <h5 class="alc">Likes <small>· <a href="index.html#">View All</a></small>
          
          </h5>
        <ul class="qp anw">
          <li class="qg all">
            <a class="qk" href="index.html#">
              <img class="qi cu" src="{!! asset('img/avatar-fat.jpg') !!}">
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
              <img class="qi cu" src="{!! asset('img/avatar-mdo.png') !!}">
            </a>
            <div class="qh">
              <strong>Mark Otto</strong> @mdo
              <div class="anz">
                <button class="cg ts fx">
                  <span class="h vc"></span> Follow</button>
                  
                  
                  </button>
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
        <div class="qx">
          © 2015 Bootstrap

          <a href="index.html#">About</a>
          <a href="index.html#">Help</a>
          <a href="index.html#">Terms</a>
          <a href="index.html#">Privacy</a>
          <a href="index.html#">Cookies</a>
          <a href="index.html#">Ads </a>

          <a href="index.html#">info</a>
          <a href="index.html#">Brand</a>
          <a href="index.html#">Blog</a>
          <a href="index.html#">Status</a>
          <a href="index.html#">Apps</a>
          <a href="index.html#">Jobs</a>
          <a href="index.html#">Advertise</a>
        </div>
      </div>
    </div>
  </div>
</div>
      
      <script src="{!! asset('js/jquery.min.js') !!}"></script> <script
                src="{!! asset('js/bootstrap.min.js') !!}"></script> <script
                src="{!! asset('js/expanding.js') !!}"></script> <script
                src="{!! asset('js/chart.js') !!}"></script> <script
                src="{!! asset('js/toolkit.js') !!}"></script> <script
                src="{!! asset('js/application.js') !!}"></script> <script>
        // execute/clear BS loaders for docs
        $(function(){
          if (window.BS&&window.BS.loader&&window.BS.loader.length) {
            while(BS.loader.length){(BS.loader.pop())()}
          }
        })
      </script> <script>
        $('#camera').click(function() {
          $( "#file" ).click();
        });
      </script> @endsection
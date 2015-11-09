@extends('layouts.app')

@section('title')
 Home
@endsection

@section('navbar')
    @include('includes.auth-nav')
@endsection

@section('content')
 <div>
	<div class="anp" id="app-growl"></div>
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
				<a href="#" class="b">
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
						Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a
						pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac
						consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
					 </div>
					 <div class="aoc">
						<small class="dp">
						 <a href="#">Dave Gamache</a> at 4:20PM
						</small>
					 </div>
					</div>
					<a class="qj" href="#">
					 <img class="cu qi" src="assets/img/avatar-dhg.png">
					</a>
				 </li>

				 <li class="qg alt">
					<a class="qk" href="#">
					 <img class="cu qi" src="assets/img/avatar-fat.jpg">
					</a>

					<div class="qh">
					 <div class="aob">
						Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat
						porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl
						consectetur et.
					 </div>
					 <div class="aob">
						Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo
						odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at
						eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis
						ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
					 </div>
					 <div class="aob">
						Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis
						dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida
						at eget metus.
					 </div>
					 <div class="aoc">
						<small class="dp">
						 <a href="#">Fat</a> at 4:28PM
						</small>
					 </div>
					</div>
				 </li>

				 <li class="qg alt">
					<a class="qk" href="#">
					 <img class="cu qi" src="assets/img/avatar-mdo.png">
					</a>

					<div class="qh">
					 <div class="aob">
						Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent
						commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod.
						Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
					 </div>
					 <div class="aob">
						Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
						Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
					 </div>
					 <div class="aoc">
						<small class="dp">
						 <a href="#">Mark Otto</a> at 4:20PM
						</small>
					 </div>
					</div>
				 </li>

				 <li class="qg aod alt">
					<div class="qh">
					 <div class="aob">
						Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a
						pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac
						consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
					 </div>
					 <div class="aoc">
						<small class="dp">
						 <a href="#">Dave Gamache</a> at 4:20PM
						</small>
					 </div>
					</div>
					<a class="qj" href="#">
					 <img class="cu qi" src="assets/img/avatar-dhg.png">
					</a>
				 </li>

				 <li class="qg alt">
					<a class="qk" href="#">
					 <img class="cu qi" src="assets/img/avatar-fat.jpg">
					</a>

					<div class="qh">
					 <div class="aob">
						Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat
						porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl
						consectetur et.
					 </div>
					 <div class="aob">
						Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo
						odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at
						eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis
						ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
					 </div>
					 <div class="aob">
						Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis
						dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida
						at eget metus.
					 </div>
					 <div class="aoc">
						<small class="dp">
						 <a href="#">Fat</a> at 4:28PM
						</small>
					 </div>
					</div>
				 </li>
				 <li class="qg all">
					<a class="qk" href="#">
					 <img class="cu qi" src="assets/img/avatar-mdo.png">
					</a>

					<div class="qh">
					 <div class="aob">
						Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent
						commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod.
						Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
					 </div>
					 <div class="aob">
						Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
						Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
					 </div>
					 <div class="aoc">
						<small class="dp">
						 <a href="#">Mark Otto</a> at 4:20PM
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
					<a class="qk" href="#">
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
					<a class="qk" href="#">
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
					<a class="qk" href="#">
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


	<div class="by ams" id="chops-display">
	 <div class="gd">
		<div class="go fixLeft">
		 <div class="qw rd aof alt tinted">
			<div class="qy" style="background-image: url('{{ $user->image_uri }}');"></div>
			<div class="qx dj">
			 <a href="#">
				<img class="aog" src="{{ $user->image_uri }}">
			 </a>

			 <h5 class="qz username">
				<a class="akt" href="{{ route('user.profile', $user->id) }}">{{ '@'.strtolower($user->username) }}</a>
			 </h5>

			 <h5 class="alc bluecolor">{{ $user->firstname }} {{ $user->lastname }}</h5>
			 <hr/>
			 <ul class="aoh">
				<li class="aoi">
				 <a href="index.html#userModal" class="" data-toggle="modal">
					Followers
				 </a>
				 <h5 class="alh"> {{ $user->followers_count }}</h5>
				</li>

				<li class="aoi">
				 <a href="index.html#userModal" class="" data-toggle="modal">
					Following
				 </a>
				 <h5 class="alh"> {{ $user->followings_count }}</h5>
				</li>
			 </ul>
			</div>
		 </div>

		 <div class="qw rd sn sq tinted">
			<div class="qx">
			 <h5 class="alc bluecolor">About</h5>
			 <p>{{ $user->about }}</p>
			</div>
		 </div>
		    <div class="qw rd sn sq tinted">
                <div class="qx">
                 <div class="eg">
                    <a href="{{ route('user.profile', $user->id) }}" id="profile-edit">
                     <i class="glyphicon glyphicon-edit"></i>
                    </a>
                 </div>
                 <h5 class="alc bluecolor">Bio</h5>
                 <ul class="eb tc disc-list-ul">
                    <li class="disc-list">Best food<a class="pull-right align-right" href="#">{{ $user->best_food }}</a>
                    </li>
                    <li class="disc-list">Location<a class="pull-right align-right" href="#"> {{ $user->location }}</a>
                    </li>
                    <li class="disc-list">Gender<a class="pull-right align-right" href="#"> {{  $user->gender }}</a>
                     </li>
                    <li class="disc-list">Total Chops<a class="pull-right align-right" href="#"> {{ $user->chops_count }}</a>
                     </li>
                 </ul>
                </div>
             </div>

		</div>
		<div class="ha">
		 <ul class="ca qp anw">

			<li class="qg b amk tinted">
			 {!! Form::open(['url' => 'chops', 'files' => true, 'method'=>'post']) !!}
			 {!! Form::textarea('about', null, ['class' => 'form-control expanding', 'rows'=>'4', 'required' => 'required',
			 'placeholder'=>"What's that special meal you ate today?"]) !!}
			 {!! Form::file('image[]', ['multiple'=> true, 'id'=>'file']) !!}
			 <div id="imagePreview"></div>
			 <button type="button" class="cg fm glyphicon glyphicon-camera" id="camera" title="Attach photos"></button>
			 {!! Form::submit('Post', ['class' =>'btn btn-primary pull-right post-btn', 'name' =>'submitButton']) !!}
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

			</li>
			<br/>
			@foreach($chops as $chop)
			 <li class="qg b amk curve tinted">

				<div class="qh">
				 <div class="qo">
					@can('update-chop', $chop)
					<div class="eg">
					 <a href="#">
						<i class="glyphicon glyphicon-edit"></i>
					 </a>

					 <a href="#">
						<i class="glyphicon glyphicon-remove-circle"></i>
					 </a>
					</div>
					@endcan

					<a class="qk" href="#">
					 <img class="qi cu round" src="{{ $chop->user->image_uri }}">
					</a>
					<a class="qk shift-down" href="">
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
					<br/>

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
						<a class="qk" href="#">
						 <img class="qi cu small-round" src="{{ $comment->user->image_uri }}">
						</a>

						<div class="qh">
						 <a href="#">
							<strong>
							 <span class="username">{{ '@'.strtolower($comment->user->username).': ' }}</span>
							</strong>
						 </a>
						 {{ $comment->comment }}
						</div>
					 </li>
					@endforeach
				 </ul>

				 {!! Form::open(['url' => '/comment', 'method'=>'post']) !!}
				 {!! Form::hidden('chop_id', $chop->id) !!}
				 {!! Form::text('comment', null, ['class' => 'form-control expanding', 'required' => 'required',
				 'placeholder'=>"comment"]) !!}
				 {!! Form::close() !!}

				</div>
			 </li><br/>
			@endforeach
		 </ul>
		</div>
		<div class="go fixRight">
		 <div class="qw rd alt st tinted">
			<div class="qx">
			 <h5 class="alc centralize bluecolor">Leaderboard</h5>
			 <hr/>

			 <ul class="qp all">
				@foreach($topTen as $top_user)
				 <li class="qg">
					<a class="qk" href="#">
					 <img class="qi cu small-round" src="{{ $top_user->image_uri }}">
					</a>

					<div class="qh leaderboard">
					 <a href="#">
						<strong>
						 <span class="username">{{ '@'.strtolower($top_user->username) }}</span>
						</strong>
					 </a>
					 <span class="pull-right"> {{ $top_user->chops_count }} </span>
					</div>
				 </li>
				@endforeach
			 </ul>
			</div>
		 </div>
		 <div class="qw rd aoj tinted">
			<div class="qx centralize">
			 <a href="{{ url('about') }}">About</a>
			 <a href="{{ url('help') }}">Help</a>
			 <a href="{{ url('terms') }}">Terms</a>
			 <a href="{{ url('privacy') }}">Privacy</a><br>
			 © 2015 ChopBox
			</div>
		 </div>
		</div>
	 </div>
	</div>

 </div>


@endsection

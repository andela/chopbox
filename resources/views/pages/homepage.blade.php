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
			 </div>

			 <div class="hide ali js-conversation">
				<ul class="qp aoa">
				 <li class="qg alt">
					<a class="qk" href="#">
					 <img class="cu qi" src="#">
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
			<h4 class="modal-title"></h4>
		 </div>
		 <div class="modal-body ame">
			<div class="up">
			 <ul id="followingList" class="qp cj ca"></ul>
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
				<a class="akt" href="{{ route('user.show', $user->id) }}">{{ '@'.strtolower($user->username) }}</a>
			 </h5>

			 <h5 class="alc bluecolor">{{ $user->firstname }} {{ $user->lastname }}</h5>
			 <hr/>
			 <ul class="aoh">
				<li class="aoi">
                    <a id="followers" data-id="{{ $user->id }}" style="cursor: pointer">
					    Followers
				    </a>
				    <h5 class="alh followers-count"> {{ $user->followers_count }}</h5>
				</li>

				<li class="aoi">
                    <a id="following" data-id="{{ $user->id }}" style="cursor: pointer">
					    Following
				    </a>
				    <h5 class="alh {{ ($user->id == Auth::user()->id) ? 'followings-count-for-logged-in-user' : 'followings-count'}}" > {{ $user->followings_count }}</h5>
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
                    @can('edit-profile', $user->id)
                    <div class="eg">
                        <a href="{{ route('user.profile', $user->id) }}" id="profile-edit">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    </div>
                    @endcan
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
                        <a data-toggle="modal" data-target="#editModal-{{ $chop->id  }}">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>

                        <!-- Edit Modal -->
                        <div id="editModal-{{ $chop->id }}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Chop</h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($chop,['url' => 'editChop', 'files' => true, 'method' => 'put']) !!}
                                        {!! Form::hidden('chop_id', $chop->id) !!}
                                        {!! Form::textarea('about', $chop->about, ['class' => 'form-control expanding', 'rows'=>'4', 'required' => 'required', 'placeholder'=>"What's that special meal you ate today?"]) !!}
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::submit('Edit', ['class' =>'btn btn-primary pull-right post-btn', 'name' =>'submitButton']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>

                            </div>
                        </div>   <!-- End of Edit Modal -->

                        <a data-toggle="modal" data-target="#confirmDelete-{{ $chop->id  }}">
                            <i class="glyphicon glyphicon-remove-circle"></i>
                        </a>

                        <!-- Delete Modal Dialog -->
                        <div class="modal fade" id="confirmDelete-{{ $chop->id }}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Are you sure you want to delete this chop?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="username"> {{ '@'.strtolower($chop->user->username) }} </h5>
                                        <p>{{ $chop->about }}</p>
                                        <input name="chop_id" type="hidden" value="{{ $chop->id }}" />
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::model($chop,['url' => 'deleteChop', 'method' => 'delete']) !!}
                                        {!! Form::hidden('about', $chop->about, ['class' => 'form-control expanding', 'rows'=>'4', 'required' => 'required', 'placeholder'=>"What's that special meal you ate today?"]) !!}
                                        {!! Form::hidden('chop_id', $chop->id) !!}
                                        {!! Form::hidden('user_id', $chop->user->id) !!}
                                        {!! Form::submit('Delete', ['class' =>'btn btn-danger pull-right delete-btn', 'name' =>'submitButton']) !!}
                                        {!! Form::close() !!}
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>      <!-- End of Delete Modal -->

					</div>
					@endcan
                     <a class="qk" href="#">
                         <img data-id="{{ $chop->user->id }}" class="qi cu round {{ $chop->user->id == Auth::user()->id ? '' : 'pop'}}" src="{{ $chop->user->image_uri }}">
                     </a>
					<a class="qk shift-down" href="" >
					 <h5 class="username"> {{ '@'.strtolower($chop->user->username) }} </h5>
                     <p class="time-display">{{ $repository->getPostedTime($chop->id) }}</p>
					</a>

				 </div>

				 <div class="anx" data-grid="images">
					@foreach($chop->uploads as $upload)
					 <div style="display: none">
						<img data-action="zoom" data-width="1050" data-height="700" src="{{ $upload->file_uri }}">
					 </div>
					@endforeach

					<p class="chops-about">{{ $chop->about }}</p>
					<br/>

					<div>
                        <a href="#!" class="favourite">
                            <input type="hidden" value="{{ $chop->id }}" name="chop_id"/>
                            <span id="{{ ($chop->likes > 0 )?'':'unpopular'}}" class="glyphicon glyphicon-heart {{ $chop->id
                             }}"></span>
                        </a>
                         <span id="favourites-count-{{ $chop->id }}">{{ $chop->likes }}</span>
					</div>
				 </div>

				 <ul class="qp all">
					@foreach ($chop->comments as $comment)
					 <li class="qg">
						<a class="qk" href="#">
						 <img data-id="{{ $comment->user->id }}" class="qi cu small-round {{ $comment->user->id == Auth::user()->id ? '' : 'pop'}}" src="{{ $comment->user->image_uri }}">
						</a>
						<div class="qh">
						 <a href="#!">
							<strong>
							 <span class="username">{{ '@'.strtolower($comment->user->username).': ' }}</span>
							</strong>
						 </a>
						 {{ $comment->comment }}
                            <p class="comment-time">{{ $commentRepo->getCommentTime($comment->id) }}</p>
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
                     <a class="qk" href="{{ route('user.show',$top_user->id) }}">
					 <img data-id="{{ $top_user->id }}" class="qi cu small-round {{ $top_user->id == Auth::user()->id ? '' : 'pop'}}" src="{{ $top_user->image_uri }}" />
					</a>

					<div class="qh leaderboard">
					 <a href="{{ route('user.show', $top_user->id) }}">
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

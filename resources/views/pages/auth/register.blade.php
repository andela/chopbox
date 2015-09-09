@extends('layouts.app')

@section('title')
	Register
@stop

@section('content')

 <div class="intro-header bg-image">
	<div class="container">
	 <div class="col-md-12">
		<div class="container">
		 <div class="row">
			<div class="col-sm-6 col-sm-offset-2 register-header">
			  <span class="">Create an Account and have some fun</span>
			</div>
		 </div>
		 <div class="row">
			<div class="col-md-5 col-md-offset-3">
			 <div class="panel panel-default">
				<div class="panel-heading">
				 <strong class="big-text">Signing Up is Simple. Get Started</strong>
				</div>
				<div class="panel-body">
				 <form class="form-horizontal" role="form" method="post" action="{{ url('/register') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<fieldset>
					 <div class="row">
						<div class="center-block">
						 <img class="profile-img" src="{!! asset('img/nologin.jpg') !!}">
						</div>
					 </div>
					 @include('errors.errors')
					 <div class="row">
						<div class="col-sm-12 col-md-10  col-md-offset-1 ">
						 <div class="form-group">
							<div class="input-group">
							 <span class="input-group-addon"> <i
									class="glyphicon glyphicon-user"></i>
							 </span> <input type="text"
							 class="form-control" required="required"
							 placeholder="Username" name="name"
							 value="{{ old('name') }}">
							</div>
						 </div>
						 <div class="form-group">
							<div class="input-group">
							 <span class="input-group-addon"> <i
									class="glyphicon glyphicon-user"></i>
							 </span> <input type="email"
							 class="form-control" required="required"
							 placeholder="Email" name="email"
							 value="{{ old('email') }}">
							</div>
						 </div>
						 <div class="form-group">
							<div class="input-group">
							 <span class="input-group-addon"> <i
									class="glyphicon glyphicon-lock"></i>
							 </span> <input type="password"
							 class="form-control" required="required"
							 placeholder="Password" name="password">
							</div>
						 </div>
						 <div class="form-group">
							<div class="input-group">
							 <span class="input-group-addon"> <i
									class="glyphicon glyphicon-lock"></i>
							 </span> <input type="password"
							 class="form-control" required="required"
							 placeholder="Confirm Password"
							 name="password_confirmation">
							</div>
						 </div>


						 <div class="form-group">
							<button type="submit" class="btn btn-primary btn-block form-control">Register
							</button>
						 </div>
						</div>
					 </div>
					</fieldset>
				 </form>
				</div>
			 </div>
			</div>
			<div class="col-md-6 col-md-offset-3 register-footer">
			 <span class="white-text big-text">Already Registered?</span>
			 <span class="white-text reg-login big-text"><a href="{{ url('/login') }}" class="white-text fancy-link">Log In Here</a> </span>
			</div>
		 </div>

		</div>
	 </div>
	</div>
 </div>
@endsection

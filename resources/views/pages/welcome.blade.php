@extends('layouts.app')


@section('title')
 Home
@endsection


@section('content')
 <div class="container-fluid bg-image">
	<div class="row">
	 <div class="col-md-1">

	 </div>
	 <div class="col-md-6">
		<div class="row">
			 <span class="push-down white-text small_font dark-background">
				<h1 class="welcome-header">Welcome to ChopBox</h1>
				<p class="welcome-text">Connect with your friends -- and more fascinating
				 people.<br>Get in-the-moment updates on the delicacies that interest<br> you.
				 Feel the savour of the dishes, in real time from<br> different parts of the world.
			 </span>
		</div>
	 </div>
	 <div class="col-md-3">
		<div class="row">
		 <!-- login form -->
		 <form class="form-shadow" method="post" id="login" role="form"
					 action="{{ url('/login') }}">
			<input type="hidden" name="_token"
						 value="{{ csrf_token() }}">
			 <div class="form-group">
				<input type="text" required="" name="email" class="form-control input-sm" placeholder="email or username">
			 </div>
			<div class="form-inline">
				<input type="password" required="" name="password" class="input-sm form-control" placeholder="password">
				<input type="submit" name="login" class="btn btn-primary input-sm pull-right" value="Log In">
			</div>
			<div class="form-inline form-group form-bottom">
			 <input type="checkbox" value="remember" class="pull-left some-space" name="remember">
			 <label for="remember" class="some-space small_font">Remember me</label>
			 <span><a href="{{ url('/password/email') }}" class="small_font pull-right some-space">Forgot password?</a></span>
			</div>
		 </form>

		 <!-- end login form -->

		 <!-- signup form -->
		 <form class="form-shadow" method="post" id="register" role="form"
					 action="{{ url('/register') }}">
			<input type="hidden" name="_token"
						 value="{{ csrf_token() }}">
			<span class="some-space pull-right big-text">Sign Up</span>
			<div class="form-group">
			 <input type="text" required="" name="username" class="form-control input-sm" placeholder="username">
			</div>
			<div class="form-group">
			 <input type="email" name="email" required="" class="form-control input-sm" placeholder="email">
			</div>
			<div class="form-group">
			 <input type="password" required="" name="password" class="form-control input-sm" placeholder="password">
			</div>
			<div class="form-group">
			 <input type="password" required="" class="form-control" name="password_confirmation" placeholder="confirm password">
			</div>
			<div class="form-group col-sm-offset-6 form-bottom">
			 <input type="submit" required="" name="register" class="btn btn-primary input-sm" value="Sign up for Chopbox">
			</div>
		 </form>
		 <!-- end signup form -->

		 <!-- social network login buttons -->
		 <form class="form-shadow form" method="get" id="socialform">
			<input type="hidden" name="_token"
						 value="{{ csrf_token() }}">
			<div class="form-group">
			 <a class="btn btn-block btn-social btn-google" href="{{ url('/oauth/google') }}">
				<i class="fa fa-google"></i>
				Sign in with google
			 </a>
			</div>
			 <div class="form-group form-bottom">
				<a class="btn btn-block btn-social btn-facebook" href="{{ url('/oauth/facebook') }}">
				 <i class="fa fa-facebook"></i>
				 Sign in with facebook
				</a>
			 </div>
		 </form>
		 <!-- end social network login buttons -->
		</div>
	 </div>
	 <div class="col-md-2">
	 </div>
	</div>
 </div>
@endsection

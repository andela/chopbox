@extends('app')


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
		 <form class="form-shadow" id="loginform" method="post">
			 <div class="form-group">
				<input type="text" name="email" class="form-control input-sm" placeholder="email or username">
			 </div>
			<div class="form-inline">
				<input type="password" name="password" class="input-sm form-control" placeholder="password">
				<input type="submit" name="login" class="btn btn-primary  pull-right" value="Log In">
			</div>
			<div class="form-inline form-group">
			 <input type="checkbox" value="remember" class="pull-left some-space" name="remember">
			 <label for="remember" class="some-space small_font">Remember me</label>
			 <span><a href="#" class="small_font pull-right some-space">Forgot password?</a></span>
			</div>
		 </form>

		 <!-- end login form -->

		 <!-- signup form -->
		 <form class="form-shadow" id="regform" method="post">
			<span class="some-space pull-right big-text">Sign Up</span>
			<div class="form-group">
			 <input type="text" name="username" class="form-control input-sm" placeholder="username">
			</div>
			<div class="form-group">
			 <input type="text" name="email" class="form-control input-sm" placeholder="email">
			</div>
			<div class="form-group">
			 <input type="password" name="password" class="form-control input-sm" placeholder="password">
			</div>
			<div class="form-group">
			 <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
			</div>
			<div class="form-group col-sm-offset-5">
			 <input type="submit" name="register" class="btn btn-primary input-sm" value="Sign up for Chopbox">
			</div>
		 </form>
		 <!-- end signup form -->

		 <!-- social network login buttons -->
		 <form class="form-shadow" method="get" id="socialform">
			<div class="form-group">
			 <a class="btn btn-block btn-social btn-google">
				<i class="fa fa-google"></i>
				Sign in with google
			 </a>
			</div>
			 <div class="form-group">
				<a class="btn btn-block btn-social btn-facebook">
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

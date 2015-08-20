@extends('app')


@section('title')
 Home
@stop

@section('content')
 <div class="intro-header background-image">
	<div class="container">
	 <div class="row">
		<div class="col-md-8">
		 <div class="row">
			<div class="col-md-6">
			 <div class="pitchcontents push-down" id="web_pitch">
				<h1 class="tagline shadow">The Online community for food lovers</h1>
				<h2 class="convince shadow">Tell your friends about that special meal you just discovered and love so much</h2>
			 </div>
			</div>
		 </div>
		 <div class="row">
			<div class="content_bottom_v3 shift-right">
			 <div class="connect_btns_container logged_out_quote_btns">
				<div class="google_btn_container">
				 <div class="connect">
					<a href="/oauth/google" class="google google_login_click dib pr tal clearfix">
					 <span class="ico-wrap"><i class="google"></i></span>
					 <span class="btn_text google">Login with Google            </span>
					</a>
				 </div>
				</div>
				<div class="fb_btn_container logged_out_quote_btns">
				 <div class="connect">
					<a href="/oauth/facebook" class="facebook facebook_login_click dib pr tal clearfix">
					 <span class="ico-wrap"><i class="facebook"></i></span>
					 <span class="btn_text facebook">Login with Facebook</span>
					</a>
				 </div>
				</div>
			 </div>
			 <div class="divider_container">
				<div class="vertical_line-2"></div>
				<div class="vertical_line"></div>
				<span class="text_above text-uppercase">or </span>
			 </div>
			 <div class="signup_email_text">
				<a href="#register" id="register" class="white-text text-capitalize">Sign up with your email!</a>
			 </div>
			 <div class="clear_both"></div>
			</div>
		 </div>
		 <div class="row">

		 </div>
		</div>
		<div class="col-md-4">
		 <div class="row">
			<div class="intro-forms form-shadow">
			 <form class="form-horizontal" method="post" id="login" role="form"
						 action="{{ url('/login') }}">
				<input type="hidden" name="_token"
							 value="{{ csrf_token() }}">
				<h5 class="pull-right">Sign In</h5>

				<div class="form-group">
				 <input type="text" class="form-control" value="{{old('email')}}"
								name="email" placeholder="Email or Username..."
								required="">
				</div>
				<div class="form-group">
				 <input type="password" name="password" class="form-control"
								placeholder="Password..." required="">
				</div>
				<div class="form-group">
				 <label for="remember" class="form-inline pull-left">
					<input type="checkbox" name="remember" class="form-control">
					Remember Me
				 </label><a class="btn btn-link pull-right white-text"
										href="{{ url('/password/email') }}">Forgot Your
					Password?</a>
				</div>
				<div class="form-group">
				 <button type="submit" name="login" class="btn-primary form-control btn-info">Log In</button>
				</div>
			 </form>

			</div>
		 </div>
		 <div class="row">
			<div class="form-shadow">
			 <form class="form-horizontal" method="post" id="register" role="form"
						 action="{{ url('/register') }}">
				<input type="hidden" name="_token"
							 value="{{ csrf_token() }}">
				<h5 class="pull-right">Sign Up</h5>

				<div class="form-group">
				 <input type="text" name="name" placeholder="Username..." class="form-control"
								id="registerName" required="" value="{{old('name')}}">
				</div>
				<div class="form-group">
				 <input type="text" name="email" id="registerEmail"
								required="" class="form-control" placeholder="Email..."
								value="{{old('email')}}">
				</div>

				<div class="form-group">
				 <input type="password" id="registerpassword"
								class="form-control" name="password" required=""
								placeholder="Password...">
				</div>
				<div class="form-group">
				 <input type="password" name="password_confirmation"
								class="form-control" required=""
								placeholder="Confirm Password..." id="registerpconfirm">
				</div>
				<div class="form-group">
				 <button type="submit" name="register" class=" btn-primary form-control btn-info">Sign Up</button>
				</div>
			</div>
			</form>
		 </div>
		</div>
	 </div>
	</div>
 </div>
@stop
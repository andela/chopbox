@extends('app') @section('title') Login @stop @section('content')
<div class="intro-header bg-image">
  <div class="container">
    <div class="col-lg-12">
      <div>&nbsp;</div>
      <div class="container">
        <div class="row ">
          <div class="col-sm-6 col-sm-offset-2">
					 <h2 class="white-text fancy-text"> Log In and have some fun</h2>
					 <span class="some-space"></span>
					</div>
        </div>
        <div class="row">
          <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>Log In to ChopBox to Continue</strong>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                  action="{{ url('/login') }}">
                  <input type="hidden" name="_token"
                    value="{{ csrf_token() }}">
                  <fieldset>
                    <div class="row">
                      <div class="center-block">
                        <img class="profile-img"
                          src="{!! asset('img/nologin.jpg') !!}">
                      </div>
                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems
                      with your input.<br> <br>
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> @endforeach
                      </ul>
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-user"></i>
                            </span> <input type="text"
                              class="form-control input-sm" required="required"
                              placeholder="Username or Email"
                              name="email" value="{{ old('email') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-lock"></i>
                            </span> <input type="password"
                              class="form-control input-sm" required="required"
                              placeholder="Password" name="password">
                          </div>
                        </div>
                        <div class="form-group">
												 <input type="checkbox" name="remember" class="pull-left some-space">
                          <label for="remember" style="color: #3f3f3f;"class="pull-left some-space">Remember Me</label>
												 <span><a href="{{ url('/password/email') }}" class="small_font pull-right some-space">Forgot password?</a></span>
                        </div>

                        <div class="form-group">
                          <button name="submit" type="submit"
                            class="btn btn-primary btn-block form-control input-sm">Login</button>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
					 <div class="row">
						<div class="col-sm-12 col-md-12">
						 <!-- social network login buttons -->
						 <form class="form-shadow form" method="get" id="socialform">
							<input type="hidden" name="_token"
										 value="{{ csrf_token() }}">
							<div class="form-group">
							 <a class="btn btn-block btn-social btn-google" href="{{url('/oauth/google')}}">
								<i class="fa fa-google"></i>
								Sign in with google
							 </a>
							</div>
							<div class="form-group form-bottom">
							 <a class="btn btn-block btn-social btn-facebook" href="{{url('/oauth/facebook')}}">
								<i class="fa fa-facebook"></i>
								Sign in with facebook
							 </a>
							</div>
						 </form>
						 <!-- end social network login buttons -->
						</div>
					 </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container -->

</div>
@endsection

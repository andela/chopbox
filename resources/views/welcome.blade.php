 @extends('app')
 @section('title')
 Home
 @stop
 @section('content')

<div class="intro-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-8 intro-message">
          <h1>ChopBox.com</h1>
          <h3>Drop Your Chops</h3>
          <hr class="intro-divider">
          <h4>Signup or Register</h4>
        </div>

        <div class="col-lg-4 intro-forms">
          <div class="login-forms">
            <form class="form-horizontal" role="form" method="POST"
              action="{{ url('/login') }}">
              <input type="hidden" name="_token"
                value="{{ csrf_token() }}">
              <div class="form-group">
                <input type="text" class="form-control"
                  required="required" placeholder="Username or Email"
                  name="email" value="{{ old('email') }}">
              </div>
              <div class="form-group">
                <input type="password" class="form-control"
                  name="password" required="required"
                  placeholder="Password">
              </div>
              <div class="form-group">
                <label for="remember" class="form-inline pull-left"> <input
                  type="checkbox" name="remember" class="form-control">
                  Remember Me
                </label> <a class="btn btn-link pull-right"
                  href="{{ url('/password/email') }}">Forgot Your
                  Password?</a>
              </div>
              <div class="form-group">
                <button type="submit"
                  class="btn btn-primary form-control">Login</button>
              </div>
            </form>
          </div>

          <div class="signup-forms">
            <form class="form-horizontal" role="form" method="POST"
              action="{{ url('/register') }}">
              <input type="hidden" name="_token"
                value="{{ csrf_token() }}">
              <div class="form-group">
                <input type="text" class="form-control" name="name"
                  value="{{ old('name') }}" required="required"
                  placeholder="Username">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email"
                  value="{{ old('email') }}" required="required"
                  placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control"
                  name="password" required="required"
                  placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control"
                  name="password_confirmation" required="required"
                  placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <button type="submit"
                  class="btn btn-success form-control">Sign up for
                  ChopBox</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop


@extends('app') @section('title') Login @stop @section('content')
<div class="intro-header">
  <div class="container">
    <div class="col-lg-12">
      <div style="margin-top: 60px;">&nbsp;</div>
      <div class="container">
        <div class="row ">
          <h3 class="white-text pull-text-up"> Login and have some fun</h3>
          <span class="some-space"></span>
        </div>
        <div class="row move-up">
          <div class="col-lg-6 col-md-3 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong> Sign in to ChopBox to Continue</strong>
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
                              class="form-control" required="required"
                              placeholder="Username or Email"
                              name="email" value="{{ old('email') }}">
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
                          <label for="remember" style="color: #3f3f3f;"
                            class="form-inline pull-left"> <input
                            type="checkbox" name="remember"
                            class="form-control"> Remember Me
                          </label>
                        </div>

                        <div class="form-group">
                          <button name="submit" type="submit"
                            class="btn btn-primary btn-block form-control">Login</button>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
                <div class="row push-buttons-down" id="buttons">
                    <div class="content_bottom_v3 shift-right">
                        <div class="connect_btns_container logged_out_quote_btns">
                            <div class="google_btn_container">
                                <div class="connect">
                                    <a href="/oauth/google" class="google google_login_click dib pr tal clearfix">
                                        <span class="ico-wrap"><i class="google"></i></span>
                                        <span class="btn_text google">Login with Google</span>
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
                    </div>
                </div>

              <div class="login-last" id="error">
                <span class="pull-left some-space big-text shadow">Don't have an account? <a
                  href="{{ url('/register') }}" onClick="" class="white-text">Sign Up Here
                </a></span> <span class="pull-right some-space big-text"><a
                  href="{{ url('/password/email') }}" class="white-text shadow"> Forgot Password? </a></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container -->

</div>
@if(count($errors) > 0)
    <script type="text/javascript">
        $('div#buttons').removeClass('push-buttons-down').addClass('login-buttons-error');
        $('div#error').removeClass('login-last').addClass('login-last-error');
    </script>
@endif
@endsection

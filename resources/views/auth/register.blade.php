@extends('app') 
@section('title') 
Register 
@stop 
@section('content')
 <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<div class="intro-header">
  <div class="container">
      <div class="col-lg-12">
      <div style="margin-top: 60px;">&nbsp;</div>
      <div class="container">
        <div class="row">
          <h3 class="white-text pull-text-up">Create an account and have fun</h3>
            <span class="some-space"></span>
        </div>
        <div class="row move-up">
          <div class="col-lg-6 col-md-3 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>Signing Up is Simple. Get Started</strong>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                  action="{{ url('/register') }}">
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
                      with your input.<br>
                      <br>
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
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
                          <button type="submit"
                            class="btn btn-primary btn-block form-control">Register</button>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
                </div>
                <div class="row">
                    <div class="content_bottom_v3 shift-right">
                        <div class="connect_btns_container logged_out_quote_btns push-buttons-down-2" id="buttons">
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
                @if(count($errors) > 0)
                    <script type="text/javascript">
                        $('div#buttons').removeClass('push-buttons-down-2').addClass('push-buttons-further');
                    </script>
                @endif
              <div class="register-last" id="label">
                <span class= "big-text shadow left-space">Already Registered!
                    <a class="white-text" href="{{ url('/login') }}" onClick="">Login Here</a>
                </span>
              </div>
              @if(count($errors) > 0)
                <script type="text/javascript">
                    $('div#label').removeClass('register-last').addClass('register-last-error');
                </script>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

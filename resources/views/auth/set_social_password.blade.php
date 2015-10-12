@extends('layouts.app')
@section('title')
Login
@stop
@section('content')
<div class="intro-header">
  <div class="container">
    <div class="col-lg-12">
      <div style="margin-top: 60px;">&nbsp;</div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-3 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong> Set the Username and Password for your Chopbox Account</strong>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                  action="{{ url('/social_password') }}">
                  <input type="hidden" name="_token"
                    value="{{ csrf_token() }}">
                  <fieldset>
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
                            placeholder="Username" name="name"
                            value="{{ old('name') }}">
                        </div>
                      </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-lock"></i>
                            </span> <input type="password"
                              class="form-control" required="required"
                              placeholder="Password" name="password"
                              value="{{ old('password') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-lock"></i>
                            </span> <input type="password"
                              class="form-control" required="required"
                              placeholder="Confirm Password" name="password_confirmation"
                              value="{{ old('password_confirmation') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <button name="submit" type="submit"
                            class="btn btn-danger btn-block form-control">Set Username and Password</button>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>

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

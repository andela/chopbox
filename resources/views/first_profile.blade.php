@extends('app') @section('content')
<div class="">
  <div class="container">
    <div class="col-lg-12">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-3 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>Complete Your Profile</strong>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                  action="{{ url('/home') }}">
                  <input type="hidden" name="_token"
                    value="{{ csrf_token() }}">
                  <fieldset>
                    <div class="row">
                      <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                        <div class="pull-left">
                          <img class="profile-img"
                            src="{!! asset('img/nologin.jpg') !!}">
                        </div>
                        <input name="picture" type="file"
                          class="btn btn-success">
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
                              placeholder="Firstname" name="firstname"
                              value="{{ old('firstname') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-user"></i>
                            </span> <input type="text"
                              class="form-control" required="required"
                              placeholder="Lastname" name="name"
                              value="{{ old('lastname') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-globe"></i>
                            </span> <input type="text"
                              class="form-control" required="required"
                              placeholder="Location" name="location"
                              value="{{ old('location') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-globe"></i>
                            </span> <input type="text"
                              class="form-control" required="required"
                              placeholder="Best Food" name="best_food"
                              value="{{ old('best_food') }}">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon"> <i
                              class="glyphicon glyphicon-lock"></i>
                            </span>
                            <textarea class="form-control" placeholder="About Me" rows="5" cols=""></textarea>
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
                            class="btn btn-primary btn-block form-control">Complete Account Registration</button>
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
</div>
@endsection

@extends('layouts.app')

@section('custom-css')
<link href="{!! asset('css/forms.css') !!}" rel="stylesheet" />
<link href="{!! asset('css/footer.css') !!}" rel="stylesheet" />
@endsection

@section('content')
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
                                          action="{{ url('profile_complete') }}"
                                          enctype="multipart/form-data" id="upload">
                                        <input type="hidden" name="_token"
                                               value="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                @include('errors.errors')
                                                <div class="row">
                                                    <div
                                                            class="col-sm-12 col-md-10  col-md-offset-1 ">
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
                                             placeholder="Lastname" name="lastname"
                                             value="{{ old('lastname') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group">
                              <span class="input-group-addon"><i
                                          class="glyphicon glyphicon-user"></i> </span>
                              <span class="radio-style"> <label
                                          class="radio-inline"> <input
                                              type="radio" name="gender" value="M"
                                              required><b>Male</b>
                                  </label> <label class="radio-inline"> <input
                                              type="radio" name="gender" value="F">Female
                                  </label>
                              </span>
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
                                          class="glyphicon glyphicon-thumbs-up"></i>
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
                              <textarea name="about"
                                        class="form-control"
                                        placeholder="About Me" rows="5" cols=""></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-block form-control">Complete
                                                                Account Registration</button>
                                                        </div>
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

    @include('includes.footer')

@endsection

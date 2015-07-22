@extends('app')

@section('content')
<div class="">
    <div class="container">
            <div class="col-lg-12">
                <div class="container" >
                    <div class="row ">
                        <h3></h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-md-offset-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>Complete Your Profile</strong>
                                </div>
                                <div class="panel-body">
                           			<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <fieldset>
                                        <div class="row">
                                            <div class="center-block">
                                                <img class="profile-img"
                                                     src="{!! asset('img/nologin.jpg') !!}">
                                            </div>
                                        </div>
                                        @if (count($errors) > 0)
											<div class="alert alert-danger">
												<strong>Whoops!</strong> There were some problems with your input.<br><br>
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
		                                                <span class="input-group-addon">
		                                                    <i class="glyphicon glyphicon-user"></i>
		                                                </span>
		                                                	<input type="text" class="form-control" required="required" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="glyphicon glyphicon-user"></i>
		                                                </span>
		                                                	<input type="text" class="form-control" required="required" placeholder="Firstname" name="name" value="{{ old('name') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="glyphicon glyphicon-user"></i>
		                                                </span>
		                                                	<input type="text" class="form-control" required="required" placeholder="Location" name="name" value="{{ old('name') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
		                                                <span class="input-group-addon">
		                                                    <i class="glyphicon glyphicon-user"></i>
		                                                </span>
		                                                	<input type="email" class="form-control" required="required" placeholder="Email" name="email" value="{{ old('email') }}">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
	                                                <span class="input-group-addon">
	                                                    <i class="glyphicon glyphicon-lock"></i>
	                                                </span>
                                                		<input type="password" class="form-control" required="required" placeholder="Password" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
	                                                <span class="input-group-addon">
	                                                    <i class="glyphicon glyphicon-lock"></i>
	                                                </span>
                                                		<input type="password" class="form-control" required="required" placeholder="Confirm Password" name="password_confirmation">
                                                    </div>
                                                </div>
                                                
                                                <div class = "form-group">
                                                	<button type="submit" class="btn btn-primary btn-block form-control">Register</button>
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

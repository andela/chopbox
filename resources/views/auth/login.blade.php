<<<<<<< HEAD


@extends('layout')

@section('content')

{!!Form::open(['url'=>'login'])!!}

  
    <div>
        <p>Email</p>
        <input type="email" name="email">
    </div>

    
    <div>
        <p>Password</p>
        <input type="password" name="password" id="password">
    </div>
    

    <p>
    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>
    </p>

    <div style="width:400px; ">
        <button type="submit">Login</button>
    </div>
{!!Form::close()!!}

@stop

=======
@extends('app')

@section('content')
<div class="intro-header">
    <div class="container">
            <div class="col-lg-12">
                <div style="margin-top: 60px;">&nbsp;</div>
                <div class="container" >
                    <div class="row ">
                        <h3>Why not Login and just have fun</h3>
                        <hr class="intro-divider">
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-md-offset-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong> Sign in to ChopBox to Continue</strong>
                                </div>
                                <div class="panel-body">
                           			<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
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
		                                                	<input type="text" class="form-control" required="required" placeholder="Username or Email" name="email" value="{{ old('email') }}">
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
                                                <div class = "form-group">
					                                <label for="remember"style="color:#3f3f3f;" class="form-inline pull-left">
															<input type="checkbox" name="remember" class="form-control"> Remember Me
													</label>
												</div>

                                                <div class = "form-group">
                                                	<button type="submit" class="btn btn-primary btn-block form-control">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    </form>

                                </div>
                                <div class="panel-footer ">
                                    <span class="pull-left">Don't have an account! <a href="{{ url('/auth/register') }}" onClick=""> Sign Up Here </a></span>
                                    <span class="pull-right"><a href="{{ url('/password/email') }}" onClick=""> Forgot Password </a></span>
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
>>>>>>> Implemented user authentification an registration



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


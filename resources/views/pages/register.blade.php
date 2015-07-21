@extends('layout')
@section('content')
  {!!Form::open(['url'=>'create'])!!}
    <p>{!!Form::label('email','Email:')!!}</p>
    <p>{!!Form::text('email')!!}</p>
    <p>{!!Form::label('username','Username:')!!}</p>
    <p>{!!Form::text('username')!!}</p>
    <p>{!!Form::label('password', 'Password:')!!}</p>
    <p>{!!Form::password('password')!!}</p>
    {!!Form::submit('Register')!!}
  {!!Form::close()!!}
  @stop
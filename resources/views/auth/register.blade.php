
@extends('layout')


@section('content')
{!!Form::open(['url' => 'register'])!!}
    {!! csrf_field() !!}

    <div>
       <p>Name</p>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        <p>Email</p>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <p>Password</p>
        <input type="password" name="password">
    </div>

    <div>
        <p>Confirm Password</p>
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
{!!Form::close()!!}
@endsection
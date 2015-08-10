@extends('app')


@section('title')
  New Chops
@endsection

@section('content')
<div class="container">


  <h2>What's that special meal you just ate today</h2>
  {!! Form::open(['url' => 'chops', 'files' => true, 'method'=>'post']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Tell us the name') !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('image', 'Show us an image') !!}
      {!! Form::file('image', ['required' => 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('about', 'Tell us about it.') !!}
      {!! Form::textarea('about', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Post', ['class' =>'btn btn-primary', 'name' =>'submitButton']) !!}
    </div>
  {!! Form::close() !!}


    @if($errors->any())
        <div class="has-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>

@endsection
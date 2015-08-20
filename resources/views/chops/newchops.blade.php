@extends('app')


@section('title')
  New Chops
@endsection

@section('content')

<div class="container">

  <h2>What's that special meal you just ate today</h2><br/>
  {!! Form::open(['url' => 'chops', 'files' => true, 'method'=>'post']) !!}
    <div class="form-group">
      {!! Form::label('about', 'Tell us about it.') !!}
      {!! Form::textarea('about', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image', 'How does it look like?') !!}
        {!! Form::file('image[]', ['multiple'=> true, 'required' => 'required']) !!}
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
@extends('app')


@section('title')
  New Chops
@endsection

@section('content')
<div class="container">
  <h2>What's that special meal you just ate today</h2>
  {!!Form::open(['url' => 'store', 'files' => true])!!}
    <div class="form-group">
      {!!Form::label('name', 'Tell us the name')!!}
      {!!Form::text('name', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
      {!!Form::label('image', 'Show us an image')!!}
      {!!Form::file('image')!!}
    </div>

    <div class="form-group">
      {!!Form::label('about', 'Tell us about it.')!!}
      {!!Form::textarea('about', null, ['class' => 'form-control'])!!}
    </div>

    <div class="form-group">
      {!!Form::submit('Post', ['class' =>'btn btn-primary'])!!}
    </div>
  {!!Form::close()!!}

</div>

@endsection
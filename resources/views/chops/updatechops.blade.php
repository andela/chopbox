@extends('app')


@section('title')
    New Chops
@endsection

@section('content')
    <div class="container">

        <h2>EDIT: What's that special meal you just ate today</h2>
        {!! Form::model($chops, ['action' => ['ChopsController@update', $chops->id], 'files' => true, 'method'=>'patch']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Tell us the name') !!}
            {!! Form::text('chops_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
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
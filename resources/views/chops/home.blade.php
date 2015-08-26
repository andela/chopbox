@extends('app')

@section('title')
    all chops
@endsection


@section('content')
    <div class="container">

        {!! Form::open(['url' => 'chops', 'id' => 'my-form', 'files' => true, 'method'=>'post']) !!}
        <div class="form-group">
            {!! Form::textarea('about', null, ['class' => 'form-control', 'placeholder' => "What's that special meal you just ate today", 'required' => 'required']) !!}
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
        @foreach($chops as $chop)

            <a href="">
                <span style="color:palevioletred">
                {{'@' . strtolower($chop->user->username)}}
                </span>
            </a>

            <div>
                @foreach($chop->uploads as $image)

                        @if ($image->public_id)
                            {!! cl_image_tag($image->public_id, array("width" => 300, "height" => 200,
                                    "crop" => "fill", "radius" => 20)) !!}
                        @else
                            <img src="{{$image->file_uri}}" width="300" height="200" />
                        @endif

                @endforeach
                <p>{{$chop->about}}</p>
                <p>{{$chop->favourites->count()}} Favourites</p>
                
            </div><br />
        @endforeach
        
    {!! $chops->render() !!}
@endsection
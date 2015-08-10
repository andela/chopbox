@extends('app')

@section('title')
    all chops
@endsection


@section('content')
        @foreach($chops as $chop)
            <div>
<<<<<<< Updated upstream
                <h1>{{$chop->name}}</h1>
                <img src="#" alt="chops image">
=======
                <div><h2>{{$chop->chops_name}}</h2></div>
                @foreach($chop->uploads as $image)
                    <div>
                        <img src="{{$image->file_uri}}" alt="chops image">
                    </div>
                @endforeach
>>>>>>> Stashed changes
                <p>
                    {{$chop->about}}
                </p>
            </div>
        @endforeach
@endsection
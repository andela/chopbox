@extends('app')

@section('title')
    all chops
@endsection


@section('content')
        @foreach($chops as $chop)
            <div>
                <div><h2>{{$chop->chops_name}}</h2></div>
                @foreach($chop->uploads as $image)
                    <div>
                        <img src="{{$image->file_uri}}" alt="chops image">
                    </div>
                @endforeach
                <h2>{{$chop->name}}</h2>
                <img src="{{$chop->uploads->file_uri}}" alt="chops image">

                <p>
                    {{$chop->about}}
                </p>
                <p>
                {{$chop->favourites->count()}} Favourites
                </p>
                
            </div>
        @endforeach
        
    {!! $chops->render() !!}
@endsection
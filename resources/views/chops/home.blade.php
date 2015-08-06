@extends('app')

@section('title')
    all chops
@endsection


@section('content')
        @foreach($chops as $chop)
            <div>
                <h1>{{$chop->name}}</h1>
                <img src="#" alt="chops image">
                <p>
                    {{$chop->about}}
                </p>
            </div>
        @endforeach
@endsection
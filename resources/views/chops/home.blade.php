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
                        <?php
                            if ($image->public_id) {
                            echo cl_image_tag($image->public_id, array("width" => 300, "height" => 200,
                                    "crop" => "fill", "radius" => 20));
                            }
                            else {
                            ?>
                        <img src="{{$image->file_uri}}" width="300" height="200" />

                        <?php } ?>
                    </div>
                @endforeach
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
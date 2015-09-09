@extends('app') @section('title') all chops @endsection


@section('content') @foreach($chops as $chop)
<div>
  <div>
    <h2>{{$chop->chops_name}}</h2>
  </div>

  @foreach($chop->uploads as $image)

  <div>
    <img src="{{$image->file_uri}}" alt="chops image"
      class="image-rounded">
  </div>
  @endforeach
  <p>{{$chop->about}}</p>
  <p>{{$chop->favourites->count()}} Favourites</p>

</div>
@endforeach {!! $chops->render() !!} @endsection

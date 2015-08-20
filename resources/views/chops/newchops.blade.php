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



    {{--<div class="container">--}}
    {{--<div class="dropzone" id="dropzoneFileUpload">--}}
    {{--</div>--}}
    {{--</div>--}}


    <!--<script src="{!! asset('js/dropzone.js') !!}"></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: "/chops/uploadFiles",
            params: {
                _token: token
            }
        });
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            accept: function(file, done) {

            }
        };
    </script>-->

</div>

@endsection
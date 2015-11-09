@extends('layouts.app')

@section('navbar')
    @include('includes.auth-nav')
@endsection

@section('content')
<div class="by ams">
    <div class="gd">
        <div class="go fixLeft">

        </div>
        <div class="col-lg-6 ha qw rd aof alt tinted">
            <h4 class="alc bluecolor center" style="padding: 10px;">Update Info</h4>
            <form enctype="multipart/form-data" action="{{ route('profile.update', $user->id) }}" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group col-lg-offset-8" id="imagePreview">
                    <img src="{{ $user->image_uri }}" alt="profile image" id="camera" height="150" width="150"
                         data-toggle="tooltip" data-placement="top" title="Click to change profile image">
                </div>
                <div class="form-group">
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control input-sm" placeholder="username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control input-sm" placeholder="password">
                </div>

                <div class="form-group">
                    <input type="file" name="file" id="file" multiple="true">
                </div>
                <div class="form-group">
                    <input type="text" id="location" name="location" class="form-control input-sm" value="{{ $user->location }}" placeholder="location">
                </div>
                <div class="form-group">
                    <input type="text" name="best-food" class="form-control input-sm" id="best-food" value="{{ $user->best_food }}">
                </div>

                <div class="form-group">
                    <select name="gender" class="form-control input-sm">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="about" rows="4" name="about">{{ $user->about }}</textarea>
                </div>
                <div class="form-bottom">
                    <div class="form-group col-lg-offset-10">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </form>
        </div>

        <div class="go fixRight">

        </div>
    </div>

</div>
@endsection


@section('footer')
    @include('includes.footer')
@endsection
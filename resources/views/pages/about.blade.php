@extends('layouts.app')

@section('title')
    About
@endsection

@section('custom-css')
    <link href="{!! asset('css/fixed-footer.css') !!}" rel="stylesheet" />
@endsection

@section('navbar')
    @include('includes.logout-nav')
@endsection

@section('content')
    <h1 class="rte-heading text-center">About Chopbox</h1><br />
    <div class="row">
        <div class="rte col-md-offset-2 col-md-8 col-sm-12 col-sm-offset-0" style="font-size: 16px">
            <p>We all love to try out varieties of food whether prepared at home or in a restaurant. Chopbox is that platform for lovers of variety of foods to share those memorable dishes. At Chopbox, we make your stay hassle-free; just upload not more than four pictures of the chop and give a short description. That's it. Your special chop would start receiving lots of interesting comments from other chop lovers.</p>

            @if (! Auth::check())
            <p>To start posting your chops and viewing others' chops, <a href="/">register</a> today.</p>
            @endif
        </div>
    </div>

    @include('includes.footer')

@endsection
@extends('template')

@section('title')
    <title>About</title>
@stop

@section('customized_css')
    <link href="{!! asset('css/about-terms.css') !!}" media="all" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <h1 class="rte-heading text-center">About Chopbox</h1><br />
    <div class="row">
        <div class="rte col-md-offset-2 col-md-8 col-sm-12 col-sm-offset-0">
            <p>We all love to try out varieties of food whether prepared at home or in a restaurant. Chopbox is that platform for lovers of variety of foods to share those memorable dishes. At Chopbox, we make your stay hassle-free; just upload not more than four pictures of the chop and give a short description. That's it. Your special chop would start receiving lots of interesting comments from other chop lovers.</p>
            <p>To start posting your chops and viewing others' chops, register today.</p>
        </div>
    </div>
@stop
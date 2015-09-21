@extends('layouts.app')

@section('title')
    Terms of Service
@endsection

@section('custom-css')
    <link href="{!! asset('css/footer.css') !!}" rel="stylesheet" />
@endsection

@section('navbar')
    <div class="collapse navbar-collapse" id="global-nav">
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}"><b>Home</b></a></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <h1 class="rte-heading text-center">Terms of Service</h1>
    <div class="row">
        <div class="rte col-md-offset-2 col-md-8 col-sm-12 col-sm-offset-0">
            <p>These Terms of Service govern your access to and use of our Services and any information, text, graphics, photos or other materials uploaded, downloaded or appearing on the Services (collectively referred to as “<b>Content</b>”). Your access to and use of the Services are conditioned on your acceptance of and compliance with these Terms. By accessing or using the Services you agree to be bound by these Terms.</p>
            <h2>1. General Terms</h2>
            <p>1.1) You are responsible for your use of the Services, for any Content you post to the Services, and for any consequences thereof. Most Content you submit, post, or display through the Chopbox Services is public by default and will be able to be viewed by other users and through third party services and websites.</p>
            <p>1.2) You may not post images other than that of food.</p>
            <p>1.3) Images with the obvious intention of advertisement are prohibited.</p>
            <h2>Changes to terms</h2>
            <p>If we add or change our terms of use we will post those changes on this page. Registered users will be sent an email that outlines changes made to the terms of use.</p>
        </div>
    </div>

    @include('includes.footer')

@endsection
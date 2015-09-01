@extends('layouts.app')
@section('title')
    Help Center
@stop
@section('content')
    <div class="container">
        <div class="row tabbable">
            <div class="privacy-policy help-center">Welcome to ChopBox Help Center</div>
            <br/>
            <div class="col-md-3 span3 fixme">

                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#blog" data-toggle="tab">What is ChopBox?</a></li>
                    <li><a href="#photos" data-toggle="tab">How do I use ChopBox?</a></li>
                    <li><a href="#misc" data-toggle="tab">Frequently Asked Questions</a></li>
                </ul>
            </div>
            <div class="col-md-9 span8 well pull-right">
                <div class="tab-content">
                    <div id="blog" class="tab-pane active">
                        <h1 class="h1">What is ChopBox?</h1>
                        <hr/>
                        <p class="p1"><span class="s1"><h4>What's ChopBox?<br /></h4></span>Good question! Chopbox is a free social networking site that makes it easy for foodies to connect to each other and share that special meal they've had, jus had or about to have.</p>
                        <p class="p1"><span class="s1"><h4>Who is allowed to use ChopBox?<br /></h4></span>Everyone! Young, Old, Male, Female, Foodies and YOU!</p>
                        <p class="p1"><span class="s1"><h4>How much does it cost to register on ChopBox?<br /></h4></span>Chopbox is a free site and will never require that you pay to continue using the site. You do, however, have the option of paying for certain extra services to personalize your feel and usage of this site</p>
                    </div>
                    <div id="photos" class="tab-pane">
                        <h1 class="h1">How do I use ChopBox?</h1>
                        <hr/>
                        <p class="p1"><span class="s1"><h4>How do I sign up on ChopBox?<br /></h4></span>If you don't have a ChopBox account, you can sign up for one in a few steps: <br/><ol class="tips">
                            <li>Go to <a href="http://www.chopbox.com">www.chopbox.com.</a> </li>
                            <li>If you see the signup form, fill out your preferred username, email address and password then proceed to completing your registration by filling out other relevant information about yourself. If you don't see the form, click Sign Up, then fill out the form.</li>
                            <li>Click Sign Up.</li></ol>
                        <p class="p1"><span class="s1"><h4>What devices and browsers does it support?<br /></h4></span>ChopBox supports the latest versions of Safari (OS X and iOS), Chrome, Firefox, and Internet Explorer. Internet Explorer 9-11 are also supported. Opera Mini and Android's native Browser are not officially supported.</p>
                        <p class="p1"><span class="s1"><h4>How do I start using ChopBox?<br /></h4></span>
                            <ol class="tips">
                            <li>DISCOVER SOURCES: Find and follow others</li>
                            <li>It’s best to begin your journey by finding and following other interesting ChopBox accounts. Look for restaurants you love, people you know or celebrities. Tip: One great way to find more interesting accounts is see who those you know or admire are following and also by checking out the leaderboard to see the most active users.</li>
                            <li>CHECK YOUR TIMELINE: See what’s happening</li></ol>
                            Messages from those you follow will show up in a readable stream on your ChopBox homepage, called your “Homepage.” Once you’ve followed a few people, restaurants, organizations, or accounts of your interest, you’ll have a new page of information to read each time you log in. Click links in others’ Chops to view articles and images they’ve linked to.</p>
                        <p class="p1"><span class="s1"><h4>What is a Chop?<br /></h4></span>A Chop may contain photo(s) links and up to 255 characters of text about the certain food you ate, found out about or about to try.</p>
                        <p class="p1"><span class="s1"><h4>How do I post a Chop?<br /></h4></span>
                        <ol class="tips">
                            <li>Sign in to your ChopBox account.</li>
                            <li>Type your Chop into the box at the top of your Homepage.</li>
                            <li>Make sure your update is fewer than 255 characters.</li>
                            <li>Click the Post button to post the Chop to your profile.</li>
                            <li>You will immediately see your Chop on your homepage.</li></ol>
                        <p class="p1"><span class="s1"><h4>Can I upload multiple images at a time for just one Chop?<br /></h4></span>Yes! You can upload more than one image for a certain chop but a maximum of four images are allowed for each chop.</p>
                    </div>
                    <div id="misc" class="tab-pane">
                        <h1 class="h1">Frequently Asked Questions</h1>
                        <hr/>
                        <p class="p1"><span class="s1"><h4>Can I upload multiple images at a time for just one Chop?<br /></h4></span>Yes! You can upload more than one image for a certain chop but a maximum of four images are allowed for each chop.</p>
                        <p class="p2"><strong><span class="s1"><h4>How do I follow a user?<br /></h4></span></strong>
                        <ol class="tips">
                            <li>Click on a username or navigate to a user's profile.</li>
                            <li>Click the Follow button when you see it on the user's profile page to the left of the users chops located at the last line of the user's profile.</li>
                            <li>You can also click the Follow button next to any of the users on the Leaderboard, next to user search results, or anywhere else you see the Follow button on the site.</li></ol>
                    </div>
                </div><!--/.tab-content-->
            </div><!--/.span8-->
        </div><!--/.row-->
    </div><!--/.container-->

@endsection

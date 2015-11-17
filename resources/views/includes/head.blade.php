<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">

<title>ChopBox | @yield('title')</title>

<!-- styles -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css' />
<link href="{!! asset('css/toolkit.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/application.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/homepage.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css" type="text/css">
@yield('custom-css')

<link href="{!! asset('font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />

<style>
    /* note: this is a hack for ios iframe for bootstrap themes shopify page */
    /* this chunk of css is not part of the toolkit :) */
    body {
        width: 1px;
        min-width: 100%;
        width: 100%;
    }

</style>
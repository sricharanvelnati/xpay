<!doctype html>
<!-- <html dir="ltr" lang="en-US"> -->
<html dir="ltr" lang="{{ app()->getLocale() }}">
  <head>
    <title>X-Pay</title>
    <link type="image/x-icon" rel="shortcut icon" href="{{URL::to('public/Frontassets/images/favicon.ico')}}" />
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
  		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  		header("Cache-Control: post-check=0, pre-check=0", false);
  		header("Pragma: no-cache");
  	?>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/all.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/jquery.fancybox.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/owl.carousel.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/dropdown.css')}}" />
{{--    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/floating-labels.css')}}" />--}}
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/styles.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/responsive.css')}}" />
    @yield('assets')
    </head>
  <body>    
    <?php
        function chk_active($p){
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($actual_link, $p) !== false) {
                return true;
            }
            else{
                return false;
            }
        }
    ?>
@include('Includes.Frontend.header')
<div class="main">
	@yield('content')
</div>
@include('Includes.Frontend.footer')

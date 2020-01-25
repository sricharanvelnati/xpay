<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{URL::to('public/img/favicon.ico')}}">

    <title>@yield('title')</title>

	<?php
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
	?>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('public/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::to('public/Adminassets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
	<!--select 2-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/select2/css/select2.min.css')}}"/>
	<!--dynamic table-->
    <link href="{{URL::to('public/Adminassets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{URL::to('public/Adminassets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::to('public/Adminassets/data-tables/DT_bootstrap.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" />

    <!-- Custom styles for this template -->

    <link href="{{URL::to('public/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('public/css/style-responsive.css')}}" rel="stylesheet" />
    @yield('assets')
	 <script type="text/javascript">
        var site_url='<?=URL::to('/')."/"?>';
    </script>

  </head>

  <!-- <body oncontextmenu="return false;"> -->
<body>
  <section id="container">
      <!--header start-->
      <header class="header white-bg">
        @include('Includes.Admin.header')
      </header>
      <!--header end-->
      <!--sidebar start-->
      @include('Includes.Admin.sidebar')
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            @yield('content')
          </section>
      </section>
      <!--main content end-->
  </section>

@include('Includes.Admin.footer')

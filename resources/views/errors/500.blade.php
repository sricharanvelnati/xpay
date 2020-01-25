<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UBank</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('public/Frontassets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Your custom styles (optional) -->
    <link href="{{URL::asset('public/Frontassets/css/styles.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('public/Frontassets/css/responsive.css')}}" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/png" href="{{URL::asset('public/favicon.ico')}}"/>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
<div class="container">
    <div class="errorpage">
        <div  class="error">
            <div class="logo">
                <img alt="" src="{{URL::to('public/Frontassets/images/logo.png')}}"/>
            </div>
            <p class="p">5</p>
            <p class="p">0</p>
            <p class="p">0</p>
            <p class="p">!</p>

            <div class="page-ms">
                <p class="page-msg"> Oops, the page you're looking for Disappeared </p>
                <a href="#" onclick="window.history.back()" class="go-back">Go Back</a>
            </div>
        </div>

    </div>
</div>

<!-- SCRIPTS -->
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script  src="{{URL::asset('public/Frontassets/js/bootstrap.min.js')}}"></script>

</body>

</html>

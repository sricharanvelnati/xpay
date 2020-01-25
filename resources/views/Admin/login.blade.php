<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
      <link rel="shortcut icon" href="{{URL::to('public/img/favicon.jpg')}}">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::to('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('public/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::to('public/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{URL::to('public/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('public/css/style-responsive.css')}}" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="post" action="{{ $url }}">
        <h2 class="form-signin-heading">sign in now</h2>
		 @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
    		<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    		@endif
    	  @endforeach

		   @if(!empty($errors->all()))
                   <div class="alert alert-danger">
                       @foreach($errors->all() as $error)
                           <span> {{ $error }} </span>
                       @endforeach
                   </div>
               @endif

        <div class="login-wrap">
			{{ csrf_field() }}
            <input type="email" name="username" class="form-control" placeholder="Email" autofocus required >
            <input type="password" name="password" class="form-control" placeholder="Password" required >
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
			
			<div class="form-group">
             <a class="reset_pass" href="{{route('password.request')}}" style="float: right;">Forgot password?</a> 
            </div>
        </div>
		
		
      </form>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{URL::to('public/js/jquery.js')}}"></script>
    <script src="{{URL::to('public/js/bootstrap.bundle.min.js')}}"></script>


  </body>


</html>

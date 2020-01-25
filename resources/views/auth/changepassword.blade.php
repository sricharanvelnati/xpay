<!doctype html>
<html dir="ltr" lang="{{ app()->getLocale() }}">
  <head>
    <title>Login</title>
    <link type="image/x-icon" rel="shortcut icon" href="{{URL::to('public/Frontassets/images/favicon.ico')}}" />
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/all.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/bootstrap.min.css')}}" />
{{--      <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/floating-labels.css')}}" />--}}
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/styles.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/responsive.css')}}" />
    <script type="text/javascript">
      var APP_URL = {!! json_encode(url('/')) !!}
    </script>
  </head>
  <body class="login-page login-bg">
  	<header>
  		<!-- <div class="container">
  			<div class="row">
	  			<div class="col-sm-12">
  					<div class="d-flex flex-wrap align-items-center">
			  			<a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" /></a>
              <div class="dropdown ml-auto">
                <span class="btn btn-primary dropdown-toggle" id="lang-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
                <div class="dropdown-menu" aria-labelledby="lang-drop">
                  <a class="dropdown-item lang" href="{{ url('locale/en') }}" data-id="English">English</a>
                  <a class="dropdown-item lang" href="{{ url('locale/ch') }}" data-id="Chinese">中文</a>
                </div>
              </div>
					</div>
				</div>
			</div>
  		</div> -->
      <!-- new start -->
      <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" alt="logo"></a>
            <a class="navbar-toggler ml-auto"  data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span></span></a>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav text-uppercase ml-auto align-items-center">
               <li class="nav-item">
                <div class="dropdown">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    {{Auth::user()->first_name}}
                  </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{URL::to('card/dashboard')}}">{{ __('header.Dashboard') }}</a>
                  <a class="dropdown-item" href="{{URL::to('profile')}}">{{ __('header.Profile') }}</a>
                  <a class="dropdown-item" href="{{URL::to('changePassword')}}">{{ __('header.Change_Password') }}</a>
                  <a class="dropdown-item" href="{{URL::to('2fa')}}">{{ __('header.2FA_Settings') }}</a>
                  @if(Auth::check() && Auth::user()->is_kyc_approved == 0)
                  <a class="dropdown-item" href="{{URL::to('card/kyc')}}">{{ __('header.Complete_KYC') }}</a>
                  @endif
                  <!-- <a class="dropdown-item" href="{{URL::to('logout')}}">{{ __('header.LogOut') }}</a> -->
                  <a class="dropdown-item" href="{{URL::to('front-logout')}}">{{ __('header.LogOut') }}</a>
                </div>
              </div>
            </li>
                <li class="nav-item">
                  <div class="dropdown ml-auto">
                    <button type="button" class="btn btn-primary dropdown-toggle" id="lang-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu" aria-labelledby="lang-drop">
                      <a class="dropdown-item lang" href="{{ url('locale/en') }}" data-id="English">English</a>
                      <a class="dropdown-item lang" href="{{ url('locale/ch') }}" data-id="Chinese">中文</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
      </nav>
      <!-- new end -->
  	</header>
  	<div class="login-wrap main pt-4" >
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-8 col-md-8 col-lg-4">
		  			<h2 class="secondary-title">{{ __('auth.Change Current Password') }}</h2>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                  @csrf
						<div class="form-group form-label-group c-password{{ $errors->has('current-password') ? ' has-error' : '' }} ">

                  <input id="current-password" type="password" class="form-control" name="current-password" required>
                  <label for="new-password" class="control-label">{{ __('auth.Current Password') }}</label>
                  @if ($errors->has('current-password'))
                      <span class="help-block">
                      <strong>{{ $errors->first('current-password') }}</strong>
                  </span>
                  @endif
						</div>
						<div class="form-group form-label-group c-password{{ $errors->has('new-password') ? ' has-error' : '' }}">
                  <input id="new-password" type="password" class="form-control" name="new-password" required>
                  <label for="new-password" class="control-label">{{ __('auth.New Password') }}</label>
                  @if ($errors->has('new-password'))
                      <span class="help-block">
                      <strong>{{ $errors->first('new-password') }}</strong>
                  </span>
                  @endif
						</div>
            <div class="form-group form-label-group c-password">
                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                <label for="new-password-confirm" class="control-label">{{ __('auth.Confirm New Password') }}</label>
            </div>
						<div class="mt-md-5">
              <button type="submit" class="btn btn-primary">
                  {{ __('auth.Change Password') }}
              </button>
						</div>
					</form>
  				</div>
  			</div>
  		</div>
  	</div>
    <!-- Optional JavaScript -->
    <script src="{{URL::to('public/Frontassets/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('public/Frontassets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::to('public/Frontassets/js/custom.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        var local = '{{app()->getLocale()}}';
          if(local === 'en'){
              $('#lang-drop').text('English');
          } else {
              $('#lang-drop').text('中文');
          }
      });
    </script>
  </body>
</html>

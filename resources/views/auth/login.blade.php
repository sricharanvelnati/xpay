<!doctype html>
<html dir="ltr" lang="{{ app()->getLocale()}}">
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
  		<div class="container">
  			<div class="row">
	  			<div class="col-sm-12">
  					<div class="d-flex flex-wrap align-items-center">
			  			<a class="navbar-brand " href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" /></a>
              <div class="dropdown ml-auto">
                <button type="button" class="btn btn-primary dropdown-toggle" id="lang-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="lang-drop">
                  <a class="dropdown-item lang" href="{{ url('locale/en') }}" data-id="English">English</a>
                  <a class="dropdown-item lang" href="{{ url('locale/ch') }}" data-id="Chinese">中文</a>
                </div>
              </div>
					</div>
				</div>
			</div>
  		</div>
  	</header>
  	<div class="login-wrap main pt-4" >
  		<div class="container">
        @if(Session::has('message'))
        	<div class="alert alert-warning alert-dismissible">
        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        		{!! session('message') !!}
        	</div>
        @endif
  			<div class="row">
  				<div class="col-sm-8 col-md-8 col-lg-4">
		  			<h2 class="secondary-title">{{ __('auth.login') }}<small>{{ __('auth.Don’t have an account?') }}<a href="{{URL::to('register')}}">{{ __('auth.Create a account.') }}</a></small></h2>
              <form method="POST" action="{{ route('login') }}" class="login-main-page">
                @if(!empty($errors->all()))
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <span> {{ $error }} </span>
                    @endforeach
                  </div>
                @endif
                  @csrf
						<div class="form-group form-label-group ">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('auth.Email Address') }}" autofocus>
							<label for="email">{{ __('auth.Email Address') }}</label>
						</div>
						<div class="form-group form-label-group c-password">
						  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('auth.Password') }}" autocomplete="current-password">
							<label for="password">{{ __('auth.Password') }}</label>
							<img src="{{URL::to('public/Frontassets/images/password-show.svg')}}" alt="Eye" class="toggle-password" toggle="#password-field"/>
						</div>
            <!-- <div class="form-group form-label-group">
              <p>{{__('dashboard.2fa')}}</p>
              <input type="text" name="2fa" class="fa-input" id="twofa" autocomplete="off"/>
						</div> -->
            <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} autocomplete="off">
            <label class="custom-control-label txt-white" for="remember">{{ __('auth.Remember Me') }}</label>
           </div>
						<div class="mt-md-5">
              <button type="submit" class="btn btn-primary">
                  {{ __('auth.Login') }}
              </button>
						</div>
            <div class="form-group">
              @if(Route::has('password.request'))
                  <a class="mt-3 d-inline-block" href="{{ route('password.request') }}">
                      {{ __('auth.Forgot Your Password?') }}
                  </a>
              @endif
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
    <!-- <script type="text/javascript" src="{{URL::to('public/Frontassets/js/bootstrap-pincode-input.js')}}"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
        var local = '{{app()->getLocale()}}';
          if(local === 'en'){
              $('#lang-drop').text('English');
          } else {
              $('#lang-drop').text('中文');
          }
        //   $('.fa-input').pincodeInput({hideDigits:false,inputs:6,complete:function(value, e, errorElement){
        //   },
    		// 	keydown : function(e){
    		// 			if(e.keyCode == 8){
    		// 				$(e.className).val('');
    		// 			}
    		// 			else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
    		// 				$(e.className).val('');
    		// 			} else {
    		// 				 e.preventDefault();
    		// 			}
    		// 		},
    		// });
      });
    </script>
  </body>
</html>

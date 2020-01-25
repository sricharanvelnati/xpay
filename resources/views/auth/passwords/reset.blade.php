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
	  			<div class="col-sm-8 col-md-8 col-lg-5">
  					<div class="d-flex flex-wrap align-items-center">
			  			<a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" /></a>
			  			<select class="lang-drop ml-auto">
  							<option>English</option>
  							<option>Chinese</option>
  						</select>
					</div>
				</div>
			</div>
  		</div>
  	</header>
  	<div class="login-wrap main pt-4" >
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-8 col-md-8 col-lg-4">
		  			<h2 class="secondary-title">Enter Registered Email Address And Set New Password</h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
              <form  method="POST" action="{{ route('password.update') }}">
                @if(!empty($errors->all()))
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <span> {{ $error }} </span>
                    @endforeach
                  </div>
                @endif
                  @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
						<div class="form-group form-label-group">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
							<label for="emailadd">{{ __('E-Mail Address') }}</label>
						</div>
            <div class="form-group form-label-group">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="emailadd">{{ __('Password') }}</label>
            </div>
            <div class="form-group form-label-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
            </div>
						<div class="mt-md-5">
              <button type="submit" class="btn btn-primary">
                  {{ __('Reset Password') }}
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
  </body>
</html>

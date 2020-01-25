<!doctype html>
<html dir="ltr" lang="{{ app()->getLocale() }}">
  <head>
    <title>Signup</title>
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
    <!-- country code css -->
    <link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/intlTelInput.css')}}">
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
			  			<a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" /></a>
              <div class="dropdown ml-auto">
                <button type="button" class="btn btn-primary dropdown-toggle" id="lang-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div  class="dropdown-menu" aria-labelledby="lang-drop">
                  <a class="dropdown-item lang" href="{{ url('locale/en') }}" data-id="English">English</a>
                  <a class="dropdown-item lang" href="{{ url('locale/ch') }}" data-id="Chinese">中文</a>
                </div>
              </div>
					</div>
				</div>
			</div>
  		</div>
  	</header>
  	<div class="login-wrap main">
  		<div class="container">
  			<div class="row">
  				<div class="col-12 col-sm-12 col-md-8 col-lg-5 col-xl-4 mt-md-4">
		  			<h2 class="secondary-title">{{ __('auth.Create a new Account') }}<small>{{ __('auth.You have an account?') }}<a href="{{URL::to('login')}}">{{ __('auth.Login account.') }}</a></small></h2>
		  			<form method="POST" action="{{ route('register') }}" autocomplete="off">
                @csrf
              @if(!empty($errors->all()))
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <span> {{ $error }} </span></br>
                  @endforeach
                </div>
              @endif

              <div class="form-row">
    						<div class="form-group form-label-group col-sm-6">
    							<input type="text" class="form-control" id="firstname" name="first_name" value="{{ old('first_name') }}" placeholder="{{ __('auth.First Name') }}">
    							<label for="firstname">{{ __('auth.First Name') }}</label>
    						</div>

                <div class="form-group col-sm-6 form-label-group">
                  <input type="text" class="form-control" id="lastname" name="last_name" value="{{ old('last_name') }}" placeholder="{{ __('auth.Last Name') }}">
                  <label for="lastname">{{ __('auth.Last Name') }}</label>
                </div>
              </div>
                <div class="form-row">
                <div class="form-group col-sm-12">
                  <input type="tel" id="phone" class="form-control" name="contactNumber" value="{{ old('contactNumber') }}" placeholder="{{ __('auth.phone') }}">
                  <input type="hidden" id="countryCode" class="form-control" name="countryCode" value="{{ old('countryCode') }}">
                  <input type="hidden" id="countryName" class="form-control" name="countryName" value="{{ old('countryName') }}">
                  <!-- <label for="phone">{{ __('auth.phone') }}</label> -->
                </div>
                </div>
              <div class="form-group form-label-group">
                <input type="email" class="form-control" id="email-field" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.Email Address') }}">
                <label for="email-field">{{ __('auth.Email Address') }}</label>
              </div>
  						<div class="form-group form-label-group">
  							<input type="password" class="form-control" id="password-field" name="password" placeholder="{{ __('auth.Password') }}">
  							<label for="password-field">{{ __('auth.Password') }}</label>
						  </div>
              <div class="form-group form-label-group">
                <input type="password" class="form-control" id="password-field2" name="password_confirmation" placeholder="{{ __('auth.Repeat Password') }}">
                <label for="password-field2">{{ __('auth.Repeat Password') }}</label>
              </div>
              <div class="form-row">
              <div class="form-group col-sm-12">
                <p><b>{{__('auth.mailing')}}</b></p>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group form-label-group col-sm-12">
                <input type="text" class="form-control" name="address1" id="address1" value="{{ old('address1') }}" placeholder="{{__('auth.address1')}}">
                <label for="address1">{{__('auth.address1')}}</label>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group form-label-group col-sm-12">
                <input type="text" class="form-control" name="address2" id="address2" value="{{ old('address2') }}" placeholder="{{__('auth.address2')}}">
                <label for="address2">{{__('auth.address2')}}</label>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group form-label-group col-sm-12">
                <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}" placeholder="{{__('auth.city')}}">
                <label for="city">{{__('auth.city')}}</label>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group form-label-group col-sm-12">
                <input type="text" class="form-control" name="state" id="state" value="{{ old('state') }}" placeholder="{{__('auth.state')}}">
                <label for="state">{{__('auth.state')}}</label>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group form-label-group col-sm-12">
                <input type="text" class="form-control" name="pincode" id="pincode" value="{{ old('pincode') }}" placeholder="{{__('auth.pincode')}}">
                <label for="pincode">{{__('auth.pincode')}}</label>
              </div>
              </div>
              <div class="form-row">
              <div class="form-group form-label-group col-sm-12">
                <input type="text" class="form-control" name="d_country" id="d_country" value="{{ old('d_country') }}" placeholder="{{__('auth.country')}}">
                <label for="d_country">{{__('auth.country')}}</label>
              </div>
              </div>
						<button type="submit" class="btn btn-primary">{{ __('auth.Create a Account') }}</button>
					</form>
  				</div>
  			</div>
  		</div>
  	</div>
<!-- Optional JavaScript -->
<script src="{{URL::to('public/Frontassets/js/jquery.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/bootstrap.bundle.min.js')}}"></script>
<!-- country code js -->
<script src="{{URL::to('public/Frontassets/js/intlTelInput.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/utils.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/custom.js')}}"></script>

<script type="text/javascript">

$(document).ready(function(){

// multi language start
  var local = '{{app()->getLocale()}}';
    if(local === 'en'){
        $('#lang-drop').text('English');
    } else {
        $('#lang-drop').text('中文');
    }
//multi language end

// country code start
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
      utilsScript: "utils.js",
    });
    iti.setCountry($('#countryName').val());
	input.addEventListener("countrychange", function() {
	  var countryData = iti.getSelectedCountryData();
		$('#countryCode').val(countryData.dialCode);
		$('#countryName').val(countryData.iso2);
	});
// country code end

});

</script>
  </body>
</html>

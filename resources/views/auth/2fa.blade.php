@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-body">
<div class="panel-heading"><p>{{ __('auth.Setup Two Factor Authentication') }}</p></div>
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
<p>1. {{ __('auth.Install the Google Authenticator application on your Mobile.') }}</p>
<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank"><img src="{{URL::to('public/Frontassets/images/google-store.png')}}"></a>
<a href="https://itunes.apple.com/in/app/google-authenticator/id388497605?mt=8" target="_blank"><img src="{{URL::to('public/Frontassets/images/apple-store.png')}}"></a>
<p style="margin: 15px 0;">OR</p>
<p>{{__('auth.Install Authy application on your Mobile.')}}</p>
<a href="https://play.google.com/store/apps/details?id=com.authy.authy&hl=en" target="_blank"><img src="{{URL::to('public/Frontassets/images/google-store.png')}}"></a>
<a href="https://apps.apple.com/us/app/authy/id494168017" target="_blank"><img src="{{URL::to('public/Frontassets/images/apple-store.png')}}"></a>
<p>2. {{ __('auth.Scan this QR Code From within the Google Authenticator application.') }}</p>
<img src="<?=$data['google2fa_url']?>" alt="image">
<br/><br/>
@if(!Auth::user()->google2fa_enable)
<p>3. {{ __('auth.Enter the pin the code to Enable 2FA.') }}</p>
<form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
{{ csrf_field() }}
<div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
<label for="verify-code" class="col-md-4 control-label">{{ __('auth.Authenticator Code') }}</label>
<div class="row">
<div class="col-md-12 fa-form">
<input id="verify-code" type="text" class="pincode-input2"  name="verify-code" required>
@if ($errors->has('verify-code'))
<span class="help-block">
<strong>{{ $errors->first('verify-code') }}</strong>
</span>
@endif
</div>
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
{{ __('auth.Enable 2FA') }}
</button>
</div>
</div>
</form>
@elseif(Auth::user()->google2fa_enable)
<div class="alert alert-success">
{{ __('auth.2FA is Currently') }} <strong> {{ __('auth.Enabled') }}</strong> {{ __('auth.for your account.') }}
</div>
<p>3. {{ __('auth.Enter the 6-Digit code given by the Google Authenticator Application.') }}</p>
<form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
<label for="change-password" class="col-md-4 control-label">{{ __('auth.Current Password') }}</label>
<div class="col-md-6">
<input id="current-password" type="password" class="form-control" name="current-password" required>
@if ($errors->has('current-password'))
<span class="help-block">
<strong>{{ $errors->first('current-password') }}</strong>
</span>
@endif
</div>
</div>
<div class="col-md-6 col-md-offset-5">
{{ csrf_field() }}
<button type="submit" class="btn btn-primary btn-disable">{{ __('auth.Disable 2FA') }}</button>
</form>
<!-- <form method="get" action="{{URL::to('terms')}}"> -->
<div class="next-button">
<form method="get" action="{{URL::to('card/kyc')}}">
<button type="submit" class="btn btn-primary">{{ __('auth.Next') }}</button>
</form>
</div>
</div>
@endif
</div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/Frontassets/js/bootstrap-pincode-input.js')}}"></script>
<script>
  $(document).ready(function() {
      $('.pincode-input2').pincodeInput({hideDigits:false,inputs:6,complete:function(value, e, errorElement){
      },
      keydown : function(e){
					if(e.keyCode == 8){
						$(e.className).val('');
					}
					else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
						$(e.className).val('');
					} else {
						 e.preventDefault();
					}
				},
    });
  });
</script>
@endsection

@extends('layouts.app')
@section('title', 'Profile')
@section('assets')
<!-- country code css -->
<link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/intlTelInput.css')}}">
@endsection
@section('content')
<div class="login-wrap main">
  <div class="container">
    @if(Session::has('message'))
    	<div class="alert alert-warning alert-dismissible">
    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    		{!! session('message') !!}
    	</div>
    @endif
    <div class="row">
      <div class="col-12 col-sm-12 col-md-8 col-lg-5 col-xl-4 mt-md-4">
        <h2 class="secondary-title">{{ __('auth.Edit Your Profile') }}</h2>
        <form method="POST" action="{{ URL::to('front/storeProfile') }}" autocomplete="off">
          @if(!empty($errors->all()))
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                <span> {{ $error }} </span></br>
              @endforeach
            </div>
          @endif
          @csrf
          <div class="form-row">
            <div class="form-group form-label-group col-sm-6">
              <input type="text" class="form-control" id="firstname" name="first_name" value="{{Auth::user()->first_name}}" placeholder="{{ __('auth.First Name') }}"  required>
              <label for="firstname">{{ __('auth.First Name') }}</label>
            </div>
            <div class="form-group col-sm-6 form-label-group">
              <input type="text" class="form-control" id="lastname" name="last_name" value="{{Auth::user()->last_name}}" required>
              <label for="lastname">{{ __('auth.Last Name') }}</label>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group form-label-group col-sm-12">
              <input type="tel" id="phone" class="form-control" name="contactNumber" value="{{Auth::user()->contactNumber}}" required>
              <input type="hidden" id="countryCode" class="form-control" name="countryCode" value="{{Auth::user()->countryCode}}" required>
              <input type="hidden" id="countryName" class="form-control" name="countryName" value="{{Auth::user()->countryName}}" required>
            </div>
            </div>
          <div class="form-group form-label-group">
            <input type="email" class="form-control" id="email-field" name="email" value="{{Auth::user()->email}}" disabled>
            <label for="email-field">{{ __('auth.Email Address') }}</label>
          </div>
          <div class="form-row">
          <div class="form-group col-sm-12">
            <p><b>{{__('auth.mailing')}}</b></p>
          </div>
          </div>
          <div class="form-row">
          <div class="form-group form-label-group col-sm-12">
            <input type="text" id="address1" class="form-control" name="address1" value="{{Auth::user()->address1}}" required>
            <label for="address1">{{__('auth.address1')}}</label>
          </div>
          </div>
          <div class="form-row">
          <div class="form-group form-label-group col-sm-12">
            <input type="text" id="address2" class="form-control" name="address2" value="{{Auth::user()->address2}}">
            <label for="address2">{{__('auth.address2')}}</label>
          </div>
          </div>
          <div class="form-row">
          <div class="form-group form-label-group col-sm-12">
            <input type="text" id="city" class="form-control" name="city" value="{{Auth::user()->city}}" required>
            <label for="city">{{__('auth.city')}}</label>
          </div>
          </div>
          <div class="form-row">
          <div class="form-group form-label-group col-sm-12">
            <input type="text" id="state" class="form-control" name="state" value="{{Auth::user()->state}}" required>
            <label for="state">{{__('auth.state')}}</label>
          </div>
          </div>
          <div class="form-row">
          <div class="form-group form-label-group col-sm-12">
            <input type="text" id="pincode" class="form-control" name="pincode" value="{{Auth::user()->pincode}}" required>
            <label for="pincode">{{__('auth.pincode')}}</label>
          </div>
          </div>
          <div class="form-row">
          <div class="form-group form-label-group col-sm-12">
            <input type="text" id="d_country" class="form-control" name="d_country" value="{{Auth::user()->d_country}}" required>
            <label for="d_country">{{__('auth.country')}}</label>
          </div>
          </div>
        <button type="submit" class="btn btn-primary" onclick="">{{ __('auth.Edit Profile') }}</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<!-- country code js -->
<script src="{{URL::to('public/Frontassets/js/intlTelInput.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/utils.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){

  // country code start
      var input = document.querySelector("#phone");
      var iti = window.intlTelInput(input, {
        utilsScript: "utils.js",
      });
      iti.setCountry($('#countryName').val());

  	input.addEventListener("countrychange", function() {
  	  var countryData = iti.getSelectedCountryData();
      console.log(countryData);
  		$('#countryCode').val(countryData.dialCode);
      $('#countryName').val(countryData.iso2);
  	});
  // country code end

  });
</script>
@endsection

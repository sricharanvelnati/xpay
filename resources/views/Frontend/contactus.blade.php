@extends('layouts.app')
@section('title', 'Contact Us')
@section('assets')
<!-- country code css -->
<link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/intlTelInput.css')}}">
@endsection
@section('content')
<div class="main">
	<section>
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-8 col-lg-6 mb-5 mb-md-0">
					<h2 class="title-blue-lg mb-0">{{ __('contact.Contact Us') }}</h2>
					<p>{{ __('contact.We are always here to help out whatever way we can') }}</p>
					<form id="contact-form" method="post" action="{{ URL::to('contact/store') }}" enctype="multipart/form-data">
						@if(!empty($errors->all()))
	            <div class="alert alert-danger">
	              @foreach($errors->all() as $error)
	                <span> {{ $error }} </span></br>
	              @endforeach
	            </div>
	          @endif
						@csrf
            <div class="form-group form-label-group">
                <input type="text" name="name" class="form-control" id="fname" placeholder="{{ __('contact.Name') }}" required>
                <label for="fname">{{ __('contact.Name') }}</label>
            </div>
						<div class="form-group form-label-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="{{ __('contact.Email') }}" required>
                <label for="email">{{ __('contact.Email') }}</label>
            </div>
            <div class="form-row">
								<div class="form-group  col-sm-12">
									<input type="tel" id="phone" class="form-control" name="phoneNumber" value="" placeholder="{{ __('contact.phone') }}" required>
		              <input type="hidden" id="countryCode" class="form-control" name="countryCode" value="1">
		              <input type="hidden" id="countryName" class="form-control" name="countryName" value="us">
								</div>
            </div>
            <div class="form-group form-label-group">
                <input type="text" class="form-control" id="comment" name="message" placeholder="Comment" placeholder="{{ __('contact.Comment') }}" required>
                <label for="comment">{{ __('contact.Comment') }}</label>
            </div>
            <div class="form-row">
                <div class="form-group col-10 form-label-group" style="pointer-events: none;">
                    <input type="text" class="form-control" id="browse" placeholder="{{ __('contact.Browse') }}">
                    <label for="browse">{{ __('contact.Browse') }}</label>
                </div>
                <div class="form-group  col-2 cstm-upload-btn">
                    <input type="file" id="browsemain" name="imagefile" placeholder="{{ __('contact.Browse') }}">
                    <label for="browsemain"><img src="{{URL::to('public/Frontassets/images/upload-btn.svg')}}"></label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('contact.Send a message') }}</button>
        </form>
				</div>
				<div class="col-md-4 col-lg-4 single-img text-center">
					<img src="{{URL::to('public/Frontassets/images/contact-bg.png')}}" alt="Contact Image">
				</div>
			</div>
		</div>
	</section>
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

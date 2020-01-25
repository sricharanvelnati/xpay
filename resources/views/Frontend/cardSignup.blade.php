@extends('layouts.app')
@section('title', 'UBank')
@section('assets')
<link rel="stylesheet" href="{{URL::to('public/Frontassets/css/jquery.ccpicker.css')}}">
@endsection
@section('content')
@if(Session::has('message'))
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! session('message') !!}
	</div>
@endif
<div class="main">
	<section>
		<div class="container">
			<div class="text-center">
				<ul class="app-nav">
					<li class="loading">
						<span></span>
						<label>{{ __('card.Sign up') }}</label>
					</li>
					<li>
						<span></span>
						<label>{{ __('card.Receive the card') }}</label>
					</li>
					<li>
						<span></span>
						<label>{{ __('card.Verify the card') }}</label>
					</li>
					<li>
						<span></span>
						<label>{{ __('card.Load the card') }}</label>
					</li>
				</ul>
			</div>
			<h2 class="secondary-title">{{ __('card.Debit card application form') }}<small>{{ __('card.Fill All detail are compulsory') }}</a></small></h2>
			<div class="row justify-content-between no-list">
				<div class="col-xl-4 col-lg-5 col-md-6 mb-4 mb-md-0">
					<form method="POST" action="{{ URL::to('card/signup') }}" enctype="multipart/form-data">
						@if(!empty($errors->all()))
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
									<span> {{ $error }} </span>
								@endforeach
							</div>
						@endif
						@csrf
              <div class="form-row">
                  <div class="form-group form-label-group col-sm-6">
                      <input type="text" class="form-control" id="firstname" name="first_name" value="{{Auth::user()->first_name}}" readonly>
                      <label for="firstname">{{ __('auth.First Name') }}</label>
                  </div>
                  <div class="form-group col-sm-6 form-label-group">
                      <input type="text" class="form-control" id="lastname" name="last_name" value="{{Auth::user()->last_name}}" readonly>
                      <label for="lastname">{{ __('auth.Last Name') }}</label>
                  </div>
              </div>
							<div class="form-row">
	            <div class="form-group form-label-group col-sm-12">
	              <input type="tel" id="phoneField" class="form-control" name="contactNumber" value="{{Auth::user()->contactNumber}}" readonly>
	            </div>
	            </div>
              <div class="form-group form-label-group">
                  <input type="email" class="form-control" id="email-field" name="email" value="{{Auth::user()->email}}" readonly>
                  <label for="email-field">{{ __('auth.Email Address') }}</label>
              </div>
              <div class="form-row">
                  <div class="form-group form-label-group col-4">
					<select id="sources" name="docType" class="custom-select sources" placeholder="Source Type">
					<option value="passport">Passport</option>
					<option value="licence">Driving Licence</option>
					<option value="nationalId">National Id</option>
					</select>
                  </div>
                  <div class="form-group col-8 form-label-group">
                      <input type="text" class="form-control" id="pass_no" name="proofNumber">
                      <label for="pass_no">{{ __('card.No.') }}</label>
                  </div>
              </div>
				</div>
				<div class="col-xl-4 col-lg-5 col-md-6">
					<div class="upload-sec">
						<p>{{ __('card.Passport Bio page') }}</p>
						<div class="cstm-upload">
							<input type="file" name="bioPage" id="passport-page" />
							<label for="passport-page" class="btn btn-primary">{{ __('card.Upload') }}</label>
						</div>
					</div>
					<div class="upload-sec">
						<p>{{ __('card.Passport signed page') }}<small>({{ __('card.If not shoes on the Bio page') }})</small></p>
						<div class="cstm-upload">
							<input type="file" name="signPage" id="passport-signed"/>
							<label for="passport-signed" class="btn btn-primary">{{ __('card.Upload') }}</label>
						</div>
					</div>
					<div class="signature">
						<label>{{ __('card.Signature') }}</label>
					</div>
					<div class="cstm-confirm">
						<input type="checkbox" name="agree" id="form-confirm">
						<label for="form-confirm">{{ __('card.check') }}</label>
					</div>
				</div>
			</div>
			<h5 class="mt-3">{{ __('card.link') }}<a href="{{URL::to('profile')}}"> {{__('card.here')}}.</a></h2>
			<div class="mt-3 mt-md-5 text-center">
				<button type="cancel" class="btn btn-primary mx-2">{{ __('card.Back') }}</button>
				<button type="submit" class="btn btn-primary mx-2">{{ __('card.Next') }}</button>
			</div>
			<!-- sum sub start -->

			<!-- sum sub end -->
			</form>
		</div>
	</section>
</div>
@endsection
@section('script')
<script src="{{URL::to('public/Frontassets/js/jquery.ccpicker.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#phoneField").CcPicker({
     "countryCode" : "us",
     "setCountryByCode" : "us",
     dataUrl : "<?= url('/').'/data.json'?>"
   });
});
</script>
@endsection

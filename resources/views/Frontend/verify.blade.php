@extends('layouts.app')
@section('title', 'Verify Card')
@section('content')
<div class="main">
	<section>
		<div class="container">
			<div class="text-center">
				<ul class="app-nav">
					<li class="app-sucess">
						<span></span>
						<label>{{__('verify.signup')}}</label>
					</li>
					<li class="app-sucess">
						<span></span>
						<label>{{__('verify.recieve')}}</label>
					</li>
					<li class="loading">
						<span></span>
						<label>{{__('verify.verify')}}</label>
					</li>
					<li>
						<span></span>
						<label>{{__('verify.load')}}</label>
					</li>
				</ul>
			</div>
			<div class="text-center">
				@if(Session::has('message'))
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						{!! session('message') !!}
					</div>
				@endif
				<form action="{{URL::to('card/verifing')}}" method="post">
					@csrf
					@if(!empty($errors->all()))
						<div class="alert alert-danger">
							@foreach($errors->all() as $error)
								<span> {{ $error }} </span>
							@endforeach
						</div>
					@endif
				<img src="{{URL::to('public/Frontassets/images/verify-card.png')}}" alt="Verify">
				<p>{{__('verify.t1')}}<br/>{{__('verify.t2')}}</p>
				<div class="card-no ">
					<div class="form-group">
						<div class="row">
						<div class="col-lg-12">
						<input type="text" name="cardNumber" id="cardNumber" maxlength="16" minlength="16" class="form-control pincode-input2" autocomplete="off" placeholder="{{__('verify.placeholder1')}}">
						<label for="cardNumber" class="txt-white mt-3">{{__('verify.placeholder1')}}</label>
					</div>
				</div>
					</div>
				</div>
				<div class="mt-3 mt-md-5 text-center">
					<button type="submit" class="btn btn-primary">{{__('verify.b1')}}</button>
				</div>
			</form>
			</div>
		</div>
	</section>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/Frontassets/js/bootstrap-pincode-input.js')}}"></script>
<script>
  $(document).ready(function() {

		function pinput() {
			if ($(window).width() > 768){
				$('.pincode-input2').pincodeInput({hideDigits:false,inputs:16,complete:function(value, e, errorElement){
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
			}
		}
		pinput();
	  $(window).resize(pinput);
  });
</script>
@endsection

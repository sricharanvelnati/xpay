@extends('layouts.app')
@section('title', 'Policy')
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
      <!-- <form method="POST" action="{{URL::to('card/process')}}"> -->
        @if(!empty($errors->all()))
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                  <span> {{ $error }} </span>
                @endforeach
              </div>
            @endif

			<div class="text-center">
				<ul class="app-nav">
					<li class="loading">
						<span></span>
						<label>{{__('payment.p1')}}</label>
					</li>
					<li>
						<span></span>
						<label>{{__('payment.p2')}}</label>
					</li>
					<li>
						<span></span>
						<label>{{__('payment.p3')}}</label>
					</li>
					<li>
						<span></span>
						<label>{{__('payment.p4')}}</label>
					</li>
				</ul>
			</div>
			<div class="row justify-content-between no-list">
				<div class="col-xl-4 col-lg-5 col-md-6 mb-4 mb-md-0">
					<h2 class="secondary-title">{{__('payment.h_l1')}}<small>{{__('payment.h_l2')}}</a></small></h2>
					<ul>

						<li class="mb-3 alipay">
							<a data-toggle="modal" data-target="#alipay">
								<div class="base-box paymentType" data-id="alipay" data-part="alipay">
									<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/bitcoin.SVG')}}" alt="Image"></div>
									<h3>{{__('payment.pay1')}}</h3>
								</div>
							</a>
						</li>

						<li class="mb-3 wechat">
						 <!-- <a data-toggle="modal" data-target="#wechat"> -->
							<div class="base-box paymentType disabled" data-id="wechat" data-part="wechat">
								<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/bank-transfer.svg')}}" alt="Image"></div>
								<h3>{{__('payment.pay2')}}</h3>
							</div>
						 <!-- </a> -->
						</li>
						<li class="mb-3 ausd">
							<a data-toggle="modal" data-target="#ausd">
							<div class="base-box paymentType" data-id="ausd" data-part="ausd">
								<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/debit-card.SVG')}}" alt="Image"></div>
								<h3>{{__('payment.pay3')}}</h3>
							</div>
						  </a>
						</li>
						<li class="mb-3 bonus">
							<a data-toggle="modal" data-target="#bonus">
							<div class="base-box paymentType" data-id="bonus" data-part="bonus">
								<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/Bonus.svg')}}" alt="Image"></div>
								<h3>{{__('payment.pay4')}}</h3>
							</div>
						 </a>
						</li>
					</ul>
				</div>
				<div class="col-xl-4 col-lg-5 col-md-6 single-img text-center"><img class="mb-0" src="{{URL::to('public/Frontassets/images/debitcard-img.png')}}" alt="Atm Card"></div>
			</div>
			<!-- <div class="mt-3 mt-md-5 text-center">
        <input type="hidden" name="cardType" id="cardType" value="">
				<button type="cancel" class="btn btn-primary mx-2">Back</button>
				<button type="submit" class="btn btn-primary mx-2">Next</button>
			</div> -->
      <!-- </form> -->
		</div>
	</section>
</div>
<!-- alipay modal start-->
<div class="modal" id="alipay" tabindex="-1" role="dialog">
<div class="modal-dialog barcode-modal" role="document">
	<div class="modal-content">
		<div class="modal-body text-center ">
			<h3>{{__('payment.a_h1')}}</h3>
			<h4>{{__('payment.pay1')}}</h4>
			<img src="{{URL::to('public/Frontassets/images/alipay.jpg')}}" style="width:300px;height:450px;" class="img-fluid"  alt="Image">
			<p>{{__('payment.a_l1')}}</p><p>{{__('payment.a_l2')}}</p>
			<div>
				<form action="{{URL::to('card/paymentType')}}" method="post">
					@csrf
					<input type="hidden" name="paymentType" value="alipay">
					<input type="hidden" name="amount" value="563">
				<button type="submit" class="btn btn-success">{{__('payment.a_b1')}}</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">{{__('payment.a_b2')}}</button>
			</form>
		 </div>
		</div>

	</div>
</div>
</div>
<!-- alipay modal end-->
<!-- wechat pay modal start -->
<div class="modal" id="wechat" tabindex="-1" role="dialog">
	<div class="modal-dialog barcode-modal" role="document">
		<div class="modal-content">
			<div class="modal-body text-center ">
				<h3>AMT: 563 CNY</h3>
				<h4>Wechat Pay</h4>
				<div class="bar-code"><img src="{{URL::to('public/Frontassets/images/TBC.png')}}" class="img-fluid"  alt="Image"></div>
				<p>You are required to input your registered email address into your payment remark.Failure to do so will render us unable to verify your payment.</p>
				<div>
					<form action="" method="post">
						@csrf
						<input type="hidden" name="paymentType" value="wechat">
						<input type="hidden" name="amount" value="563">
					<button type="submit" class="btn btn-success">I have made payment</button>
				  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				  </form>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- wechat pay modal end -->
<!-- ausd modal start -->
<div class="modal" id="ausd" tabindex="-1" role="dialog">
	<div class="modal-dialog barcode-modal" role="document">
		<div class="modal-content">
			<div class="modal-body text-center">
				<!-- tab -->
				<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{__('payment.au_h1')}}</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('payment.au_h2')}}</a>
					  </li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					        <div><b>{{__('payment.ausd_amt')}}</b></div>	
							<div class="bar-code"><img src="{{URL::to('public/Frontassets/images/AUSD.png')}}" class="img-fluid"  alt="Image"></div>
							<p><input type="text" value="0x6cea42de4f5e9ACF4c5584E8ce535124ebc1a7f6" id="ercp" readonly><button type="button" onclick="myFunction()"><i class="far fa-copy"></i></button></p>
							<p style="color:red;">{{__('payment.au_l1')}}</p>
							<p style="color:red;"><b>{{__('payment.au_e_l1')}}</b></p>
						</div>
					  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					        <div><b>{{__('payment.ausd_amt')}}</b></div>
							<div class="bar-code"><img src="{{URL::to('public/Frontassets/images/TBC.png')}}" class="img-fluid"  alt="Image"></div>
							<p><input type="text" value="0352c61c8f2958a0b34d4a3731101329f3d20f01b808de26e4503ed62f9aefce41" id="tbcp" readonly><button type="button" onclick="myFunctions()"><i class="far fa-copy"></i></button></p>
							<p style="color:red;">{{__('payment.au_l1')}}</p>
							<p style="color:red;"><b>{{__('payment.au_x_l1')}}</b></p>
						</div>
					</div>
					<!-- tab end-->
				<div>
					<form action="{{URL::to('card/paymentType')}}" method="post">
						@csrf
						<input type="hidden" name="paymentType" id="token" value="erc20">
						<input type="hidden" name="amount" value="80">
					<button type="submit" class="btn btn-success">{{__('payment.au_b1')}}</button>
				  <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('payment.a_b2')}}</button>
				</form>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- ausd modal end -->
<!-- bonus modal start -->
<div class="modal" id="bonus" tabindex="-1" role="dialog">
	<div class="modal-dialog barcode-modal" role="document">
		<div class="modal-content">
			<div class="modal-body text-center">
				<p>{{__('payment.b_l1')}}</p>
				<p>{{__('payment.b_l2')}}</p>
				<form action="{{URL::to('card/paymentType')}}" method="post">
					@csrf
					<input type="hidden" name="paymentType" value="free">
				<p><input type="text" name="account" value="" id="bonusInput" maxlength="14" minlength="1"></p>
				<div>
					<button type="submit" class="btn btn-success">{{__('payment.au_b1')}}</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">{{__('payment.a_b2')}}</button>
			 </div>
		 </form>
			</div>
		</div>
	</div>
</div>
<!-- bonus modal end -->
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
	 $("#bonusInput").forceNumeric();
	});
		jQuery.fn.forceNumeric = function () {
		     return this.each(function () {
		         $(this).keydown(function (e) {
		             var key = e.which || e.keyCode;
		             if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
		             // numbers
		                 key >= 48 && key <= 57 ||
		             // Numeric keypad
		                 key >= 96 && key <= 105 ||
		             // // comma, period and minus, . on keypad
		             //    key == 190 || key == 188 || key == 109 || key == 110 ||
		             // Backspace and Tab and Enter
		                key == 8 || key == 9 || key == 13 ||
		             // // Home and End
		             //    key == 35 || key == 36 ||
		             // left and right arrows
		                key == 37 || key == 39 ||
		             // Del and Ins
		                key == 46 || key == 45)
		                 return true;
		             return false;
		         });
		     });
		 }
$(document).on('click','.paymentType',function(){
var type = $(this).data('id');
  $('#cardType').val(type);
	var part = $(this).data('part');
	if(part === 'alipay'){
		$('.alipay').addClass('selected');
		$('.wechat').removeClass('selected');
		$('.ausd').removeClass('selected');
		$('.bonus').removeClass('selected');
	} else if(part === 'wechat'){
		$('.wechat').addClass('selected');
		$('.alipay').removeClass('selected');
		$('.ausd').removeClass('selected');
		$('.bonus').removeClass('selected');
	} else if(part === 'bonus'){
		$('.bonus').addClass('selected');
		$('.alipay').removeClass('selected');
		$('.ausd').removeClass('selected');
		$('.wechat').removeClass('selected');
  } else {
		$('.ausd').addClass('selected');
		$('.alipay').removeClass('selected');
		$('.wechat').removeClass('selected');
		$('.bonus').removeClass('selected');
	}
});

function myFunction() {
  var copyText = document.getElementById("ercp");
  copyText.select();
  document.execCommand("copy");
}

function myFunctions() {
  var copyTexts = document.getElementById("tbcp");
  copyTexts.select();
  document.execCommand("copy");
}

$(document).on('click','#pills-home-tab',function(){
	$('#token').val('erc20');
});
$(document).on('click','#pills-profile-tab',function(){
	$('#token').val('xif');
});
</script>
@endsection

@extends('layouts.app')
@section('assets')
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('title', 'Policy')
@section('content')
@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
@endif
@if(Session::has('message'))
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! session('message') !!}
	</div>
@endif
<div class="main">
	<section>
		<div class="container">
			<div class="row mb-3 mb-md-5">
				<div class="col-lg-5 mb-3 mb-lg-0">
					<div class="gradient-wrap">
					<form  action="{{URL::to('card/loadCard')}}" method="POST" class="fa-form">
							@csrf
						<div class="mb-3 mb-md-5 factor-wrap">
							@if(Auth::user()->google2fa_enable == 1)
							<div class="twofactor">{{__('dashboard.enable')}}<i class="fas fa-check-circle" style="color: #01ba9b;"></i></div>
							@else
							<div class="twofactor">{{__('dashboard.disable')}}<i class="fa fa-times-circle" style="color: #ff0000;"></i></div>
							@endif
							<div class="factor-amt">{{$total}} {{__('dashboard.AUSD')}}<span>{{__('dashboard.pending')}}</span></div>
						</div>
						<div class="btc-convert mb-3 mb-md-5">
							<div class="amt-wrap">
								<div class="currency">{{__('dashboard.send')}}</div>
							</div>
							<div class="amt-wrap">
								<div class="currency"><img src="{{URL::to('public/Frontassets/images/euro-icon.png')}}" alt="Dollar"/>{{__('dashboard.AUSD')}}</div>
								<div class="form-label-group">
									<input type="text" name="amount" class="form-control" id="euro-amt" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');"/>
									<label for="euro-amt">{{__('dashboard.Amount')}}</label>
								</div>
							</div>
						</div>
						<div class="mb-3 mb-md-5">
							<!-- start -->
							@if(Auth::user()->google2fa_enable == 1)
							<p>{{__('dashboard.2fa')}}</p>
								<input type="password" name="2fa" class="fa-input" id="twofa" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');"/>
						</div>
						<!-- <button type="submit" class="btn btn-primary">Load the Card</button>
						</form> -->
						<a data-toggle="modal" class="btn btn-primary" id="loadCard">{{__('dashboard.load')}}</a>
						<!-- end -->
						<!-- start -->
					@else
					</div>
					<a href="{{URL::to('/2fa')}}" class="btn btn-primary">{{__('dashboard.enable2fa')}}</a>
					@endif
						<!-- end -->
					</div>
				</div>
				<!-- ausd modal start -->
				<div class="modal" id="ausd" tabindex="-1" role="dialog">
					<div class="modal-dialog barcode-modal" role="document">
						<div class="modal-content">
							<div class="modal-body text-center">
								<!-- tab -->
								<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{__('dashboard.erc')}}</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('dashboard.xif')}}</a>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
											<div class="bar-code"><img src="{{URL::to('public/Frontassets/images/AUSD.png')}}" class="img-fluid"  alt="Image"></div>
											<p><input type="text" value="0x6cea42de4f5e9ACF4c5584E8ce535124ebc1a7f6" id="ercp" readonly><button type="button" onclick="myFunction()"><i class="far fa-copy"></i></button></p>
											<p style="color:red;">{{__('dashboard.note')}}</p>
											<p style="color:red;"><b>{{__('dashboard.erc_t')}}</b></p>
										</div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
											<div class="bar-code"><img src="{{URL::to('public/Frontassets/images/TBC.png')}}" class="img-fluid"  alt="Image"></div>
											<p><input type="text" value="0352c61c8f2958a0b34d4a3731101329f3d20f01b808de26e4503ed62f9aefce41" id="tbcp" readonly><button type="button" onclick="myFunctions()"><i class="far fa-copy"></i></button></p>
											<p style="color:red;">{{__('dashboard.note')}}</p>
											<p style="color:red;"><b>{{__('dashboard.xif_t')}}</b></p>
										</div>
									</div>
									<!-- tab end-->
								<div>
									<input type="hidden" name="paymentType" id="token" value="erc20">
									<button type="submit" class="btn btn-success">{{__('dashboard.b1')}}</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">{{__('dashboard.b2')}}</button>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ausd modal end -->
				<div class="col-lg-7 no-list">
						<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					        <thead>
					            <tr>
					                <th>{{__('dashboard.t_h1')}}</th>
					                <th>{{__('dashboard.t_h2')}}</th>
									<th>{{__('dashboard.t_h6')}}</th>
									<th>{{__('dashboard.t_h7')}}</th>
					                <th>{{__('dashboard.t_h3')}}</th>									
					                <th>{{__('dashboard.t_h4')}}</th>
					            </tr>
					        </thead>
					        <tbody>
								@forelse($paymentDetail as $payment)
					            <tr>
					                <td>{{$payment->id}}</td>
					                <td>{{$payment->amount}}</td>
									<td>{{$payment->partnerFee + $payment->cardLoadFee}}</td>
									<td>{{$payment->finalAmount}}</td>									
					                <td>
										@if($payment->status == 'pending')
											{{__('dashboard.status5')}}
										@else
											{{$payment->updated_at}}
										@endif
									</td>
					                <td class="newStatus{{$payment->id}}">
										@if($payment->status == 'pending')
										<span class="badge badge-danger label-mini cancel" style="cursor: pointer;" data-id="{{$payment->id}}">{{__('dashboard.status4')}}</span>
										@elseif($payment->status == 'confirm')
										<span class="badge badge-success label-mini">{{__('dashboard.status1')}}</span>
										@elseif($payment->status == 'cancelByUser')
										<span class="badge badge-danger label-mini">{{__('dashboard.status2')}}</span>
										@elseif($payment->status == 'loaded')
										<span class="badge badge-info label-mini">{{__('dashboard.status6')}}</span>
										@else
										<span class="badge badge-info label-mini">{{__('dashboard.status3')}}</span>
										@endif
									</td>
					            </tr>
										 @empty
										 <tr><td colspan="6">No Any Transaction Found</td></tr>
										 @endforelse
										</tbody>
						</table>
					</div>
	    			<!-- <div class="mt-3 mt-md-5">
						<a href="javascript:void(0)" class="btn btn-primary mx-2">Show More</a>
					</div> -->
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/Frontassets/js/bootstrap-pincode-input.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	var c_local = '{{app()->getLocale()}}';
	if(c_local == 'en'){
		var msga = "Status will be changed after pressing OK";
		var msgb = "Are you sure?";
		var msgc = "canceled";
		var msgd = "No changes were made!";
		var msge = "2FA Code Can not be Empty.";
		var msgf = "Please Enter Valid 2FA Code.";
	} else {
		var msga = "按OK后，状态将会改变";
		var msgb = "你确定吗？";
		var msgc = "取消";
		var msgd = "没有改变！";
		var msge = "2FA代码不能为空。";
		var msgf = "请输入有效的2FA代码。";
	}
  $(document).ready(function() {
		  $("#euro-amt").forceNumeric();
      $('.fa-input').pincodeInput({hideDigits:false,inputs:6,complete:function(value, e, errorElement){
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
			$('#example').DataTable({
		    responsive: true
				});
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
	$('.cancel').on('click',function(){
	// sweet alert for update status
	swal({
		title: msgb,
		text: msga,
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			// ajax start for change status
			var paymentId = $(this).data('id');
				$.ajax({
					type:'POST',
					async:true,
					dataType: "json",
					url: "updateByUser",
					data: {_token:'{{ csrf_token() }}',paymentId:paymentId},
					context:this,
					success:function(data){
						if(data == 'cancelByUser'){
						  var html = '<span class="badge badge-danger label-mini">'+msgc+'</span>';
							$('.newStatus'+paymentId+'').html(html);
					  }
				  }
				});
				// end
			// swal("Your Status Changed...!", {
			// 	icon: "success",
			// });

		} else {
			swal(msgd);
		}
	});
		// end
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
	 // check 2FA start
	 $(document).on('click','#loadCard',function(){
		 var fa = $('#twofa').val();
			 $.ajax({
				 type:'POST',
				 async:true,
				 dataType: "json",
				 url: "check2fa",
				 data: {_token:'{{ csrf_token() }}',fa:fa},
				 context:this,
				 success:function(data){
					 	if(data == 'null'){
							swal(msge);
						}
						if(data == 'invalid'){
							swal(msgf);
						}
						if(data == 'valid'){
							$("#ausd").modal();
						}
				 }
			 });
	 });
	 // check 2FA end
</script>
@endsection

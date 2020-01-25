@extends('layouts.app')
@section('title', 'UBank')
@section('content')
@if(Session::has('message'))
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! session('message') !!}
	</div>
@endif
<section class="banner-sec full-height no-gap d-flex flex-wrap align-items-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-6 mb-5 mb-sm-0">
				<h1>{{ __('home.t1') }}</h1>
				<h3>{{ __('home.t1_p1') }}</h3>
				<p>{{ __('home.t1_p2') }}<br/>{{ __('home.t1_p3') }}</p>
				@if(!Auth::check())
				<a href="{{URL::to('register')}}" class="btn btn-primary mt-4">{{ __('home.b1') }}</a>
				@elseif(Auth::check() && Auth::user()->is_kyc_approved == 0)
				<a href="{{URL::to('card/kyc')}}" class="btn btn-primary mt-4">{{ __('home.b1') }}</a>
				@else
				@endif
			</div>
			<div class="col-sm-6 banner_img">
				<img src="{{URL::to('public/Frontassets/images/banner-img.png')}}" alt="Banner" class="img-fluid">
			</div>
		</div>
	</div>
</section>
<section class="pt-0">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="base-box">
					<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/currencyexchange.svg')}}" alt="Image"></div>
					<h3>{{ __('home.box1') }}</h3>
				</div>
			</div>
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="base-box">
					<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/membership-card.svg')}}" alt="Image"></div>
					<h3>{{ __('home.box2') }}</h3>
				</div>
			</div>
			<div class="col-md-4">
				<div class="base-box">
					<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/Dollar.svg')}}" alt="Image"></div>
					<h3>{{ __('home.box3') }}</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<h2 class="main-title"><span>{{ __('home.t2') }}</span></h2>
	<div class="point-wrap">
		<div class="container">
			<div class="row align-items-start">
				<div class="col-md-6">
					<h2 class="title-blue-lg">{{ __('home.t3') }}</h2>
					<p>{{ __('home.t3_p1') }}</p>
					<p class="lightblue-text mb-4 mb-md-5">{{ __('home.t3_p2') }}</p>
					<ul>
						<li><span>{{ __('home.step') }}1:- </span><b>{{ __('home.t3_s1') }}</b></li>
						<li><span>{{ __('home.step') }}2:- </span><b>{{ __('home.t3_s2') }}</b></li>
						<li><span>{{ __('home.step') }}3:- </span><b>{{ __('home.t3_s3') }}</b></li>
					</ul>
					@if(!Auth::check())
					<a href="{{URL::to('register')}}" class="btn btn-primary mt-4">{{ __('home.b1') }}</a>
					@elseif(Auth::check() && Auth::user()->is_kyc_approved == 0)
					<a href="{{URL::to('card/kyc')}}" class="btn btn-primary mt-4">{{ __('home.b1') }}</a>
					@else
					@endif
				</div>
				<div class="col-md-6 text-right d-none d-md-block">
						<img src="{{URL::to('public/Frontassets/images/maincoin.png')}}" class="img-fluid" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<h2 class="main-title"><span>{{ __('home.t4') }}</span></h2>
		<div class="card-box mb-4 mb-lg-5">
			<div class="row">
				<div class="col-sm-6">
					<h2 class="title-blue-lg">{{ __('home.t5') }}</h2>
					<p><small>{{ __('home.t5_p1') }}</small></p>
				</div>
			</div>
		</div>
				<div class="row align-items-center justify-content-between mb-4 mb-lg-5">
						<div class="col-md-4">
								<div class="gradient-box">
										<img src="{{URL::to('public/Frontassets/images/e-learning.png')}}" class="img-fluid" alt="">
								</div>
						</div>
						<div class="col-md-6">
								<div class="program-box">
										<h4>{{ __('home.t6') }}</h4>
										<p>{{ __('home.t6_p1') }}</p>
								</div>
						</div>
				</div>
				<div class="row align-items-center justify-content-between mb-4 mb-lg-5 alternate">
						<div class="col-md-4">
								<div class="gradient-box">
										<img src="{{URL::to('public/Frontassets/images/reward.png')}}" class="img-fluid" alt="">
								</div>
						</div>
						<div class="col-md-6">
								<div class="program-box">
										<h4>{{ __('home.t7') }}</h4>
										<p>{{ __('home.t7_p1') }}</p>
								</div>
						</div>
				</div>
				<div class="row align-items-center justify-content-between">
						<div class="col-md-4">
								<div class="gradient-box">
										<img src="{{URL::to('public/Frontassets/images/coineasily.png')}}" class="img-fluid" alt="">
								</div>
						</div>
						<div class="col-md-6">
								<div class="program-box">
										<h4>{{ __('home.t8') }}</h4>
										<p>{{ __('home.t8_p1') }}</p>
								</div>
						</div>
				</div>
	</div>
</section>
<section class="pt-0 fee-limit">
	<div class="container">
		<h2 class="main-title"><span>{{ __('home.t9') }}</span></h2>
		<div class="row align-items-center">
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="base-box">
					<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/rates.svg')}}" alt="Image"></div>
					<div class="bbox-wrap">
						<h3>{{ __('home.t_box4') }}</h3>
						<p>{{ __('home.box4_p1') }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="base-box">
					<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/fees.svg')}}" alt="Image"></div>
					<div class="bbox-wrap">
						<h3>{{ __('home.t_box5') }}</h3>
						<p>{{ __('home.box5_p1') }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="base-box">
					<div class="img round-icon"><img src="{{URL::to('public/Frontassets/images/limits.svg')}}" alt="Image"></div>
				  <div class="bbox-wrap">
						<h3>{{ __('home.t_box6') }}</h3>
						<p>{{ __('home.box6_p1') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <section class="no-list">
		<div class="container">
				<h2 class="main-title"><span>Card Fees & Limits</span></h2>
				<div class="row">
					@foreach($getPlan as $plan)
					<div class="col-lg-3 col-md-6 mt-3">
					  <a href="{{URL::to('topup')}}">
						<div class="plan-wrap">
							<div class="plan-p">
								<img src="{{URL::to('public/img/plan/'.$plan->planImage)}}" alt="Plans" />
								<h6>{{$plan->planName}}</h6>
								<span><small>$</small>{{$plan->price}}<b>({{$plan->year}} Years)</b></span>
							</div>
							<ul class="plan-content">
								<li>
									<span>E-Learning Program</span>
									<div class="star-rating"><div class="stars stars{{$plan->eLearning}}"></div>
								</li>
								<li>
									<span>Reward Point</span>
									<div class="star-rating"><div class="stars stars{{$plan->rewardPoint}}"></div>
								</li>
								<li>
									<span>Ubank Coin Earned</span>
									<b>${{$plan->mangoCoinEarn}}(equivalent)</b>
								</li>
								<li>
									<span>Referral Fee</span>
									<div class="star-rating"><div class="stars stars{{$plan->referralFee}}"></div>
								</li>
							</ul>
						</div>
					</div>
				</a>
					@endforeach
				</div>
		</div>
</section> -->

@endsection

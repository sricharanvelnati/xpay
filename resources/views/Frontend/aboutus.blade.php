@extends('layouts.app')
@section('title', 'About Us')
@section('content')
<div class="main">
	<section class="full-height no-gap d-flex flex-wrap align-items-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-6 mb-3">
					<h2 class="title-blue-lg">{{ __('about.title') }}</h2>
					<p>{{ __('about.a_p1') }}</p>
				</div>
				<div class="col-sm-6 text-center single-img"><img src="{{URL::to('public/Frontassets/images/about-img.png')}}" alt="Image"></div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row mb-5">
				<div class="col-xl-6 col-md-4  text-center single-img"><img src="{{URL::to('public/Frontassets/images/about-goal.png')}}" alt="Image"></div>
				<div class="col-xl-6 col-md-8">
					<div class="about-wrap">
						<div class="icon round-icon"><img src="{{URL::to('public/Frontassets/images/flag.SVG')}}" alt="Image"></div>
						<div class="about-content">
							<h4>{{ __('about.a') }}</h4>
							<p>{{ __('about.a_p2') }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row alternate">
				<div class="col-xl-6 col-md-4 text-center single-img"><img src="{{URL::to('public/Frontassets/images/about-exchange.png')}}" alt="Image"></div>
				<div class="col-xl-6 col-md-8">
					<div class="about-wrap">
						<div class="icon round-icon"><img src="{{URL::to('public/Frontassets/images/mobile-web.SVG')}}" alt="Image"></div>
						<div class="about-content">
							<h4>{{ __('about.t1') }}</h4>
							<p>{{ __('about.t1_p1') }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="no-list">
		<div class="container">
			<h2 class="main-title"><span>{{ __('about.t2') }}</span></h2>
			<div class="row align-items-center">
				<div class="col-md-6 text-center alternate single-img">
					<img src="{{URL::to('public/Frontassets/images/protocol.png')}}" alt="images" />
				</div>
				<div class="col-md-6">
					<!-- Start -->
					<p>{{ __('about.t2_p1') }}</p>
					<!-- <ul class="card-list">
						<li>
							<div class="icon round-icon"><img src="{{URL::to('public/Frontassets/images/bitev.SVG')}}" alt="Image"></div>
							<div class="security-content">
								<h3>256 BIT EV SSL SECURED</h3>
								<p>All of our browser and application connections feature 256 bit SSL security</p>
							</div>
						</li>
						<li>
							<div class="icon round-icon"><img src="{{URL::to('public/Frontassets/images/factors.SVG')}}" alt="Image"></div>
							<div class="security-content">
								<h3>2 FACTOR AUTHENTICATION</h3>
								<p>Ubank Exchange keeps you secure with two factor authentication every time a transaction is done.</p>
							</div>
						</li>
						<li>
							<div class="icon round-icon"><img src="{{URL::to('public/Frontassets/images/ddos.SVG')}}" alt="Image"></div>
							<div class="security-content">
								<h3>DDOS PROTECTION</h3>
								<p>Ubank Exchange is DDOS attack proof with protection support from Cloudflare.</p>
							</div>
						</li>
						<li>
							<div class="icon round-icon"><img src="{{URL::to('public/Frontassets/images/ongoingsecurity.SVG')}}" alt="Image"></div>
							<div class="security-content">
								<h3>ONGOING SECURITY AUDITS</h3>
								<p>We’ve partnered with one of the world’s premier crypto security firms to conduct regular audits on our site and exchange to proactively ensure your data is safe.</p>
								<p>They will be conducting:</p>
								<div class="list-in">
									<span>Source code review</span><span>Platform and API penetration testing</span><span>DNS protection</span><span> And more for us on an ongoing basis.</span>
								</div>
							</div>
						</li>
					</ul> -->
					<!-- END -->
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

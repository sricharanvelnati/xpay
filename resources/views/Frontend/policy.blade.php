@extends('layouts.app')
@section('title', 'Policy')
@section('content')
<div class="main">
	<section>
		<div class="container">
			<nav class="text-center  mb-3 mb-md-5">
			    <div class="nav policy-tab" id="nav-tab" role="tablist">
			        <a class="nav-item active" id="policy-tab" data-toggle="tab" href="#policy" role="tab" aria-controls="policy" aria-selected="true">Policy</a>
			        <a class="nav-item" id="feesnlimits-tab" data-toggle="tab" href="#feesnlimits" role="tab" aria-controls="feesnlimits" aria-selected="false">Fees & Limits</a>
			        <a class="nav-item" id="guidelines-tab" data-toggle="tab" href="#guidelines" role="tab" aria-controls="guidelines" aria-selected="false">Guidelines</a>
			    </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			    <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="policy-tab">
			    	<div class="row mb-3 mb-md-5">
						<div class="col-md-6 mb-3 mb-md-0">
							<div class="gradient-wrap">
								<h4>Reward Point Quaterly</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised.</p>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>
						<div class="col-md-6">
							<h4>Features:</h4>
							<ul class="gradient-list">
								<li>Convert  your bitcoin and ethereum to euros</li>
								<li>Worldwide withdrawals at over 30 millions ATM machines anywhere in the world</li>
								<li>Use online at point of sale in over 40 Millions shops</li>
								<li>Exchange up to 540,000 Euro a Year</li>
							</ul>
						</div>
					</div>
					<div class="text-center single-img">
						<img src="{{URL::to('public/Frontassets/images/debit-card.png')}}">
					</div>
			    </div>
			    <div class="tab-pane fade no-list" id="feesnlimits" role="tabpanel" aria-labelledby="feesnlimits-tab">
			    	<div class=" mb-5">
						<h4>Card Fees</h4>
		    			<ul class="fee-table">
		    					<li class="table-header">
		    						<p>Type</p>
		    						<p>Fees</p>
		    					</li>
		    					<li>
		    						<p>Loading fee(Max 1,074.11 EUR per loading per card )</p>
		    						<p>8</p>
		    					</li>
		    					<li>
		    						<p>ATM withdrawal fee (per withdrawal)</p>
		    						<p>2.10</p>
		    					</li>
		    					<li>
		    						<p>Monthly card fee</p>
		    						<p>0</p>
		    					</li>
		    					<li>
		    						<p>POS fee</p>
		    						<p>0</p>
		    					</li>
		    					<li>
		    						<p>Card FX Fee</p>
		    						<p>VISA FX rate + 1% of transaction amount</p>
		    					</li>
		    					<li>
		    						<p>ATM Balance inquiry (per inquiry)</p>
		    						<p>1 at overseas ATM</p>
		    					</li>
		    					<li>
		    						<p>Statement  Request</p>
		    						<p>at overseas ATM</p>
		    					</li>
		    					<li>
		    						<p>Chargeback (if card is lost)</p>
		    						<p>No Chargeback</p>
		    					</li>
		    			</ul>
			    	</div>
			    	<div class="mb-3 mb-md-5">
						<h4>Card Fees</h4>
		    			<ul class="fee-table">
	    					<li class="table-header">
	    						<p>Type</p>
	    						<p>Fees</p>
	    					</li>
	    					<li>
	    						<p>Max Load (max value you can loadeach time)</p>
	    						<p>1080</p>
	    					</li>
	    					<li>
	    						<p>Max stored Value (max value you can store per card)</p>
	    						<p>2100</p>
	    					</li>
	    					<li>
	    						<p>Maximum card per person</p>
	    						<p>3</p>
	    					</li>
		    			</ul>
			    	</div>
			    	<div>
			    		<p class="note">*0.214806 EUR  for local (Malasia) ATM and 2.14806 EUR for overseas ATMs.</p>
			    		<p class="note">** A card holder can applty and receive up to 3 cards but of different artworksm, fees remain the same.</p>
			    	</div>
			    </div>
			    <div class="tab-pane fade" id="guidelines" role="tabpanel" aria-labelledby="guidelines-tab">
			    	<h4>Recommended Card Use</h4>
			    	<p>The following bahaviour are used by bank to monitor for suspicious activities on card transctions. To keep your card from being flagged/stopped, <br />please avoide certain “red flag” behaviors:</p>
			    	<ul class="gradient-list">
						<li>making a large number of same -day, high-value purchases</li>
						<li>Purchasing from a larger number of stores in one business day</li>
						<li>Multiple charges at a merchat within a few moments of each other</li>
						<li>Multiple online charges in rapid succession/Multiple online stores in very short time periods</li>
						<li>Small purchased followed by a large value purchase (e.g pay the dry-cleaning bill and then charges for five luxury items)</li>
						<li>Purchases in abnormal quantities</li>
						<li>increase to frequency of purchases</li>
						<li>Women, those aged below 28 elderly  adult above 60, 64, 75 products can easily be convertedmonry recently been used issue cards</li>
						<li>Changes to your normal place of purchase (if you regulerly buy from home in Tokyo then suddenly in Abilence, TX)</li>
						<li>Purchases of products which do not correspond to client’s profile</li>
					</ul>
			    </div>
			</div>
		</div>
	</section>
	@auth
	<div class="col-md-12 text-center mb-4">
				<a href="{{URL::to('card/payment')}}" class="btn btn-primary">Next</a>
  </div>
  @endauth
</div>
@endsection

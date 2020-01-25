@extends('layouts.app')
@section('title', 'Policy')
@section('content')
<div class="main">
	<section>
		<div class="container">
			<nav class="text-center  mb-3 mb-md-5">
			    <div class="nav policy-tab" id="nav-tab" role="tablist">
			        <a class="nav-item active" id="policy-tab" data-toggle="tab" href="#policy" role="tab" aria-controls="policy" aria-selected="true">{{__('card-policy.title1')}}</a>
			        <a class="nav-item" id="feesnlimits-tab" data-toggle="tab" href="#feesnlimits" role="tab" aria-controls="feesnlimits" aria-selected="false">{{__('card-policy.title2')}}</a>
			        <a class="nav-item" id="guidelines-tab" data-toggle="tab" href="#guidelines" role="tab" aria-controls="guidelines" aria-selected="false">{{__('card-policy.title3')}}</a>
			    </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			    <div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="policy-tab">
			    	<div class="row mb-3 mb-md-5">
						<div class="col-md-6 mb-3 mb-md-0">
							<div class="gradient-wrap">
								<h4>{{__('card-policy.p_t1')}}</h4>
								<p>{{__('card-policy.p_p1')}}</p>
								<p>{{__('card-policy.p_p2')}}</p>
							</div>
						</div>
						<div class="col-md-6">
							<h4>{{__('card-policy.p_t2')}}</h4>
							<ul class="gradient-list">
								<li>{{__('card-policy.p_l1')}}</li>
								<li>{{__('card-policy.p_l2')}}</li>
								<li>{{__('card-policy.p_l3')}}</li>
								<li>{{__('card-policy.p_l4')}}</li>
							</ul>
						</div>
					</div>
					<div class="text-center single-img">
						<img src="{{URL::to('public/Frontassets/images/debit-card.png')}}">
					</div>
			    </div>
			    <div class="tab-pane fade no-list" id="feesnlimits" role="tabpanel" aria-labelledby="feesnlimits-tab">
			    	<div class=" mb-5">
						<h4>{{__('card-policy.f_t1')}}</h4>
		    			<ul class="fee-table">
		    					<li class="table-header">
		    						<p>{{__('card-policy.f_c1_l1')}}</p>
		    						<p>{{__('card-policy.f_c2_l1')}}</p>
		    					</li>
		    					<li>
		    						<p>{{__('card-policy.f_c1_l2')}}</p>
		    						<p>{{__('card-policy.f_c2_l2')}}</p>
		    					</li>
		    					<li>
		    						<p>{{__('card-policy.f_c1_l3')}}</p>
		    						<p>{{__('card-policy.f_c2_l3')}}</p>
		    					</li>
		    					<li>
										<p>{{__('card-policy.f_c1_l4')}}</p>
		    						<p>{{__('card-policy.f_c2_l4')}}</p>
		    					</li>
		    					<li>
										<p>{{__('card-policy.f_c1_l5')}}</p>
										<p>{{__('card-policy.f_c2_l5')}}</p>
		    					</li>
		    					<li>
										<p>{{__('card-policy.f_c1_l6')}}</p>
		    						<p>{{__('card-policy.f_c2_l6')}}</p>
		    					</li>
		    					<li>
										<p>{{__('card-policy.f_c1_l7')}}</p>
		    						<p>{{__('card-policy.f_c2_l7')}}</p>
		    					</li>
		    					<li>
										<p>{{__('card-policy.f_c1_l8')}}</p>
		    						<p>{{__('card-policy.f_c2_l8')}}</p>
		    					</li>
		    					<li>
										<p>{{__('card-policy.f_c1_l9')}}</p>
		    						<p>{{__('card-policy.f_c2_l9')}}</p>
		    					</li>
		    			</ul>
			    	</div>
			    	<div class="mb-3 mb-md-5">
						<h4>{{__('card-policy.f2_t2')}}</h4>
		    			<ul class="fee-table">
	    					<li class="table-header">
	    						<p>{{__('card-policy.f2_t2')}}</p>
	    						<p>{{__('card-policy.f2_t2')}}</p>
	    					</li>
	    					<li>
	    						<p>{{__('card-policy.f2_c1_l1')}}</p>
	    						<p>{{__('card-policy.f2_c2_l1')}}</p>
	    					</li>
	    					<li>
									<p>{{__('card-policy.f2_c1_l2')}}</p>
	    						<p>{{__('card-policy.f2_c2_l2')}}</p>
	    					</li>
	    					<li>
									<p>{{__('card-policy.f2_c1_l3')}}</p>
									<p>{{__('card-policy.f2_c2_l3')}}</p>
	    					</li>
		    			</ul>
			    	</div>
			    </div>
			    <div class="tab-pane fade" id="guidelines" role="tabpanel" aria-labelledby="guidelines-tab">
			    	<h4>{{__('card-policy.g_t1')}}</h4>
			    	<p>{{__('card-policy.g_h1')}}</p>
			    	<ul class="gradient-list">
						<li>{{__('card-policy.g_l1')}}</li>
						<li>{{__('card-policy.g_l2')}}</li>
						<li>{{__('card-policy.g_l3')}}</li>
						<li>{{__('card-policy.g_l4')}}</li>
						<li>{{__('card-policy.g_l5')}}</li>
						<li>{{__('card-policy.g_l6')}}</li>
						<li>{{__('card-policy.g_l7')}}</li>
						<li>{{__('card-policy.g_l8')}}</li>
						<li>{{__('card-policy.g_l9')}}</li>
					</ul>
			    </div>
			</div>
		</div>
	</section>
	@auth
	<div class="col-md-12 text-center mb-4">
				<a href="{{URL::to('card/payment')}}" class="btn btn-primary">{{__('card-policy.b1')}}</a>
  </div>
  @endauth
</div>
@endsection

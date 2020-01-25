@extends('layouts.app')
@section('title', 'Policy')
@section('content')
<div class="main">
  <section>
		<div class="container">
      <div class="row justify-content-between">

        <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
          <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t1') }}</h4>
        </div>
        <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
          <p>{{ __('terms.t1_p1')}}</p>
          <p>{{ __('terms.t1_p2')}}</p>
          <p>{{ __('terms.t1_p3')}}</p>
          <p>{{ __('terms.t1_p4')}}</p>
          <p>{{ __('terms.t1_p5')}}</p>
          <p>{{ __('terms.t1_p6')}}</p>
        </div>

		<!-- Activities  -->

		<!-- <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
          <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t29') }}</h4>
        </div>
        <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
          <p>{{ __('terms.t29_p1')}}</p>
          <p>{{ __('terms.t29_p2')}}</p>
          <p>{{ __('terms.t29_p3')}}</p>
          <p>{{ __('terms.t29_p4')}}</p>
          <p>{{ __('terms.t29_p5')}}</p>
          <p>{{ __('terms.t29_p6')}}</p>
        </div> -->

        <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
          <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t2') }}</h4>
        </div>
        <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
          <p>{{ __('terms.t2_p1')}}</p>
          <p>{{ __('terms.t2_p2')}}</p>
          <p>{{ __('terms.t2_p3')}}</p>
          <p>{{ __('terms.t2_p4')}}</p>
          <p>{{ __('terms.t2_p5')}}</p>
          <p>{{ __('terms.t2_p6')}}</p>
          <p>{{ __('terms.t2_p7')}}</p>
          <p>{{ __('terms.t2_p8')}}</p>
          <p>{{ __('terms.t2_p9')}}</p>
          <p>{{ __('terms.t2_p10')}}</p>
          <p>{{ __('terms.t2_p11')}}</p>
          <p>{{ __('terms.t2_p12')}}</p>
          <p>{{ __('terms.t2_p13')}}</p>
          <p>{{ __('terms.t2_p14')}}</p>
          <p>{{ __('terms.t2_p15')}}</p>
          <p>{{ __('terms.t2_p16')}}</p>
          <p>{{ __('terms.t2_p17')}}</p>
          <p>{{ __('terms.t2_p18')}}</p>
          <p>{{ __('terms.t2_p19')}}</p>
          <p>{{ __('terms.t2_p20')}}</p>
          <p>{{ __('terms.t2_p21')}}</p>
          <p>{{ __('terms.t2_p22')}}</p>
          <p>{{ __('terms.t2_p23')}}</p>
          <p>{{ __('terms.t2_p24')}}</p>
          <p>{{ __('terms.t2_p25')}}</p>
          <p>{{ __('terms.t2_p26')}}</p>
          <p>{{ __('terms.t2_p27')}}</p>
          <p>{{ __('terms.t2_p28')}}</p>
          <p>{{ __('terms.t2_p29')}}</p>
          <p>{{ __('terms.t2_p30')}}</p>
          <p>{{ __('terms.t2_p31')}}</p>
          <p>{{ __('terms.t2_p32')}}</p>
          <p>{{ __('terms.t2_p33')}}</p>
          <p>{{ __('terms.t2_p34')}}</p>
          <p>{{ __('terms.t2_p35')}}</p>
          <p>{{ __('terms.t2_p36')}}</p>
          <p>{{ __('terms.t2_p37')}}</p>
          <p>{{ __('terms.t2_p38')}}</p>
          <p>{{ __('terms.t2_p39')}}</p>
        </div>
        <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
          <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t3') }}</h4>
        </div>
          <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
            <p>{{ __('terms.t3_p1')}}</p>
            <p>{{ __('terms.t3_p2')}}</p>
            <p>{{ __('terms.t3_p3')}}</p>
            <p>{{ __('terms.t3_p4')}}</p>
            <p>{{ __('terms.t3_p5')}}</p>
            <p>{{ __('terms.t3_p6')}}</p>
            <p>{{ __('terms.t3_p7')}}</p>
            <p>{{ __('terms.t3_p8')}}</p>
          </div>

          <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
              <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t4') }}</h4>
          </div>
          <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
            <p>{{ __('terms.t4_p1')}}</p>
          </div>
          <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
              <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t5') }}</h4>
          </div>
          <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
            <p>{{ __('terms.t5_p1')}}</p>
            <p>{{ __('terms.t5_p2')}}</p>
            <p>{{ __('terms.t5_p3')}}</p>
            <p>{{ __('terms.t5_p4')}}</p>
            <p>{{ __('terms.t5_p5')}}</p>
            <p>{{ __('terms.t5_p6')}}</p>
            <p>{{ __('terms.t5_p7')}}</p>
            <p>{{ __('terms.t5_p8')}}</p>
            <p>{{ __('terms.t5_p9')}}</p>
            <p>{{ __('terms.t5_p10')}}</p>
          </div>
          <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
              <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t6') }}</h4>
          </div>
          <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
            <p>{{ __('terms.t6_p1')}}</p>
          </div>
          <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
              <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t7') }}</h4>
          </div>
          <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
            <p>{{ __('terms.t7_p1')}}</p>
            <p>{{ __('terms.t7_p2')}}</p>
            <p>{{ __('terms.t7_p3')}}</p>
            <p>{{ __('terms.t7_p4')}}</p>
          </div>
          <div class="col-md-12 col-lg-12 mb-5 mb-md-0">
              <h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t8') }}</h4>
          </div>
          <div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
            <p>{{ __('terms.t8_p1')}}</p>
            <p>{{ __('terms.t8_p2')}}</p>
          </div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t9') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t9_p1')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t10') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t10_p1')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t11') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t11_p1')}}</p>
						<p>{{ __('terms.t11_p2')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t12') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t12_p1')}}</p>
						<p>{{ __('terms.t12_p2')}}</p>
						<p>{{ __('terms.t12_p3')}}</p>
						<p>{{ __('terms.t12_p4')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t13') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t13_p1')}}</p>
						<p>{{ __('terms.t13_p2')}}</p>
						<p>{{ __('terms.t13_p3')}}</p>
						<p>{{ __('terms.t13_p4')}}</p>
						<p>{{ __('terms.t13_p5')}}</p>
						<p>{{ __('terms.t13_p6')}}</p>
						<p>{{ __('terms.t13_p7')}}</p>
						<p>{{ __('terms.t13_p8')}}</p>
						<p>{{ __('terms.t13_p9')}}</p>
						<p>{{ __('terms.t13_p10')}}</p>
						<p>{{ __('terms.t13_p11')}}</p>
						<p>{{ __('terms.t13_p12')}}</p>
						<p>{{ __('terms.t13_p14')}}</p>						
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t14') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t14_p1')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t15') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t15_p1')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t16') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t16_p1')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t17') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t17_p1')}}</p>
						<p>{{ __('terms.t17_p2')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t18') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t18_p1')}}</p>
						<p>{{ __('terms.t18_p2')}}</p>
						<p>{{ __('terms.t18_p3')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t19') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t19_p1')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t20') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t20_p1')}}</p>
						<p>{{ __('terms.t20_p2')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t21') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t21_p1')}}</p>
						<p>{{ __('terms.t21_p2')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t22') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t22_p1')}}</p>
						<p>{{ __('terms.t22_p2')}}</p>
						<p>{{ __('terms.t22_p3')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t23') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t23_p1')}}</p>
						<p>{{ __('terms.t23_p2')}}</p>
						<p>{{ __('terms.t23_p3')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t24') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t24_p1')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t25') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t25_p1')}}</p>
						<p>{{ __('terms.t25_p2')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t26') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t26_p1')}}</p>
						<p>{{ __('terms.t26_p2')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t27') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t27_p1')}}</p>
						<p>{{ __('terms.t27_p2')}}</p>
						<p>{{ __('terms.t27_p3')}}</p>
					</div>
					<div class="col-md-12 col-lg-12 mb-5 mb-md-0">
							<h4 class="title-blue-lg mb-1 mt-2">{{ __('terms.t28') }}</h4>
					</div>
					<div class="col-md-12 col-lg-12 mt-4 mb-5 mb-md-0">
						<p>{{ __('terms.t28_p1')}}</p>
					</div>
      </div>
    </div>
  </section>
</div>
@endsection

<?php
//$url = URL::to("/");
//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//if($actual_link === $url.'/contact' || $actual_link === $url.'/' || $actual_link === $url.'/about'){
?>
<!-- Footer -->
	<footer>
	    <div class="container">
	    	<div class="row">
	    		<div class="col-lg-6 col-md-8">
			    	<a href="{{URL::to('/')}}" class="mb-4 d-inline-block footerlogo"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" alt="Logo"></a>
			    	<nav class="footer-nav">
			    		<a class="{{ request()->is('/') ? 'active' : '' }}" href="{{URL::to('/')}}">{{ __('footer.Home') }}</a>
			    		<a class="{{ request()->is('about') ? 'active' : '' }}" href="{{URL::to('about')}}">{{ __('footer.About') }}</a>
			    		<a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{URL::to('contact')}}">{{ __('footer.Contact') }}</a>
			    		<a class="{{ request()->is('terms') ? 'active' : '' }}" href="{{URL::to('terms')}}">{{ __('footer.Terms_of_Use') }}</a>
			    		<a class="{{ request()->is('privacy-policy') ? 'active' : '' }}" href="{{URL::to('privacy-policy')}}">{{ __('footer.Privacy_Policy') }}</a>
			    	</nav>
			    	<h3 class="tirtuary-title invert">{{ __('footer.t1') }}</h3>
			    	<p>{{ __('footer.t1_p1') }}</p>
						@if(!Auth::check())
			    	<a href="{{URL::to('register')}}" class="btn btn-primary mt-4">{{ __('footer.b1') }}</a>
						@elseif(Auth::check() && Auth::user()->is_kyc_approved == 0)
						<a href="{{URL::to('card/kyc')}}" class="btn btn-primary mt-4">{{ __('footer.b1') }}</a>
						@else
						@endif
		    	</div>
	    	</div>
	    </div>
	</footer>
<?php //} else { }?>
    <!-- Optional JavaScript -->
  <script src="{{URL::to('public/Frontassets/js/jquery.min.js')}}"></script>
  <script src="{{URL::to('public/Frontassets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{URL::to('public/Frontassets/js/jquery.fancybox.min.js')}}"></script>
	<script src="{{URL::to('public/Frontassets/js/owl.carousel.min.js')}}"></script>
	<script src="{{URL::to('public/Frontassets/js/jquery.steps.min.js')}}"></script>
  <script src="{{URL::to('public/Frontassets/js/dropdown.js')}}"></script>
@yield('front-footer')
  <script src="{{URL::to('public/Frontassets/js/custom.js')}}"></script>


  <script type="text/javascript">

    $("#wizard").steps();

		$(document).ready(function(){

			var local = '{{app()->getLocale()}}';
				if(local === 'en'){
						$('#lang-drop').text('English');
				} else {
						$('#lang-drop').text('中文');
				}
		});
	</script>
	@yield('script')
  </body>
</html>

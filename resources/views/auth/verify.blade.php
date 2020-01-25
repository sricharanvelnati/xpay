@extends('layouts.app')
@section('title', 'Verify Email')
@section('content')
<div class="main">
	<section>
		<div class="container">
			<div class="row justify-content-center text-center">
        <div class="col-md-8">
          <h3><div class="card-header control-label text-white">{{ __('auth.Verify Your Email Address') }}</div></h3>
          <img src="{{URL::to('public/Frontassets/images/receive-mail.png')}}" alt="Verify">
          <div class="card-body text-white">
              @if (session('resent'))
                  <div class="alert alert-success" role="alert">
                      {{ __('auth.A fresh verification link has been sent to your email address.') }}
                  </div>
              @endif
              {{ __('auth.Before proceeding, please check your email for a verification link.') }}
              {{ __('auth.If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('auth.click here to request another') }}</a>.
          </div>
        </div>
			</div>
		</div>
	</section>
</div>
@endsection

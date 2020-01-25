<!--Header-->
<header>
   <nav class="navbar navbar-expand-lg">
       <div class="container">
         <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" alt="logo"></a>
         <a class="navbar-toggler ml-auto"  data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span></span></a>
         <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav text-uppercase ml-auto align-items-center">
             <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
               <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{URL::to('/')}}">{{ __('header.Home') }}</a>
             </li>
             <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
               <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{URL::to('about')}}">{{ __('header.About') }}</a>
             </li>
             <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
               <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{URL::to('contact')}}">{{ __('header.Contact_Us') }}</a>
             </li>
             @if(!Auth::check())
               <li class="nav-item">
                 <a href="{{URL::to('login')}}" class="requestbtn">{{ __('header.Login') }}</a>
               </li>
             @else
            <li class="nav-item">
             <div class="dropdown">
               <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                 {{Auth::user()->first_name}}
               </button>
             <div class="dropdown-menu dropdown-menu-right">
               <a class="dropdown-item" href="{{URL::to('card/dashboard')}}">{{ __('header.Dashboard') }}</a>
               <a class="dropdown-item" href="{{URL::to('profile')}}">{{ __('header.Profile') }}</a>
               <a class="dropdown-item" href="{{URL::to('changePassword')}}">{{ __('header.Change_Password') }}</a>
               <a class="dropdown-item" href="{{URL::to('2fa')}}">{{ __('header.2FA_Settings') }}</a>
               @if(Auth::check() && Auth::user()->is_kyc_approved == 0)
               <a class="dropdown-item" href="{{URL::to('card/kyc')}}">{{ __('header.Complete_KYC') }}</a>
               @endif
               <!-- <a class="dropdown-item" href="{{URL::to('logout')}}">{{ __('header.LogOut') }}</a> -->
               <a class="dropdown-item" href="{{URL::to('front-logout')}}">{{ __('header.LogOut') }}</a>
             </div>
           </div>
         </li>
             @endif
             <li class="nav-item">
               <div class="dropdown ml-auto">
                 <button type="button" class="btn btn-primary dropdown-toggle" id="lang-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                 <div class="dropdown-menu" aria-labelledby="lang-drop">
                   <a class="dropdown-item lang" href="{{ url('locale/en') }}" data-id="English">English</a>
                   <a class="dropdown-item lang" href="{{ url('locale/ch') }}" data-id="Chinese">中文</a>
                 </div>
               </div>
             </li>
           </ul>
         </div>
       </div>
   </nav>
   <!-- Modal -->
</header>

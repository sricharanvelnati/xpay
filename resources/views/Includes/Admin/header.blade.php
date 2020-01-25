<div class="sidebar-toggle-box">
    <i class="fa fa-bars"></i>
</div>
<!--logo start-->
<a href="{{URL::to('admin/dashboard')}}" class="logo"><img src="{{URL::to('public/img/logo.png')}}" height="40px" weight="80px" hspace="25"></a>
<!--logo end-->

<div class="top-nav ">
  <!--search & user info start-->
  <ul class="nav pull-right top-menu">
      <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <img alt="" src="{{URL::to('public/img/profile/Profile-5ca49f468c302.jpg')}}" width="29px" height="29px">
              <span class="username">{{ Auth::user()->first_name }}</span>
              <b class="caret"></b>
          </a>
          <ul class="dropdown-menu extended  dropdown-menu-right">
              <div class="log-arrow-up"></div>
              <li><a href="{{URL::to('admin/profile')}}">Profile</a></li>
              <li><a href="{{URL::to('/changePassword')}}">Change Password</a></li>
			  @php
			  $idds=auth()->user()->roles->first()->id;
			   @endphp
			  
			 @if($idds == 3)
				 <li><a href="{{URL::to('merchant/logout')}}">Log Out</a></li>
             
			 @else
              <li><a href="{{URL::to('admin/logout')}}">Log Out</a></li>
			 @endif
			 
          </ul>
      </li>
  </ul>
  <!--search & user info end-->
</div>

<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="<?=(Request::is('admin/dashboard'))?"active":""?>"   href="{{URL::to('admin/dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
              @php

              $session_id = session()->getId('id');

               $idd=Auth::user()->id;
                 $idds=auth()->user()->roles->first()->id;
              @endphp

          
            <!-- users -->
            <li class="sub-menu">
                <!-- <a href="javascript:;" class="<?=(Request::is('admin/user/create') || Request::is('admin/user'))?"active":""?>" > -->
                <a href="javascript:;" class="<?=(Request::is('admin/user*'))?"active":""?>" >
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
               
                <ul class="sub">
                 @if($idds == 1)
                    <li class="<?=(Request::is('admin/user'))?"active":""?>" ><a  href="{{URL::to('admin/user')}}" >Users List</a></li>
					@foreach (\App\User::whereHas('roles', function($q){return $q->where('name', 'vendor');})->get() as $vendor)
                    <li class="<?=(Request::is('admin/user/vendorwise/'.$vendor->id))?"active":""?>" ><a  href="{{URL::to('admin/user/vendorwise/'.$vendor->id)}}" >{{$vendor->company_name}}</a></li>    
					@endforeach
                 @endif


                    @foreach (\App\User::whereHas('roles', function($q){return $q->where('name', 'vendor');})->where('id',$idd)->get() as $vendor)
                    <li class="<?=(Request::is('admin/user/vendorwise/'.$vendor->id))?"active":""?>" ><a  href="{{URL::to('admin/user/vendorwise/'.$vendor->id)}}" >{{$vendor->company_name}}</a></li>    
                    @endforeach

                </ul>
             
            </li>
          
            <!-- admins -->
            @if($idd == 1)
            <li class="sub-menu">
                <a href="javascript:;" class="<?=(Request::is('admin/root/create') || Request::is('admin/root'))?"active":""?>" >
                    <i class="fa fa-users"></i>
                    <span>Admins</span>
                </a>
                <ul class="sub">
                    <li class="<?=(Request::is('admin/root/create'))?"active":""?>"><a  href="{{URL::to('admin/root/create')}}" >Add Admins</a></li>
                    <li class="<?=(Request::is('admin/root'))?"active":""?>" ><a  href="{{URL::to('admin/root')}}" >Admins List</a></li>
                </ul>
            </li>
            @endif


            @if($idds == 1)
            <li class="sub-menu">
                <a href="javascript:;" class="<?=(Request::is('admin/vendors/create') || Request::is('admin/vendors'))?"active":""?>" >
                    <i class="fa fa-users"></i>
                    <span>Vendors</span>
                </a>
                <ul class="sub">
                    <li class="<?=(Request::is('admin/vendors/create'))?"active":""?>"><a  href="{{URL::to('admin/vendors/create')}}" >Add Vendor</a></li>
                    <li class="<?=(Request::is('admin/vendors'))?"active":""?>" ><a  href="{{URL::to('admin/vendors')}}" >Vendors List</a></li>
                </ul>
            </li>
            @endif
            <!-- CMS -->
           <!-- <li class="sub-menu">
               <a href="javascript:;" class="<?= Request::is('admin/cms/create') ? "active" : "" ?>">
                 <i class="fa fa-clipboard"></i>
                   <span>CMS</span>
               </a>
               <ul class="sub">
                   <li class="<?=(Request::is('admin/cms/create'))?"active":""?>" ><a  href="{{URL::to('admin/cms/create')}}" >Add CMS</a></li>
               </ul>
           </li> -->
           <!-- card  -->
           <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-clipboard"></i>
                    <span>Card</span>
                </a>
                <ul class="sub">
                @if($idds == 1)
                    <li class="<?=(Request::is('admin/card/cardLoad'))?"active":""?>" ><a href="{{URL::to('admin/card/cardLoad')}}" >Card Load</a></li>
				
					@foreach (\App\User::whereHas('roles', function($q){return $q->where('name', 'vendor');})->get() as $vendor)
                    <li class="<?=(Request::is('admin/card/cardLoad/vendorwise/'.$vendor->id))?"active":""?>" ><a  href="{{URL::to('admin/card/cardLoad/vendorwise/'.$vendor->id)}}" >{{$vendor->company_name}} Card Load</a></li>    
                    @endforeach
				
                @endif


                    @foreach (\App\User::whereHas('roles', function($q){return $q->where('name', 'vendor');})->where('id',$idd)->get() as $vendor)
                    <li class="<?=(Request::is('admin/card/cardLoad/vendorwise/'.$vendor->id))?"active":""?>" ><a  href="{{URL::to('admin/card/cardLoad/vendorwise/'.$vendor->id)}}" >{{$vendor->company_name}} Card Load</a></li>    
                    @endforeach

                    
                    @if($idds == 1)
                    <li class="<?=(Request::is('admin/card/cardPurchase'))?"active":""?>" ><a href="{{URL::to('admin/card/cardPurchase')}}" >Card Purchase</a></li>
                    @endif

                </ul>
            </li>
           <!-- Plans -->
            <!-- <li class="sub-menu">
                <a href="javascript:;" class="<?=(Request::is('admin/plan/create') || Request::is('admin/plan'))?"active":""?>" >
                    <i class="fa fa-cogs"></i>
                    <span>Plans</span>
                </a>
                <ul class="sub">
                    <li class="<?=(Request::is('admin/plan/create'))?"active":""?>" ><a href="{{URL::to('admin/plan/create')}}" >Add Plan</a></li>
                    <li class="<?=(Request::is('admin/plan'))?"active":""?>" ><a href="{{URL::to('admin/plan')}}" >Plan List</a></li>
                </ul>
            </li> -->
            <!-- Contact -->
			@if($idds == 1)
           <li class="sub-menu">
               <a href="javascript:;" class="<?= Request::is('admin/contact') ? "active" : "" ?>">
                 <i class="fa fa-user"></i>
                   <span>Contacts</span>
               </a>
               <ul class="sub">
                   <li class="<?=(Request::is('admin/contact'))?"active":""?>" ><a  href="{{URL::to('admin/contact')}}" >View Contact</a></li>
               </ul>
           </li>
		   @endif
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
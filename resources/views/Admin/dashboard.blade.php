@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
     <!--state overview start-->
              @php

               $idd=Auth::user()->id; 
              
              @endphp
              <div class="row state-overview">
               @if(Auth::user()->id !== '$idd')
                  <div class="col-lg-3 col-sm-6">
                    <a href="{{URL::to('admin/user')}}">
                      <section class="card">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  {{$totalUser}}
                              </h1>
                              <p>Total Users</p>
                          </div>
                      </section>
                    </a>
                  </div>
                  @endif

                  @if(Auth::user()->id == 1)
                  <div class="col-lg-3 col-sm-6">
                    <a href="{{URL::to('admin/card/cardPurchase')}}">
                      <section class="card">
                          <div class="symbol red">
                              <i class="fa fa-credit-card"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  {{$totalCardPurchase}}
                              </h1>
                              <p>Total Card Purchase</p>
                          </div>
                      </section>
                    </a>
                  </div>
                  @endif

                  @if(Auth::user()->id == 1)
                  <div class="col-lg-3 col-sm-6">
                    <a href="{{URL::to('admin/card/cardLoad')}}">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-usd"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  {{$totalCardLoad}}
                              </h1>
                              <p>Total AUSD OTC</p>
                          </div>
                      </section>
                    </a>
                  </div>
                  @endif

                  @if(Auth::user()->id == 1)
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1>
                                  {{$totalCardLoadEarn}}
                              </h1>
                              <p>Fees Earned</p>
                          </div>
                      </section>
                  </div>
              </div>
              @endif
              <!--state overview end-->
@endsection
@section('script')
	<script>
	</script>
@endsection
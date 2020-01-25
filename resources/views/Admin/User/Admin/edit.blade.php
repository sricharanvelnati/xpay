@extends('layouts.admin')
@section('assets')
<link type="text/css" rel="stylesheet" href="{{URL::to('public/Frontassets/css/intlTelInput.css')}}">
@endsection
@section('title', 'Edit Admin')
@section('content')
<!-- page start-->
      <div class="row">
				<div class="col-lg-4">
          <section class="card">
              <header class="card-header">
                  Edit Admin
              </header>
              <div class="card-body">
							<div class="flash-message">
								@foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
								<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
								@endif @endforeach
							</div>
            <form action="{{URL::to('admin/root/'.$getAdmin->id.'/update')}}" method="post">
								@if(!empty($errors->all()))
									<div class="alert alert-danger">
										@foreach($errors->all() as $error)
											<span> {{ $error }} </span>
										@endforeach
									</div>
								@endif
								{{csrf_field()}}
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" name="first_name" value="{{$getAdmin->first_name}}" required >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" name="last_name" value="{{$getAdmin->last_name}}" required >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="{{$getAdmin->email}}" required>
                </div>
                <div class="form-row">
                <div class="form-group form-label-group col-sm-12">
                  <input type="tel" id="phone" class="form-control" name="contactNumber" value="{{$getAdmin->contactNumber}}">
                  <input type="hidden" id="countryCode" class="form-control" name="countryCode" value="{{$getAdmin->countryCode}}">
                  <input type="hidden" id="countryName" class="form-control" name="countryName" value="{{$getAdmin->countryName}}">
                </div>
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{URL::to('admin/root')}}" class="btn btn-danger">Cancel</a>
            </form>
               </div>
                  </section>
                </div>
            </div>

@endsection
@section('script')
<script src="{{URL::to('public/Frontassets/js/intlTelInput.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/utils.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/custom.js')}}"></script>
<script>
$(document).ready(function(){
  // country code start
      var input = document.querySelector("#phone");
      var iti = window.intlTelInput(input, {
        utilsScript: "utils.js",
      });
      iti.setCountry($('#countryName').val());

    input.addEventListener("countrychange", function() {
      var countryData = iti.getSelectedCountryData();
      console.log(countryData);
      $('#countryCode').val(countryData.dialCode);
      $('#countryName').val(countryData.iso2);
    });
  // country code end
});
</script>
@endsection

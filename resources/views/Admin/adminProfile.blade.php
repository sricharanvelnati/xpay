@extends('layouts.admin')
@section('assets')
<link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
@endsection
@section('title', 'Add Product')
@section('content')
<!-- page start-->
      <div class="row">
				<div class="col-lg-4">
                      <section class="card">
                          <header class="card-header">
                              Add Product
                          </header>
                          <div class="card-body">
							<div class="flash-message">
								@foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
								<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
								@endif @endforeach
							</div>
            <form action="{{URL::to('admin/profile/store')}}" id="profileForm"  method="post" enctype="multipart/form-data">
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
										<input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" required>
									</div>
                  <div class="form-group">
										<label for="exampleInputEmail1">Last Name</label>
										<input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" required>
									</div>
                  <div class="form-group">
										<label for="exampleInputEmail1">Email</label>
										<input type="email" class="form-control" name="email" value="{{$user->email}}" required>
									</div>
                  <div class="form-group">
										<label for="exampleInputEmail1">Contact Number</label>
										<input type="text" class="form-control" name="contactNumber" value="{{$user->contactNumber}}" required>
									</div>
                <button type="submit" class="btn btn-primary">Submit</button>
								  <a href="{{URL::to('admin/product')}}" class="btn btn-danger">Cancel</a>
              </form>
               </div>
                  </section>
                </div>
            </div>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/Adminassets/bootstrap-daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/Adminassets/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script>
$(document).ready(function () {

    $(".js-example-basic-single").select2();

		$("#profileForm").validate();
    });
    //uploade Image show

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#customFile").change(function(){
            readURL(this);
        });

</script>
@endsection

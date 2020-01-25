@extends('layouts.admin')
@section('assets')
<link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/summernote/dist/summernote.css')}}" >
@endsection
@section('title', 'Add CMS')
@section('content')
<!-- page start-->
      <div class="row">
				<div class="col-sm-8">
          <section class="card">
              <header class="card-header">
                  Add CMS Content
              </header>
              <div class="card-body">
							<div class="flash-message">
								@foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
								<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
								@endif @endforeach
							</div>
            <form action="{{URL::to('admin/cms/update')}}" id="cmsForm"  method="post" enctype="multipart/form-data">
								@if(!empty($errors->all()))
									<div class="alert alert-danger">
										@foreach($errors->all() as $error)
											<span> {{ $error }} </span>
										@endforeach
									</div>
								@endif
								{{csrf_field()}}
									<div class="form-group">
										<label for="exampleInput">Site Email </label>
										<input type="email" class="form-control" name="email" value="{{@$getCms->email}}" required>
									</div>
                  <div class="form-group">
                    <label for="exampleInput">Contact Number</label>
                    <input type="number" class="form-control" name="contactNumber" value="{{@$getCms->contactNumber}}" required>
                  </div>
                  <div class="form-group">
										<label for="exampleInput">Address</label>
										<input type="textarea" class="form-control" name="address" value="{{@$getCms->address}}" required>
									</div>
                  <div class="form-group">
                    <label for="exampleInput">Privacy & Policy</label>
                    <div class="card-body">
                       <textarea name="privacy"  class="summernote privacy">{{@$getCms->privacy}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInput">Terms & Conditions</label>
                    <div class="card-body">
                       <textarea name="terms"  class="summernote terms">{{@$getCms->terms}}</textarea>
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
								  <a href="{{URL::to('admin/cms/create')}}" class="btn btn-danger">Cancel</a>
              </form>
               </div>
                  </section>
                </div>
            </div>
@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/Adminassets/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/Adminassets/summernote/dist/summernote.min.js')}}"></script>
<script>
	$(document).ready(function () {
    // summerNote Start
    jQuery(document).ready(function(){

         $('.summernote').summernote({
             height: 200,                 // set editor height
             minHeight: null,             // set minimum height of editor
             maxHeight: null,             // set maximum height of editor
             focus: true                 // set focus to editable area after initializing summernote
         });
     });
   //End
    $(".js-example-basic-single").select2();

		$("#cmsForm").validate();
    });

</script>
@endsection

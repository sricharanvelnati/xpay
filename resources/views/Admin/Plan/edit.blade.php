@extends('layouts.admin')
@section('assets')
<link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/rating/star-rating-svg.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
@endsection
@section('title', 'Edit Plan')
@section('content')
<!-- page start-->
      <div class="row">
				<div class="col-lg-4">
          <section class="card">
              <header class="card-header">
                  Edit Plan
              </header>
              <div class="card-body">
							<div class="flash-message">
								@foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
								<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
								@endif @endforeach
							</div>
            <form action="{{URL::to('admin/plan/'.$getPlan->id.'/update')}}" id="planForm" method="post" enctype="multipart/form-data">
								@if(!empty($errors->all()))
									<div class="alert alert-danger">
										@foreach($errors->all() as $error)
											<span> {{ $error }} </span>
										@endforeach
									</div>
								@endif
								{{csrf_field()}}
									<div class="form-group">
										<label for="exampleInputEmail1">Plan Name</label>
										<input type="text" class="form-control" name="planName" value="{{$getPlan->planName}}" required >
									</div>
                  <!-- image upload start -->
                    <div class="form-group row last">
                        <label class="control-label col-md-3">Banner Image</label>
                        <div class="col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{URL::to('public/img/plan/'.$getPlan->planImage)}}" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                 <span class="btn btn-white btn-file">
                                 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Change image</span>
                                 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                 <input type="file" class="default" name="planImage" />
                                 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- image upload end -->
                  <div class="form-group">
										<label for="exampleInputEmail1">Cost($/Year)</label>
									<div class="row">
                    <div class="col-md-5">
                    <input type="number" class="form-control" name="price" placeholder="Price" value="{{$getPlan->price}}" min="1" required>
                  </div>
                  <div class="col-md-2">
                    Per
                  </div>
                    <div class="col-md-5">
                      <input type="number" class="form-control" name="year" placeholder="Year" value="{{$getPlan->year}}" min="1" required >
                    </div>
                  </div>
									</div>
                  <div class="form-group">
										<label for="exampleInputEmail1">E-learning Program</label>
										<input type="hidden" class="form-control" name="eLearning" id="elearning" value="{{$getPlan->eLearning}}" required >
                    <div class="my-rating-learning"></div>
									</div>
                  <div class="form-group">
										<label for="exampleInputEmail1">Reward Points</label>
										<input type="hidden" class="form-control" name="rewardPoint" id="reward" value="{{$getPlan->rewardPoint}}" required>
                    <div class="my-rating-reward"></div>
									</div>
                  <div class="form-group">
										<label for="exampleInputEmail1">Mango Coin Earned($)</label>
										<input type="number" class="form-control" name="mangoCoinEarn" value="{{$getPlan->mangoCoinEarn}}" min="0" required>
									</div>
                  <div class="form-group">
										<label for="exampleInputEmail1">Referral Fee</label>
										<input type="hidden" class="form-control" name="referralFee" id="referral" value="{{$getPlan->referralFee}}" required >
                    <div class="my-rating-referral"></div>
									</div>
                <button type="submit" class="btn btn-primary">Submit</button>
								  <a href="{{URL::to('admin/plan')}}" class="btn btn-danger">Cancel</a>
              </form>
               </div>
                  </section>
                </div>
            </div>

@endsection
@section('script')
<script type="text/javascript" src="{{URL::to('public/Adminassets/rating/jquery.star-rating-svg.js')}}"></script>
<script type="text/javascript" src="{{URL::to('public/Adminassets/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script>
	$(document).ready(function () {
    var learning = '<?= $getPlan['eLearning']?>';
    $('.my-rating-learning').starRating('setRating',learning);
    var reward = '<?= $getPlan['rewardPoint']?>';
    $('.my-rating-reward').starRating('setRating',reward);
    var referral = '<?= $getPlan['referralFee']?>';
    $('.my-rating-referral').starRating('setRating',referral);

		$("#planForm").validate();
    });
    //learning Rating start

    $(".my-rating-learning").starRating({
        starSize: 25,
        callback: function(currentRating, $el){
            $('#elearning').val(currentRating);
        }
    });

  // End

  //reward Rating start

   $(".my-rating-reward").starRating({
      starSize: 25,
      callback: function(currentRating, $el){
          $('#reward').val(currentRating);
      }
    });

  // End

  //referral Rating start

    $(".my-rating-referral").starRating({
        starSize: 25,
        callback: function(currentRating, $el){
            $('#referral').val(currentRating);
        }
    });

  // End

</script>
@endsection

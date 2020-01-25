@extends('layouts.admin')
@section('title', 'View Plans')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header"> Plans </header>
            <div class="card-body">

				<div class="flash-message">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif @endforeach
				</div>

				<div class="adv-table">
					<table  class="display table table-bordered table-striped" id="dynamic-table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Plan Name</th>
								<th>Plan Image</th>
                <th>Price($)/ Year</th>
                <th>E-Learning Program(Out Of 5)</th>
                <th>Reward Points(Out Of 5)</th>
                <th>Mango Coin Earned($)</th>
                <th>Referral Fee(Out Of 5) </th>
                <th>Created At</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($getPlan as $Plan): ?>
							<tr class="gradeX">
								<td>{{ $Plan->id }}</td>
								<td>{{ $Plan->planName }}</td>
								<td><img src="{{URL::to('public/img/plan/'.$Plan->planImage)}}" width="75px" height="75px"></td>
                <td>{{ $Plan->price }} / {{ $Plan->year }}</td>
                <td>{{ $Plan->eLearning }}</td>
                <td>{{ $Plan->rewardPoint }}</td>
                <td>{{ $Plan->mangoCoinEarn }}</td>
                <td>{{ $Plan->referralFee }}</td>
								<td>{{ $Plan->created_at }}</td>
                <td>
                  @if($Plan->status == 'deactive')
                   <span class="badge badge-danger status" data-id="{{$Plan->id}}">DeActive</span>
                   @elseif($Plan->status == 'active')
                   <span class="badge badge-success status" data-id="{{$Plan->id}}">Active</span>
                   @else
                   <span class="badge badge-primary status" data-id="{{$Plan->id}}">Expired</span>
                  @endif
                </td>
								<td>
									<a class="btn btn-success btn-sm" style="margin-right:5px;"  href="{{URL::to('admin/plan/'.$Plan->id.'/edit')}}"><i class="fa fa-edit"></i></button>
								</td>
							</tr>
								<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).ready(function () {
    $('#dynamic-table').dataTable();
  });
    // change status start

 $('.status').on('click',function(){
   // sweet alert for update status
   swal({
     title: "Are you sure?",
     text: "Status will be changed after pressing OK",
     icon: "warning",
     buttons: true,
     dangerMode: true,
   })
   .then((willDelete) => {
     if (willDelete) {
       // ajax start for change status
       var planId = $(this).data('id');
         $.ajax({
           type:'POST',
           async:true,
           dataType: "json",
           url: "plan/updatePlanStatus",
           data: {_token:'{{ csrf_token() }}',planId:planId},
           context:this,
           success:function(data){

               if(data == 'deactive'){
                   $(this).closest('.status').removeClass().addClass('badge badge-danger label-mini status');
                   $(this).text('Deactive');
               }
               if(data == 'active'){
                   $(this).closest('.status').removeClass().addClass('badge badge-success label-mini status');
                   $(this).text('Active');
               }
           }
         });
         // end
       // swal("Your Status Changed...!", {
       //   icon: "success",
       // });

     } else {
       swal("No changes were made!");
     }
   });

    });
 // end


</script>
@endsection

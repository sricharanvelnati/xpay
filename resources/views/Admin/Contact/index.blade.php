@extends('layouts.admin')
@section('title', 'View Contact')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header"> Contact Us </header>
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
								<th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Message</th>
                <th>Image</th>
                <th>Response</th>
                <th>Response Image</th>
                <th>Contact Time</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
            @foreach($getContact as $contact)
							<tr class="gradeX">
								<td>{{$contact->id}}</td>
								<td>{{$contact->name}}</td>
                <td>{{$contact->phoneNumber}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->message}}</td>
                <td>
                  <?php
                    $supported_image = array('pdf','txt');
                    $ext = strtolower(pathinfo($contact->imagefile, PATHINFO_EXTENSION));
                   ?>
                    @if(in_array($ext, $supported_image))
                  	  <a target="_blank" href="{{URL::to('public/img/contact/receive/'.$contact->imagefile)}}">{{$contact->response_imagefile}}</a>
                    @elseif($contact->imagefile)
                      <img src="{{URL::to('public/img/contact/receive/'.$contact->imagefile)}}" width="75px" height="75px">
                    @else
                      <img src="{{URL::to('public/img/default.png')}}"  width="75px" height="75px">
                    @endif
                </td>
                <td>
                  @if($contact->response)
                    {{$contact->response}}
                  @else
                    <span class="badge badge-info label-mini" id="res{{$contact->id}}">Pending</span>
                  @endif
                </td>
                <td>
                  <?php
                    $exts = strtolower(pathinfo($contact->response_imagefile, PATHINFO_EXTENSION));
                   ?>
                   @if(in_array($exts, $supported_image))
                     <a target="_blank" href="{{URL::to('public/img/contact/replay/'.$contact->response_imagefile)}}">{{$contact->response_imagefile}}</a>
                   @elseif($contact->response_imagefile)
                     <img src="{{URL::to('public/img/contact/replay/'.$contact->response_imagefile)}}" width="75px" height="75px">
                   @else
                     <img src="{{URL::to('public/img/default.png')}}" id="im{{$contact->id}}" width="75px" height="75px">
                   @endif

                </td>
                <td>{{$contact->created_at->setTimezone('GMT+08')}}</td>
                <td>
                  @if($contact->status == 'pending')
                  <span href="#myModal" data-toggle="modal" class="badge badge-warning label-mini contact" data-id="{{$contact->id}}" id="status{{$contact->id}}">Reply</span>
                  @else
                  <span class="badge badge-success label-mini contact" id="status{{$contact->id}}">Replied</span>
                  @endif
                </td>
							</tr>
            @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- Modal Start -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">Response Form</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form id="uploadForm" action="{{URL::to('admin/contact/response')}}" method="post">
                 @csrf
                 <input type="hidden" id="contactId" name="contactId">
                   <div class="form-group">
                       <label for="exampleInputEmail1">Response: </label>
                       <textarea name="response" class="form-control" placeholder="reply to client"></textarea>
                   </div>
                   <div class="form-group">
                       <label for="exampleInputFile">Response Image</label>
                       <input type="file" class="form-control" id="exampleInputFile3" name="response_imagefile">
                   </div>
                   <button type="submit" class="btn btn-info">Submit</button>
               </form>
           </div>
       </div>
   </div>
</div>
<!-- Modal End -->
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
var APP_URL = {!! json_encode(url('/')) !!};
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

// send replay to user START
$('.contact').on('click',function(){

var contactId = $(this).data('id');
$('#contactId').val(contactId);
$('#uploadForm').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
          if(data.status === 'replied'){
            $('#myModal').modal('toggle');
            $('#status'+contactId).removeAttr('class').addClass('badge badge-success label-mini contact');
            $('#status'+contactId).text('Replied');
            $('#res'+contactId).removeAttr('class').text(data.response);
            if(data.response_imagefile){
            $('#im'+contactId).attr('src',APP_URL+'/public/img/contact/replay/'+data.response_imagefile);
            } else {
            $('#im'+contactId).attr('src',APP_URL+'/public/img/default.png');
          }
          }
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}));

});
// send replay to user End

</script>
@endsection

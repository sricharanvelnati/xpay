@extends('layouts.admin')
@section('title', 'View Users')
@section('assets')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header"> Users </header>
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
								<th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                @if(!$is_vendor_wise)
                <th>Mailing Address</th>
                @endif
                <th>Contact Number</th>
                @if(!$is_vendor_wise)
                <th>Email Verified?</th>
                @endif
                @if(!$is_vendor_wise)
                <th>KYC Approved?</th>
                <th>Assign Card Number</th>
                @endif
                @if($is_vendor_wise)
                <th>Card Number</th>
                @endif
                <th>Create Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($getUsers as $user)
							<tr class="gradeX">
								<td>{{ $user->id }}</td>
								<td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                @if(!$is_vendor_wise)
                <td>
                  {{ $user->address1 }}</br>
                  {{$user->address2}}</br>
                  {{$user->city}}@if(!empty($user->pincode)),{{$user->pincode}}@endif</br>
                  {{$user->state}}@if(!empty($user->d_country)),{{$user->d_country}}@endif
                </td>
                @endif
                <td>{{ $user->contactNumber }}</td>
                @if(!$is_vendor_wise)
                <td>
                  @if($user->email_verified_at != null)
                    Verified
                  @else
                    Pending
                  @endif
                </td>
                @endif
                @if(!$is_vendor_wise)
                <td> {{$user->is_kyc_approved == 0 ?'Not Approved' : 'Approved'}}
                    @if($user->is_kyc_details == 1)
                        <a href="{{URL::to('admin/user/kyc-pdf/'.$user->id)}}"  target="_blank" style="font-weight: bold">KYC PDF </a>
                    @endif
                    @if($user->is_KYC_image == 1)
                        <br/>
                        <a href="{{URL::to('admin/user/kyc/'.$user->id.'/passport')}}"  style="font-weight: bold">PASSPORT</a>
                    @endif
                </td>
                @endif
                @if(!$is_vendor_wise)
                <td>
                  @if($user->cardStatus == 'assigned')
                  <span class="badge badge-info label-mini upUrn">URN:{{$user->urnNumber}}</span>
                  <span class="badge badge-warning label-mini upCard">CARD:{{$user->cardNumber}}</span>
                  <span class="badge badge-primary label-mini updateCard" style="cursor:pointer" data-id="{{$user->id}}" data-urn="{{$user->urnNumber}}" data-card="{{$user->cardNumber}}" data-card="{{$user->cardNumber}}">update</span>
                  @elseif($user->cardStatus == 'verified')
                  <span class="badge badge-info label-mini">URN:{{$user->urnNumber}}</span>
                  <span class="badge badge-warning label-mini">CARD:{{$user->cardNumber}}</span>
                  <span class="badge badge-success label-mini">Verified</span>
                  @elseif($user->cardStatus == 'blocked')
                  <span class="badge badge-info label-mini">URN:{{$user->urnNumber}}</span>
                  <span class="badge badge-warning label-mini">CARD:{{$user->cardNumber}}</span>
                  <span class="badge badge-danger label-mini">Blocked</span>
                  @else
                  <input type="text" maxlength="16" minlength="16" name="urnNumber" class="urnNumber" data-id="{{$user->id}}" placeholder="URN No.">
                  <input type="text" maxlength="16" minlength="16" name="cardNumber" class="cardNumber" data-id="{{$user->id}}" placeholder="Debit Card No.">
                  <span class="badge badge-info label-mini assigncard" style="cursor: pointer;" data-id="{{$user->id}}">Pending</span>
                  @endif
                </td>
                @endif
                @if($is_vendor_wise)
                <td>{{ $user->cardNumber }}</td>
                @endif
                <td>{{ $user->created_at->setTimezone('GMT+08') }}</td>
								<td>
                  @if($user->status == 'active')
                  <span class="badge badge-success label-mini status" data-id="{{$user->id}}">Activated</span>
                  @else
                  <span class="badge badge-danger label-mini status" data-id="{{$user->id}}">Deactivated</span>
                  @endif
								</td>
                <td>
					<span class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-attachments = "{{json_encode(optional($user->attachments)->toArray())}}" data-details="{{json_encode($user->toArray())}}" data-id="{{$user->id}}" style="margin-right:5px;"><i class="fa fa-eye" aria-hidden="true"></i></span>
					<span class="btn btn-success btn-sm edit" data-toggle="modal" data-target="#edit_modal" data-details="{{json_encode($user->toArray())}}" data-id="{{$user->id}}" style="margin-right:5px;"><i class="fa fa-pencil" aria-hidden="true"></i></span>
					<span class="btn btn-danger btn-sm delete" data-id="{{$user->id}}" style="margin-right:5px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <style>
	  .newclasse >.form-group>.col-form-label{width:200px;}
	  .form-group{margin-bottom: 0rem;}
	  .newclasse { margin: 0% 25%;}
	  
	  </style>
	  
      <div class="modal-body">
          <div class="row col-12 newclasse" style="text-align: left;">
             
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">URN number</label>
              <label class="col-form-label" id="urn"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">PEP</label>
              <label class="col-form-label" id="pep"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">First Name</label>
              <label class="col-form-label" id="first_name"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">DOB</label>
              <label class="col-form-label" id="dob"></label>
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Last Name</label>
              <label class="col-form-label" id="last_name"></label>
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Email</label>
              <label class="col-form-label" id="email"></label>
            </div>
             <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">City</label>
              <label class="col-form-label" id="city"></label>
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">State</label>
              <label class="col-form-label" id="state"></label>
            </div> 
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Zipcode</label>
              <label class="col-form-label" id="zip"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Address1</label>
              <label class="col-form-label" id="address1"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Address2</label>
              <label class="col-form-label" id="address2"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Country</label>
              <label class="col-form-label" id="country"></label>
            </div> 	  		
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Card Number</label>
              <label class="col-form-label" id="cardNumber"></label>
            </div>
			<!-- <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Nation id</label>
              <label class="col-form-label" id="nation_id"></label>
            </div>  -->
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Phone Number</label>
              <label class="col-form-label" id="phone"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Maiden Name</label>
              <label class="col-form-label" id="maiden_name"></label>
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Passport Id</label>
              <label class="col-form-label" id="passport_id"></label>
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Status</label>
              <label class="col-form-label" id="status"></label>
            </div>
			
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Attachments</label>
			  <a id="kyc" href="{{URL::to('public/img/finexus_kyc/')}}"  target="_blank" style="font-weight: bold">KYC PDF </a>
			  <!-- <label class="col-form-label" id="kyc"></label> -->
			   
            </div>
			
          </div> 
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document" style="width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <style>
	  .newclasse >.form-group>.col-form-label{width:200px;}
	  .form-group{margin-bottom: 0rem;}
	  .newclasse { margin: 0% 25%;}
	  
	  </style>
	  
      <div class="modal-body">
          <div class="row" style="text-align: left;">
             
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">URN number</label>
              <input class="col-form-label form-control" id="e_urn">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">PEP</label>
              <input class="col-form-label form-control" id="e_pep">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">First Name</label>
              <input class="col-form-label form-control" id="e_first_name">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">DOB</label>
              <input class="col-form-label form-control" id="e_dob">
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Last Name</label>
              <input class="col-form-label form-control" id="e_last_name">
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Email</label>
              <input class="col-form-label form-control" id="e_email">
            </div>
             <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">City</label>
              <input class="col-form-label form-control" id="e_city">
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">State</label>
              <input class="col-form-label form-control" id="e_state">
            </div> 
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Zipcode</label>
              <input class="col-form-label form-control" id="e_zip">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Address1</label>
              <input class="col-form-label form-control" id="e_address1">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Address2</label>
              <input class="col-form-label form-control" id="e_address2">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Country</label>
              <input class="col-form-label form-control" id="e_country">
            </div> 	  		
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Card Number</label>
              <input class="col-form-label form-control" id="e_cardNumber">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Phone Number</label>
              <input class="col-form-label form-control" id="e_phone">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Maiden Name</label>
              <input class="col-form-label form-control" id="e_maiden_name">
            </div>
			<div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Passport Id</label>
              <input class="col-form-label form-control" id="e_passport_id">
            </div>
            <div class="form-group col-12">
              <label class="col-form-label font-weight-bold">Status</label>
              <select class="form-control" id="e_status">
				  <option value="2">Active</option>
				  <option value="3">Deactive</option>
				</select>
            </div>
          </div>
		  <hr>
		  <div class="row">
				<button class="btn btn-secondary m-2" class="close" data-dismiss="modal">Close</button>
				<button id="save_edit" class="btn btn-primary m-2" data-id="">Save Changes</button>		
		  </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script>
	$(document).ready(function () {
		
	/* EDIT MODAL START */
	
	$(document).on('click','#save_edit',function(){
		var userId = $(this).data('id');
		let update_data = {
			dob:$('#e_dob').val(),
			countryCode:$('#e_zip').val(),
			address1:$('#e_address1').val(),
			address2:$('#e_address2').val(),
			contactNumber:$('#e_phone').val(),
			pep:$('#e_pep').val(),
			maiden_name:$('#e_maiden_name').val(),
			passport_id:$('#e_passport_id').val(),
			urnNumber:$('#e_urn').val(),
			first_name:$('#e_first_name').val(),
			last_name:$('#e_last_name').val(),
			email:$('#e_email').val(),
			city:$('#e_city').val(),
			state:$('#e_state').val(),
			d_country:$('#e_country').val(),
			cardNumber:$('#e_cardNumber').val(),
			status:$('#e_status').val(),
		};
		
		let data_save = {
			_token:'{{ csrf_token() }}',
			userId:userId,
			user_data:update_data
			};
		$.ajax({
            type:'POST',
            url: "{{route('admin.user.user-info-update')}}",   
            data: data_save,
            success: function(result){
				location.reload();
            }
        });
	});
	
	$('#edit_modal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		user = button.data('details');
		let id = button.data('id');
		$('#save_edit').attr('data-id',id);
		
		var modal = $(this)
		modal.find('.modal-body #e_dob').val(user.dob)
		modal.find('.modal-body #e_zip').val(user.pincode)
	    modal.find('.modal-body #e_address1').val(user.address1)
		modal.find('.modal-body #e_address2').val(user.address2)
		modal.find('.modal-body #e_phone').val(user.contactNumber)
		modal.find('.modal-body #e_pep').val(user.pep) 
		modal.find('.modal-body #e_maiden_name').val(user.maiden_name)
		modal.find('.modal-body #e_passport_id').val(user.passport_id)
		modal.find('.modal-body #e_urn').val(user.urnNumber)
		modal.find('.modal-body #e_first_name').val(user.first_name)
		modal.find('.modal-body #e_last_name').val(user.last_name)
		modal.find('.modal-body #e_email').val(user.email)
		modal.find('.modal-body #e_city').val(user.city)
		modal.find('.modal-body #e_state').val(user.state)
		modal.find('.modal-body #e_country').val(user.d_country)
		modal.find('.modal-body #e_cardNumber').val(user.cardNumber);
		//modal.find('.modal-body #e_status').val(user.status == 'active'? '2' : '3');
		modal.find('.modal-body #status').html(user.status == 'active'? 'Activated' : 'Deactivated');
		
    })
	/* EDIT MODAL END */
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      user = button.data('details');
      attachments = button.data('attachments');
      // console.log(details);
      // user = $.parseJSON(details);

      var modal = $(this)
      // modal.find('.modal-title').text('New message to ' + recipient)
	  modal.find('.modal-body #dob').html(user.dob)
	  modal.find('.modal-body #zip').html(user.pincode)
	    modal.find('.modal-body #address1').html(user.address1)
		  modal.find('.modal-body #address2').html(user.address2)
		  //modal.find('.modal-body #nation_id').html(user.nation_id)
		  modal.find('.modal-body #phone').html(user.contactNumber)
		  modal.find('.modal-body #pep').html(user.pep) 
		  modal.find('.modal-body #maiden_name').html(user.maiden_name)
		  modal.find('.modal-body #passport_id').html(user.passport_id)
	  modal.find('.modal-body #urn').html(user.urnNumber)
      modal.find('.modal-body #first_name').html(user.first_name)
      modal.find('.modal-body #last_name').html(user.last_name)
      modal.find('.modal-body #email').html(user.email)
      modal.find('.modal-body #city').html(user.city)
      modal.find('.modal-body #state').html(user.state)
	  modal.find('.modal-body #country').html(user.d_country)
      modal.find('.modal-body #cardNumber').html(user.cardNumber);
      //modal.find('.modal-body #status').html(user.status == 'active'? 1 : 2);
	  modal.find('.modal-body #status').html(user.status == 'active'? 'Activated' : 'Deactivated');
	  var kycpdf_url = '{{URL::to('public/img/finexus_kyc/')}}';
	  modal.find('.modal-body #kyc').attr('href',  kycpdf_url + '/' +user.id+'-KYC-FINEXUS.pdf');
      
      attachments_html = '';
      $.each(attachments, function(i, v){
        attachments_html += '<div class="  col-12 attachment_container"> <label class="col-form-label"><a target="_blank" href="{{url("public/img/kyc")}}/'+v.name+'">'+v.name+'</a></label></div>';
      })
      modal.find('.modal-body .row:first').append(attachments_html);
    })
    $('#exampleModal').on('hidden.bs.modal', function (event) {
      $('.attachment_container').remove();
    })
    // $('#dynamic-table').dataTable();
    $('#dynamic-table').DataTable( {
       dom: 'Bfrtip',
       buttons: [
           'csv'
       ]
    });
   });

   function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
 }

    // status change start
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
        var userId = $(this).data('id');
          $.ajax({
            type:'POST',
            async:true,
            dataType: "json",
            url: "{{route('admin.user.user-status-update')}}",   
            data: {_token:'{{ csrf_token() }}',userId:userId},
            context:this,
            success:function(data){

                if(data == 'deactive'){
                    $(this).closest('.status').removeClass().addClass('badge badge-danger label-mini status');
                    $(this).text('Deactivated');
                }
                if(data == 'active'){
                    $(this).closest('.status').removeClass().addClass('badge badge-success label-mini status');
                    $(this).text('Activated');
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
      // end

     });
    // status change end

    // card assign to user start
    $('.assigncard').on('click',function(){
      var cardNumber = $(this).closest('td').find('.cardNumber').val();
      var urnNumber = $(this).closest('td').find('.urnNumber').val();
    if($.isNumeric(cardNumber) && cardNumber.length === 16 && $.isNumeric(urnNumber) && urnNumber.length === 16){
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
        var userId = $(this).data('id');
          $.ajax({
            type:'POST',
            async:true,
            dataType: "json",
            url: "user/assignCard",
            data: {_token:'{{ csrf_token() }}',userId:userId,cardNumber:cardNumber,urnNumber:urnNumber},
            context:this,
            success:function(data){
                if(data['errors']){
                  alert(data['errors']['cardNumber'][0]);
                }
                if(data == 'assigned'){
                    $(this).closest('.assigncard').removeClass().addClass('badge badge-success label-mini');
                    $(this).text('Assigned');
                    $(this).closest('td').find('.cardNumber').prop('disabled', true);
                    $(this).closest('td').find('.urnNumber').prop('disabled', true);
                }
            }
          });
          // end
        swal("Are You Sure about 16-Digit Card Assignment Number?", {
          icon: "success",
        });

      } else {
        swal("Card Assignment Proccess Aborted...!");
      }
    });
  } else { //check card number is not empty IF end
    swal({
      title: "Are you sure?",
      text: "Status will be changed after pressing OK",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Please Enter 16-Digits Card Number Properly(Numeric)for Assign", {
          icon: "success",
        });

      } else {
        swal("Card Assignment Proccess Aborted...!");
      }
    });
    }
      // end
     });
  // card assign to user end

  // update Card Number Start
    $('.updateCard').on('click',function(){
        var urn = $(this).data('urn');
        var card = $(this).data('card');
      Swal.fire({
        title: 'Update Card Number',
        // input: 'text',
        html:
         'URN NO.:<input id="swal-input1" class="swal2-input" maxlength="16" minlength="16" value="'+urn+'" onkeypress="return isNumber(event)"></br>' +
         'Debit Card No.:<input id="swal-input2" class="swal2-input" maxlength="16" minlength="16" value="'+card+'" onkeypress="return isNumber(event)">',
        showCancelButton: true,
        confirmButtonText: 'Update',
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
          var urnNumber = $('#swal-input1').val();
          var cardNumber = $('#swal-input2').val();

         if(!$.isNumeric($('#swal-input1').val()) || !$.isNumeric($('#swal-input2').val())){
           swal("Please Enter Card Number / URN Number as a Digits.");
         } else if($('#swal-input1').val().length !== 16 || $('#swal-input2').val().length !== 16){
             swal("Please Enter Valid Card Number / URN Number");
         } else {
           var userId = $(this).data('id');
           // var cardNumber = result.value;

           $.ajax({
             type:'POST',
             async:true,
             dataType: "json",
             url: "../admin/card/updateCardNumber",
             data: {_token:'{{ csrf_token() }}',userId:userId,urnNumber:urnNumber,cardNumber:cardNumber},
             context:this,
             success:function(data){
                if(data == 'error'){
                  swal("Card Number OR URN Number Already Exist!");
                } else {
                  $(this).closest('td').find('.upUrn').text('URN:'+data.urnNumber);
                  $(this).closest('td').find('.upCard').text('CARD:'+data.cardNumber);
                  $(this).data('urn',data.urnNumber);
                  $(this).data('card',data.cardNumber);
                }
             }
           });
         }
      });

     });

    // update Card Number End

    // delete user start
    $('.delete').on('click',function(){
    // sweet alert for update status
    swal({
      title: "Are you sure?",
      text: "User will be delete after pressing OK",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // ajax start for change status
        var deleteId = $(this).data('id');
          $.ajax({
            type:'POST',
            async:true,
            dataType: "json",
            url: "{{route('admin.user.user-delete')}}",
            data: {_token:'{{ csrf_token() }}',deleteId:deleteId},
            context:this,
            success:function(data){
              if(data == 'deleted'){
                $(this).parents("tr").remove();
              }
            }
          });
          // end
      } else {
        swal("No changes were made!");
      }
    });
      // end
     });
    // delete user end
</script>
@endsection

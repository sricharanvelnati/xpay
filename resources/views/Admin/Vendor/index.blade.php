@extends('layouts.admin')
@section('title', 'View Vendors')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header"> Vendors </header>
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
								<th>Company Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <!--<th>API Token</th> -->
								<th>Partner Fee</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vendors as $vendor): ?>
                            <tr class="gradeX">
                                <td>{{ $vendor->id }}</td>
                                <td>{{ $vendor->first_name }}</td>
                                <td>{{ $vendor->last_name }} </td>
								<td>{{ $vendor->company_name }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>{{ $vendor->contactNumber }}</td>
                               <!-- <td>{{ $vendor->api_token }}</td> -->
							   <td>{{$vendor->partner_fee }} </td>
                                <td>{{ $vendor->created_at }}</td>
                                <td>
                                    @if($vendor->status == 'deactive')
                                    <span class="badge badge-danger status" data-id="{{$vendor->id}}">DeActive</span>
                                    @elseif($vendor->status == 'active')
                                    <span class="badge badge-success status" data-id="{{$vendor->id}}">Active</span>
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" style="margin-right:5px;"  href="{{URL::to('admin/vendors/'.$vendor->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                    <span class="btn btn-danger btn-sm delete" data-id="{{$vendor->id}}" style="margin-right:5px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
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
      swal({
     title: "Are you sure?",
     text: "Status will be changed after pressing OK",
     icon: "warning",
     buttons: true,
     dangerMode: true,
      })
      .then((willDelete) => {
     if (willDelete) {
    
       var vendorId = $(this).data('id');
    	 $.ajax({
    	   type:'POST',
    	   async:true,
    	   dataType: "json",
    	   url: "vendors/status",
    	   data: {_token:'{{ csrf_token() }}',vendorId:vendorId},
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
     } else {
       swal("No changes were made!");
     }
      });
    
    });
    // end
    
    // delete Vendor Start
    $('.delete').on('click',function(){
      swal({
     title: "Are you sure?",
     text: "Vendor will be Delete after pressing OK",
     icon: "warning",
     buttons: true,
     dangerMode: true,
      })
      .then((willDelete) => {
     if (willDelete) {
    
       var vendorId = $(this).data('id');
    	 $.ajax({
    	   type:'POST',
    	   async:true,
    	   dataType: "json",
    	   url: "vendors/delete",
    	   data: {_token:'{{ csrf_token() }}',vendorId:vendorId},
    	   context:this,
    	   success:function(data){
    		  if(data == 'deactive'){
    			$(this).parents("tr").remove();
    		  }
    	   }
    	 });
     } else {
       swal("No changes were made!");
     }
      });
    
    });
    
    // delete Vendor End
    
</script>
@endsection
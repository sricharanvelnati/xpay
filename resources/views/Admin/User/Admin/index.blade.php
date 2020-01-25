@extends('layouts.admin')
@section('title', 'View Admins')
@section('content')


<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header"> Admins </header>
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
								<th>Last Image</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Created At</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($getAllAdmins as $admin): ?>
							<tr class="gradeX">
								<td>{{ $admin->id }}</td>
								<td>{{ $admin->first_name }}</td>
                <td>{{ $admin->last_name }} </td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->contactNumber }}</td>
								<td>{{ $admin->created_at }}</td>
                <td>
                  @if($admin->status == 'deactive')
                   <span class="badge badge-danger status" data-id="{{$admin->id}}">DeActive</span>
                   @elseif($admin->status == 'active')
                   <span class="badge badge-success status" data-id="{{$admin->id}}">Active</span>
                   @else
                  @endif
                </td>
								<td>
									<a class="btn btn-success btn-sm" style="margin-right:5px;"  href="{{URL::to('admin/root/'.$admin->id.'/edit')}}"><i class="fa fa-edit"></i></a>
									<span class="btn btn-danger btn-sm delete" data-id="{{$admin->id}}" style="margin-right:5px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
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

       var adminId = $(this).data('id');
         $.ajax({
           type:'POST',
           async:true,
           dataType: "json",
           url: "root/status",
           data: {_token:'{{ csrf_token() }}',adminId:adminId},
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

 // delete Admin Start
 $('.delete').on('click',function(){
   swal({
     title: "Are you sure?",
     text: "Admin will be Delete after pressing OK",
     icon: "warning",
     buttons: true,
     dangerMode: true,
   })
   .then((willDelete) => {
     if (willDelete) {

       var adminId = $(this).data('id');
         $.ajax({
           type:'POST',
           async:true,
           dataType: "json",
           url: "root/delete",
           data: {_token:'{{ csrf_token() }}',adminId:adminId},
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

 // delete Admin End

</script>
@endsection

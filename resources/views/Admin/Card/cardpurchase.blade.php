@extends('layouts.admin')
@section('title', 'Card Purchase')
@section('assets')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header"> Card Purchase History </header>
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
                <th>Contact Number</th>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Note</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						@foreach($getPayment as $payment)
							<tr class="gradeX">
								<td>{{ $payment->id }}</td>
								<td>{{ $payment->first_name }}</td>
                <td>{{ $payment->last_name }}</td>
                <td>{{ $payment->email }}</td>
                <td>{{ $payment->contactNumber }}</td>
                <td>{{$payment->paymentType}}</td>
                <td>{{$payment->amount}}</td>
                <td>{{$payment->account}}</td>
                <td class="newStatus{{$payment->id}}">
                  @if($payment->status == 'pending')
                  <span class="badge badge-warning label-mini confirm" data-id="{{$payment->id}}">Confirm</span>
                  @elseif($payment->status == 'confirm')
                  <span class="badge badge-success label-mini">{{$payment->updated_at}}</span>
                  @else
                  <span class="badge badge-info label-mini">{{$payment->status}}</span>
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
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    // $('#dynamic-table').dataTable();
    $('#dynamic-table').DataTable( {
       dom: 'Bfrtip',
       buttons: [
           'csv'
       ]
    });
      });
    // status change start
    $('.confirm').on('click',function(){
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
        var paymentId = $(this).data('id');
          $.ajax({
            type:'POST',
            async:true,
            dataType: "json",
            url: "updateByAdmin",
            data: {_token:'{{ csrf_token() }}',paymentId:paymentId},
            context:this,
            success:function(data){
            var html = '<span class="badge badge-success label-mini">'+data+'</span>';
              $('.newStatus'+paymentId+'').html(html);
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
</script>
@endsection

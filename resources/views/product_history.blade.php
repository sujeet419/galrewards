@extends('admin.admin_master')
@section('admin')

@php 





@endphp

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Order History</h1>
    
<nav aria-label="breadcrumb">
<ol class="breadcrumb p-0">
<li class="breadcrumb-item">
<a href="{{ route('dashboard')}}">
<span class="mdi mdi-home"></span>                
</a>
</li>
<li class="breadcrumb-item">
components
</li>
<li class="breadcrumb-item" aria-current="page">Product History</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
					@error('cencel_reason')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </h2>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Order Number</th>
							<th>Product Subtotal</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Order Status</th>
                            <th>View Order</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1; 

                            @endphp
                          
                        @foreach ($prhistory as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            <td>{{ $item->invoice_no ?? '' }}</td>
							<td>{{ $item->points ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y/m/d')}}</td>
                            <td>
                                @if ($item->status == 1)
                                <span class="badge badge-pill badge-success" style="background-color: yellow;">Pending</span> 
                              @elseif($item->status == 4)
								 <span class="badge badge-pill badge-success" style="background-color: green;">Delivered</span> 							
                                @elseif($item->status == 2)
								 <span class="badge badge-pill badge-success" style="background-color: green;">Confirmed</span>  
								@else
                                <span class="badge badge-pill badge-success" style="background-color: red;">Canceled</span>   
                                @endif
                               
                                </td> 
                            <td>
                                <a href="{{ route('order.view',$item->invoice_no )}}">
                                    <button class="btn btn-danger editcategory" value="{{ $item->invoice_no }}" title="order View">
                                        <i class="fa fa-eye"></i></button></a>
                            </td>
							
							  <td>
                                @if ($item->status == 1 || $item->status == 2)
                                <button class="btn btn-danger editorder" value="{{ $item->id }}" title="Edit" data-toggle="modal" data-target="#exampleModalFormedit">
                                    Action </button>
                                @else
                                    
                                @endif
                                
                                
                              
                            </td>
							
                        </tr>
                
                        @endforeach
                
                        </tbody>
						
		
						
                </table>
            </div>
        </div>
    </div>
</div>
						
</div>
<div id="loader"></div>

<div class="modal fade" id="exampleModalFormedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormedit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormedit">Take Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('order_status')}}" style="display: flex;" id="delete_form">
                    @csrf
                    
                 
                    <input type="hidden" name="orer_id" id="orer_id">
                    <input type="hidden" name="email" id="email">
                    <input type="hidden" name="closing_bal" id="closing_bal">
                    <input type="hidden" name="mail_point" id="mail_point">
					<input type="hidden" name="invoice_no" id="invoice_no">
					  <div class="form-row">	
				 <div class="form-group col-md-6">
      <label for="narration">Narration</label>
     <input type="text" class="form-control" id="narration" placeholder="Narration" name="narration">
    </div>		
					
					
	 <div class="form-group col-md-6">
      <label for="change_status">Change Status</label>
     <select class="form-control" id="change_status" name="change_status" required="">
    <option selected="">Select Any</option>
    <option value="2">Confirm</option>
 	<option value="3">Decline</option> 
	<option value="4">Delivered</option> 
	</select>
    </div>
					
					
					</div>
			
					
					
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>

                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- ----------------------------------------------Upload File ------------------------------------------ --}}
// <script type="text/javascript">
// $(function(){
	// var spinner = $('#loader')
// $(document).on('click','#delete',function(e){
// e.preventDefault();
// //var link = $(this).parents('form');

// Swal.fire({
  // title: 'Are you sure?',
  // text: " You Want To Update Points!",
  // icon: 'warning',
  // showCancelButton: true,
  // confirmButtonColor: '#3085d6',
  // cancelButtonColor: '#d33',
  // confirmButtonText: 'Yes, Update it!'
// }).then((result) => {
  // if (result.isConfirmed) {
	   // //spinner.show();
    // $("#delete_form").submit();
    // // Swal.fire(
      // // 'Update!',
      // // 'points has been Updated.',
      // // 'success'
    // // )
  // }
// })
// });
// });
// </script>

<script type="text/javascript">
$.ajaxSetup({ 
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
$(document).on('click', '.editorder', function(e){
    e.preventDefault();
  var id = $(this).val();
 // alert(id);
  //console.log(brandidname);
    $.ajax({
    type: "GET",
    url: "{{ url('/order/change') }}"+id,
    dataType: "json",
    success: function (response) {
       // console.log(response)
        var closing_bal = response.order[0].closing_bal + response.order[0].points;
        var mail_point = response.order[0].points ;
       $("#orer_id").val(id);
       $("#email").val(response.order[0].email);
      $("#invoice_no").val(response.order[0].invoice_no);
      $("#closing_bal").val(closing_bal);
      $("#mail_point").val(mail_point);
    }
  });
  });
});
</script>






@endsection
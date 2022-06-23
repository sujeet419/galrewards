@extends('admin.admin_master')
@section('admin')

@php 
  $invoice_no =  Request::segment(3);
@endphp

<div class="content">							
    <div class="breadcrumb-wrapper">
    <h1>Order View</h1>
<nav aria-label="breadcrumb">
<ol class="breadcrumb p-0">
<li class="breadcrumb-item">
<a href="{{ route('dashboard')}}">
<span class="mdi mdi-home"> </span>                
</a>
</li>
<li class="breadcrumb-item">
components
</li>
<li class="breadcrumb-item" aria-current="page">Order View</li>
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
				
				<form action="{{ route('generateorderPDF') }}" method="POST" enctype="multipart/form-data" >
				@csrf 
				<input type="hidden" name="invoice_no" class="form-control" value="{{$invoice_no}}" readonly   autocomplete=off>
				
				
				<button type="submit" class="btn btn-primary float-right pull-right" id="data">Download Order</button>
				</form>&nbsp;&nbsp;
				
				<a href="{{ route('producthistory')}}" class="btn btn-primary float-right pull-right" > Back</a>
				
            </div>
			
		
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Product Name</th>
                            <th>Order Number</th>
                            <th>Product Qty.</th>
                            <th>Product Points</th>
							{{-- <th>Product Subtotal</th> --}}
                            <th>Vender information</th>
                            <th>Date</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1; 
								$id = 1

                            @endphp
                          
                        @foreach ($order as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            <td>{{ $item->product_name_en ?? '' }}</td>
                            <td>{{ $item->invoice_no ?? '' }}</td>
                            <td>{{ $item->product_qty ?? '' }}</td>
                            <td>{{ $item->points ?? '' }}</td>
							{{-- <td>{{ $item->subtotal ?? '' }}</td> --}}
                            <td>{{ $item->vender_info ?? '' }}</td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y/m/d')}}</td>
                            <td>
                                
                                <form method="POST" action="{{ route('cencel.order',$item->email)}}" style="display: flex;" id="delete_form">
                                
                                @php
                                    $total = $item->closing_bal + $item->points * $item->product_qty;
                                @endphp
                                @php
                                $total_point = $item->points * $item->product_qty;
                                $id = 1;
                                 @endphp
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
                                @if ($item->status == 1)
                                <button class="btn btn-danger editorder" value="{{ $item->id }}" title="Edit" data-toggle="modal" data-target="#exampleModalFormedit">
                                    Action </button>
                                @else
                                    
                                @endif
                                
                                </form>
                              
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
                <h5 class="modal-title" id="exampleModalFormedit">Change Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cencel.order')}}" style="display: flex;" id="delete_form">
                    @csrf
                    
                 
                    <input type="hidden" name="orer_id" id="orer_id">
                    <input type="hidden" name="email" id="email">
                    <input type="hidden" name="producy_id" id="producy_id">
                    <input type="hidden" name="closing_bal" id="closing_bal">
                    <input type="hidden" name="mail_point" id="mail_point">
					
					  <div class="form-row">	
				 <div class="form-group col-md-6">
      <label for="inputZip">Narration</label>
     <input type="test" class="form-control" id="cencel_reason" placeholder="Narration" name="cencel_reason">
    </div>		
					
					
	 <div class="form-group col-md-6">
      <label for="inputZip">Change Status</label>
     <select class="form-control" id="change_status" name="change_status" required="">
    <option selected="">Select Any</option>
    <option value="2">Confirm</option>
 	<option value="3">Decline</option> 
 	 
	</select>
    </div>
					
					
					</div>
					
					
			<br><br>	<br><br>
			
		<div class="form-group" id="venderinfo">
		 <br><br>	<br><br>
      <label for="vender_info">Vender Infomation</label>
	 
	 <select name="vender_info" id="vender_info" class="form-control">
                        <option value="" selected="" disabled="" >Select Vender</option>
                @foreach($supplier as $supp)
                        <option value="{{$supp->supplier_name}}">{{$supp->supplier_name}}</option>
                @endforeach 
                    </select> 
	  
 
	
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
<div id="loader"></div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  //console.log(brandidname);
    $.ajax({
    type: "GET",
    url: "{{ url('/order/cancel') }}"+id,
    dataType: "json",
    success: function (response) {
        console.log(response)
        var closing_bal = response.order[0].closing_bal + response.order[0].points * response.order[0].product_qty;
        var mail_point = response.order[0].points * response.order[0].product_qty;
      $("#orer_id").val(id);
      $("#email").val(response.order[0].email);
      $("#producy_id").val(response.order[0].product_id);
      $("#closing_bal").val(closing_bal);
      $("#mail_point").val(mail_point);
    }
  });
  });
});
</script>

<script type="text/javascript">
$.ajaxSetup({ 
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
	$('#venderinfo').hide();
	$('#change_status').on('change', function(){
            var id = $(this).val();

			//alert(id);
			
			if(id == 2){
				
				$('#venderinfo').show();	
			}else{
				
			$('#venderinfo').hide();	
			}

    
    });
});
</script>




@endsection
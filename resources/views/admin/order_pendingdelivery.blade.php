@extends('admin.admin_master')
@section('admin')



<div class="content"><div class="breadcrumb-wrapper">
    <h1>Orders Pending for delivery
</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Orders Pending for delivery
</li>
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
                <a href="{{ url()->previous() }}" class="btn btn-primary float-right pull-right" > Back</a>
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1; 

                            @endphp
                          
                        @foreach ($order_pendingdelivery as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            <td>{{ $item->invoice_no ?? '' }}</td>
							<td>{{ $item->subtotal ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ $item->created_at ?? '' }}</td>
                            <td>{{ $item->cencel_reason ?? '' }}</td>
                        </tr>
                
                        @endforeach
                
                        </tbody>
						
		
						
                </table>
            </div>
        </div>
    </div>
</div>
						
</div>

@endsection
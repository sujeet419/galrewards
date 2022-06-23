@extends('admin.admin_master')
@section('admin')


<div class="content">
<div class="breadcrumb-wrapper">
<h1>Account Summary</h1>
    
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
<li class="breadcrumb-item" aria-current="page">View Account Summary</li>
</ol>



</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            <div class="row justify-content-between">
            <div class="col-11">
			
			 <a href="{{ route('account_summary') }}" class="btn btn-primary" >Back</a>  
				<!-- <a href="{{ route('generatePDF') }}" class="btn btn-primary" >Download PDF</a> -->
				
				<div class="pull-right left-right">
				<form action="{{ route('accountgeneratePDF') }}" method="POST" enctype="multipart/form-data" >
				@csrf 
				<input type="hidden" name="from_date" class="form-control" value="{{$from_date}}" readonly   autocomplete=off>
				<input  type="hidden" name="to_date" class="form-control" value="{{$to_date}}" readonly autocomplete=off>
				<input  type="hidden" name="guserid" class="form-control" value="{{$guserid}}" readonly autocomplete=off>
		
				<div class="">
				<button type="submit" class="btn btn-primary float-right pull-right" id="data">Download PDF</button></div>
				</form>	
			</div>
            
            </div>
            <div class="col-1">
			
			
            </div>
            </div>
            </div>
            <div class="card-body">
			
		
			
		<div class="form-row">
<div class="form-group col-md-3">
<label for="From Date">From Date</label>

<input type="text" name="from_date" class="form-control" value="{{$from_date}}" readonly   autocomplete=off>

</div>
<div class="form-group col-md-3">
<label for="To Date">To Date</label>

<input  type="text" name="to_date" class="form-control" value="{{$to_date}}" readonly autocomplete=off>

</div>

<div class="form-group col-md-3">
<label for="To Date">Userid</label>

<input  type="text" name="userid" class="form-control" value="{{$guserid}}" readonly autocomplete=off>

</div>


<div class="form-group col-md-3">
<label for="To Date">Closing Balance</label>

<input  type="text" name="closingbal" class="form-control" value="{{$closingbal}}" readonly autocomplete=off>

</div>

</div>




<h4 class="box-title">Points</h4>
				
              <!-- List start -->
				  
<table class="table table-hover"  style="overflow: wrap" >
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Points Earned</th>
      <th scope="col">Date</th>
    </tr>

  <tbody>


  @php
  if(isset($pointsummary))
        $sno = 1;
    @endphp
                     
@foreach ($pointsummary as $item)

    <tr>
      <th scope="row">{{ $sno++ }}</th>
      <th >{{ $item->points ?? '' }}</th>
      <th>{{ date('d-m-Y', strtotime($item->created_at)) ?? '' }}</th>
    
   
    </tr>
    
  
    @endforeach
  </tbody>

  <!-- <tfoot>
    <tr>
      <th id="total">Total:</th>
      <td></td>
      <td></td>
    </tr>
   </tfoot>-->
</table>


<h4 class="box-title">Bonus Points</h4>
				
              <!-- List start -->
				  
<table class="table table-hover"  style="overflow: wrap" >
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Bonus Earned</th>
      <th scope="col">Note</th>
      <th scope="col">Date</th>
    </tr>

  <tbody>


  @php
  if(isset($bonuspointssummary))
        $sno = 1;
    @endphp
                     
@foreach ($bonuspointssummary as $item)

    <tr>
      <th scope="row">{{ $sno++ }}</th>
      <th>{{ $item->bonus_point ?? '' }}</th>
      <th>{{ $item->bonus_reason ?? '' }}</th>
      <th>{{ date('d-m-Y', strtotime($item->created_at)) ?? '' }}</th>
    
   
    </tr>
    
  
    @endforeach
  </tbody>
  <!-- <tfoot>
    <tr>
      <th id="total">Total:</th>
      <td></td>
      <td></td>
    </tr>
   </tfoot>-->
</table>



<h4 class="box-title">Reddem Points</h4>
				
              <!-- List start -->
				  
<table class="table table-hover"  style="overflow: wrap" >
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Reddem Point</th>
   
      <th scope="col">Date</th>
    </tr>

  <tbody>


  @php
  if(isset($pointusedsummary))
        $sno = 1;
    @endphp
                     
@foreach ($pointusedsummary as $item)

    <tr>
      <th scope="row">{{ $sno++ }}</th>
      <th>{{ $item->points ?? '' }}</th>
   
      <th>{{ date('d-m-Y', strtotime($item->created_at)) ?? '' }}</th>
    
   
    </tr>
    
  
    @endforeach
  </tbody>

  <!-- <tfoot>
    <tr>
      <th id="total">Total:</th>
      <td></td>
      <td></td>
    </tr>
   </tfoot>-->
</table>





        </div>
    </div>
</div>
						
</div>







@endsection
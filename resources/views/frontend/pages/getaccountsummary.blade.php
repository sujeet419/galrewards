@extends('frontend.master')
@section('indexhome')
<?php if(session()->get('language') == 'fr') { ?>

<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('accountsummary') }}" class="link">domicile</a></li>
					<li class="item-link"><span>Relevé de compte</span></li>
				</ul>
                <a href="{{ route('accountsummary') }}" class="btn btn-primary" >Arrière</a>  
				<!-- <a href="{{ route('generatePDF') }}" class="btn btn-primary" >Download PDF</a> -->
				
				
				<form action="{{ route('generatePDF') }}" method="POST" enctype="multipart/form-data" >
				@csrf 
				<input type="hidden" name="from_date" class="form-control" value="{{$from_date}}" readonly   autocomplete=off>
				<input  type="hidden" name="to_date" class="form-control" value="{{$to_date}}" readonly autocomplete=off>
				
			
				<button type="submit" class="btn btn-primary float-right pull-right" id="data">Télécharger le PDF</button>
				</form>
				
				
				
			</div>
			
			<br><br>
			
			<div class=" main-content-area">
		
            
            <div class="card-header">
            
<form action="#" method="POST" enctype="multipart/form-data" >
      @csrf       
        <div class="col-12">
        
<div class="card-body">
<div class="form-row">
<div class="form-group col-md-4">
<label for="From Date">Partir de la date</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input type="text" name="from_date" class="form-control" value="{{$from_date}}" readonly   autocomplete=off>
</div>
</div>
<div class="form-group col-md-4">
<label for="To Date">À ce jour</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input  type="text" name="to_date" class="form-control" value="{{$to_date}}" readonly autocomplete=off>
</div>
</div>


<div class="form-group col-md-4">
<label for="To Date">Solde de clôture</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input  type="text" name="closingbal" class="form-control" value="{{$closingbal}}" readonly autocomplete=off>
</div>
</div>

</div>

</div>
</div>


</form>

</div>

</br>
</br>
</br>


<h4 class="box-title">Points</h4>
				
              <!-- List start -->











              
				  
<table class="table table-hover"  style="overflow: wrap" >
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Points gagnés</th>
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


<h4 class="box-title">Points bonus</h4>
				
              <!-- List start -->
				  
<table class="table table-hover"  style="overflow: wrap" >
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Bonus gagné</th>
      <th scope="col">Noter</th>
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



<h4 class="box-title">Points rouges</h4>
				
              <!-- List start -->
				  
<table class="table table-hover"  style="overflow: wrap" >
 
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pointe Reddem</th>
   
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


	</main>
	<!--main area-->
	
<?php }else{?>


<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('accountsummary') }}" class="link">Home</a></li>
					<li class="item-link"><span>Account Summary</span></li>
				</ul>
                <a href="{{ route('accountsummary') }}" class="btn btn-primary" >Back</a>  
				<!-- <a href="{{ route('generatePDF') }}" class="btn btn-primary" >Download PDF</a> -->
				
				
  @if(count($getalldetail) > 0)

				<form action="{{ route('generatePDF') }}" method="POST" enctype="multipart/form-data" >
				@csrf 
				<input type="hidden" name="from_date" class="form-control" value="{{$from_date}}" readonly   autocomplete=off>
				<input  type="hidden" name="to_date" class="form-control" value="{{$to_date}}" readonly autocomplete=off>
				
			
				<button type="submit" class="btn btn-primary float-right pull-right" id="data">Download PDF</button>
				</form>
				
				@endif

				
			</div>
			
			<br><br>
			
			<div class=" main-content-area">
		
            
            <div class="card-header">
            
<form action="#" method="POST" enctype="multipart/form-data" >
      @csrf       
        <div class="col-12">
        
<div class="card-body">
<div class="form-row">
<div class="form-group col-md-4">
<label for="From Date">From Date</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input type="text" name="from_date" class="form-control" value="{{$from_date}}" readonly   autocomplete=off>
</div>
</div>
<div class="form-group col-md-4">
<label for="To Date">To Date</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input  type="text" name="to_date" class="form-control" value="{{$to_date}}" readonly autocomplete=off>
</div>
</div>


<div class="form-group col-md-4">
<label for="To Date">Closing Balance</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input  type="text" name="closingbal" class="form-control" value="{{$closingbal}}" readonly autocomplete=off>
</div>
</div>

</div>

</div>
</div>


</form>

</div>

</br>
</br>
</br>


  @if(count($getalldetail) > 0)
     

<h4 class="box-title">Accountsummary</h4>
				
              <!-- List start -->
				  
<table class="table table-hover"  style="overflow: wrap" >
 
    <tr>
      <th scope="col" width="50">#</th>
      <th scope="col" width="150">Date</th>
      <th scope="col" width="150">Points Earned</th>
      <th scope="col" width="150">Points Used for Products Ordered</th>
      <th scope="col" width="150">Point added back for returned items</th>
      <th scope="col" width="150">Closing Balance</th>
    </tr>

  <tbody>

  @php

    $sno = 1;
    @endphp

                     
@foreach ($getalldetail as $item)

    <tr>
      <th width="50">{{ $sno++ }}</th>
      <th width="150">{{ date('d-m-Y', strtotime($item->created_at)) ?? '' }}</th>
      <th width="150">{{ ($item->points + $item->bonus_points)  ?? '-' }}</th>
      <th width="150">{{ $item->order_points ?? '-' }}</th>
      <th width="150">{{ $item->return_points ?? '-' }}</th>
      <th width="150">{{ $item->closing_balance ?? '' }}</th>
   
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
@else
No Accountsummary updated,
@endif





</div>


	</main>
	<!--main area-->


<?php } ?>	
	
	
@endsection
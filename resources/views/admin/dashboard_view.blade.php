@extends('admin.admin_master')
@section('admin')


@php
$country_id= $_GET['country_id'];

$totalorder = App\Models\order::
leftJoin('registers','registers.email','=','orders.email')
->whereMonth('orders.created_at', date('m'))
->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
->sum('orders.points');


$totalpoint = App\Models\point::
leftJoin('registers','registers.guserid','=','points.guserid')
->whereMonth('points.created_at', date('m'))
->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
->sum('points.points');


$totalbounuspoint = App\Models\bonus_point::
leftJoin('registers','registers.guserid','=','bonus_points.guserid')
->whereMonth('bonus_points.created_at', date('m'))
->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
->sum('bonus_points.bonus_point');

$totalpointcredit= $totalpoint + $totalbounuspoint;


// new change

$top_sales = DB::table('product_histories')
        ->leftJoin('products','products.id','=','product_histories.product_id')
        ->selectRaw('products.*, sum(product_histories.product_qty) total')
        ->whereRaw('find_in_set("'.$country_id.'",products.country_id)')
        ->groupBy('product_histories.product_id')
        ->orderBy('total','desc')
        ->take(1)
        ->get();


        $top_agent = DB::table('orders')
             ->leftJoin('registers','registers.email','=','orders.email')
             ->selectRaw('registers.*, sum(orders.points) total')
             ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
             ->whereMonth('orders.created_at', date('m'))
             ->groupBy('orders.email')
             ->orderBy('total','desc')
             ->take(1)
             ->get();


             $top_supplier = DB::table('product_histories')
                ->leftJoin('suppliers','suppliers.supplier_name','=','product_histories.vender_info')
                ->selectRaw('suppliers.*, sum(product_histories.product_qty) total')
                ->whereRaw('find_in_set("'.$country_id.'",suppliers.country)')
                ->groupBy('product_histories.vender_info')
                ->orderBy('total','desc')
                ->take(1)
                ->get();     



                $order_pendingdelivery1 = DB::table('product_histories')
                    ->leftJoin('registers','registers.email','=','product_histories.email')
                    ->selectRaw('product_histories.*, sum(product_histories.subtotal) total')
                    ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
                    ->where('product_histories.status', '2')
                    ->groupBy('product_histories.email')
                    ->orderBy('total','desc')
                   // ->take(10)
                    ->get();

$order_pendingdelivery = count($order_pendingdelivery1);
//dd($order_pendingcount);

   
$pending_ticket = DB::table('tickets')
        ->leftJoin('registers','registers.id','=','tickets.user_id')
        ->selectRaw('tickets.*')
        ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
        ->where('tickets.status', '0')
      
        //->groupBy('product_histories.email')
        ->orderBy('tickets.id','desc')
       // ->take(10)
        ->count();


        $order_pendingapproval1 = DB::table('product_histories')
        ->leftJoin('registers','registers.email','=','product_histories.email')
        ->selectRaw('product_histories.*, count(product_histories.subtotal) total')
        ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
        ->where('product_histories.status', '1')
        ->groupBy('product_histories.email')
        ->orderBy('total','desc')
       // ->take(10)
        ->get();
        $order_pendingapproval = count($order_pendingapproval1);

@endphp

<div class="content-wrapper">
    <div class="content">						 
            <!-- Top Statistics -->

    <div class="row">
    <div class="col-lg-12">

    <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              
            @php
         $country_id= $_GET['country_id'];
           
        $getcountry = DB::table('countries')->where('countries.country_status' , '1')->select('countries.*')->get();


	


		@endphp    

    <div class="col-md-6">

          
   <form method="get" enctype="multipart/form-data" action="{{ route('dashboard_view') }}">
 
            <select id="country_id" name="country_id" class="form-control">
        <option value="">Select Country</option>
     @foreach($getcountry as $item)
        <option value="{{$item->country_name_en}}"  {{ $country_id == $item->country_name_en ? 'selected' : ''}}  >{{$item->country_name_en}}</option>
@endforeach
      </select></div>


      <div class="col-md-1">

<button type="submit" class="ladda-button btn btn-success btn-square btn-ladda"  style="width: 150px;">Get Data</button>



</div> 


</div></div>

</div></div>





            <div class="row">
              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-warning border">
										<a href="{{ route('top_sellproduct',$country_id) }}"><div class="card-block">
											<i class="mdi mdi-cart-outline mr-4 text-white">		{{$top_sales[0]->product_name_en ?? ''}}</i>
								
											<p>Top 10 Selling Products</p>
										</div></a>
									</div>
								</div>
                

              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-success border">
										<a href="{{ route('top_agent',$country_id) }}"><div class="card-block">
											<i class="mdi mdi-diamond t mr-4 text-white">	{{$top_agent[0]->first_name ?? ''}}</i>
								
											<p>Top 10 Agents </p>
										</div></a>
									</div>
								</div>

              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-danger border">
										<a href="{{ route('top_supplier',$country_id) }}"><div class="card-block">
											<i class="mdi mdi-diamond t  mr-4 text-white">	{{$top_supplier[0]->supplier_name ?? ''}}</i>
										
											<p>Top Suppliers</p>
										</div></a>
									</div>
								</div>

             <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-primary border">
										<a href="{{ route('order_pendingdelivery',$country_id) }}">
                      <div class="card-block">
											<i class="mdi mdi-diamond t mr-4 text-white">{{$order_pendingdelivery ?? ''}} </i>
										
											<p>Orders Pending for delivery</p>
										</div></a>
									</div>
								</div>

            </div>
			



            <div class="row">
              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-warning border">
										<a href="{{ route('pending_ticket',$country_id) }}"><div class="card-block">
											<i class="mdi mdi-cart-outline mr-4 text-white">{{$pending_ticket ?? ''}}</i>
										
											<p>Pending Tickets</p>
										</div></a>
									</div>
								</div>


              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-success border">
										<a href="{{ route('order_pendingapproval',$country_id) }}"><div class="card-block">
											<i class="mdi mdi-diamond t mr-4 text-white">	{{$order_pendingapproval ?? ''}}</i>
								
											<p>Orders pending for approval </p>
										</div></a>
									</div>
								</div>

              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-danger border">
										<a href="#"><div class="card-block">
											<i class="mdi mdi-diamond t  mr-4 text-white"> {{ $totalpointcredit ?? ''}}</i>
										
											<p>Total Points credited (Monthly) </p>
										</div></a>
									</div>
								</div>

             <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-primary border">
									
										<a href="#">
                      <div class="card-block">
											<i class="mdi mdi-diamond t mr-4 text-white"> {{ $totalorder ?? ''}}</i>
										
											<p>Total points Debited (Monthly)</p>
										</div></a>
									</div>
								</div>

            </div>
                
			
			
			
			


			    <div class="row">
    <div class="col-lg-12">

    <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              
            @php
         $country_id= $_GET['country_id'];
           
        $getcountry = DB::table('countries')->where('countries.country_status' , '1')->select('countries.*')->get();


	


		@endphp    

    <div class="col-md-6">

          
  
 
   <input type="month" value="@php echo $_GET['filter_month']?? '' @endphp" class="form-control" id="filter_month" name="filter_month" max="<?php echo date("Y-m"); ?>">

            </div>


      <div class="col-md-1">

<button type="submit" class="ladda-button btn btn-success btn-square btn-ladda"  style="width: 150px;">Get Data</button>

</form>

</div> 


</div></div>
			
			
<div class="row">
  <div class="table-responsive col-md-6">
  <table id="example11" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                
                    <th>Country Name</th>
                    <th>Total Points Credited</th>
                    <th>Total Points Redeemed</th>
                
                  
                  </tr>
                  </thead>
                  <tbody>

                  
                  @foreach ($pointreddem as $item)
                  <tr>

          
                    <td>{{ $item->country_name ?? '' }}</td>
                    <td>{{ $item->totalcreditpoint ?? '' }}</td>
					         <td>{{ $item->redeemedpoint ?? '' }}</td>
				

                  </tr>
                  @endforeach
         
     
                  </tbody>
           
                </table>
  </div>
  <div class="table-responsive col-md-6">
  <table id="example111" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                 
                    <th>Country Name</th>
                    <th>Consultant Added (numbers only)</th>
             
                
                  
                  </tr>
                  </thead>
                  <tbody>

                  @foreach ($consultantadd as $item)
                  <tr>
                
                    <td>{{ $item->country_name ?? '' }}</td>
                    <td>{{ $item->total ?? '' }}</td>
				
                  </tr>
                
                  @endforeach
     
                  </tbody>
           
                </table>
  </div>
</div>		
	





     

            </div>
			

			
			
  @endsection 
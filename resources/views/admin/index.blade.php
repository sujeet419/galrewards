@extends('admin.admin_master')
@section('admin')
@php 
 use Carbon\Carbon;

			$monthlyorders = DB::table('orders')
			 //->whereYear('created_at', date('Y')),
			->select([ 
               DB::raw('MONTH(created_at) as month'),
                DB::raw('sum(points) as points'),
            ])
			->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get();
			

     $data = [];
 
     foreach($monthlyorders as $row) {
     
        $data['data'][] = (int) $row->points;
      }
 
    $data = json_encode($data);


			//dd($data);
			


@endphp



{{-- @php
 use Carbon\Carbon;
 
        $ticket = DB::table('tickets')
        ->join('registers', 'tickets.user_id', '=', 'registers.id')
        ->where('tickets.id' , '70')
        ->select('tickets.*','registers.email','registers.contact','registers.sign_on','registers.pcc')
		->get();
		
		
		
		 $ticket_view = DB::table('ticket_statuses')
        ->where('ticket_statuses.ticket_id' , '70')
		->select('ticket_statuses.*')->latest()->first();

         dd($ticket_view);
@endphp --}}
<div class="content-wrapper">
    <div class="content">						 
            <!-- Top Statistics -->

    <div class="row">
    <div class="col-lg-12">

    <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              
            @php
        $getcountry = DB::table('countries')
        ->where('countries.country_status' , '1')
		    ->select('countries.*')->get();

@endphp    

    <div class="col-md-6">

          
   <form method="get" enctype="multipart/form-data" action="{{ route('dashboard_view') }}">
 
            <select id="country_id" name="country_id" class="form-control">
        <option value="">Select Country</option>
     @foreach($getcountry as $item)
        <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>
@endforeach
      </select></div>


      <div class="col-md-1">

<button type="submit" class="ladda-button btn btn-success btn-square btn-ladda"  style="width: 150px;">Get Data</button>

</form>

</div> 


</div></div>

</div></div>




@php
$product = App\Models\product::count('id');
@endphp
            <div class="row">
              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-warning border">
										<a href="{{ route('view_product') }}"><div class="card-block">
											<i class="mdi mdi-cart-outline mr-4 text-white"></i>
											<h2 class="text-white my-2">{{ $product }}</h2>
											<p>Total Product</p>
										</div></a>
									</div>
								</div>
@php
$today = App\Models\order::where('created_at', '>=', Carbon::today())->count('id');
//whereDay('created_at', date('d'))->count('id');
  // dd($today);
@endphp
              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-success border">
										<a href="{{ route('producthistory') }}"><div class="card-block">
											<i class="mdi mdi-diamond t mr-4 text-white"></i>
											<h2 class="text-white my-2">{{ $today }}</h2>
											<p>Today's Sale</p>
										</div></a>
									</div>
								</div>
@php
$month = App\Models\order::whereMonth('created_at', date('m'))->count('id');
  // dd($month);
@endphp
              <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-danger border">
										<a href="{{ route('producthistory') }}"><div class="card-block">
											<i class="mdi mdi-diamond t  mr-4 text-white"></i>
											<h2 class="text-white my-2">{{ $month }}</h2>
											<p>Monthly Sale</p>
										</div></a>
									</div>
								</div>
@php
$year = App\Models\order::whereYear('created_at', date('Y'))->count('id');
//  dd($year);
@endphp
             <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="card widget-block p-4 rounded bg-primary border">
										<a href="{{ route('producthistory') }}"><div class="card-block">
											<i class="mdi mdi-diamond t mr-4 text-white"></i>
											<h2 class="text-white my-2">{{ $year }}</h2>
											<p>Yearly Sale</p>
										</div></a>
									</div>
								</div>

            </div>
			







			@php
            $points = App\Models\register::sum('closing_bal');
            @endphp
            <div class="row">

               <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="media widget-media p-4 bg-white border">
										<div class="icon rounded-circle mr-4 bg-primary">
											<i class="mdi mdi-diamond text-white "></i>
										</div>
										<a href="{{ route('view.reg') }}"><div class="media-body align-self-center">
											<h2 class="text-primary mb-2">{{ $points }}</h2>
											<p>Total User Points</p>
										</div></a>
									</div>
								</div>
								
								
								
								
								
			  @php
            $register = App\Models\register::count('id');
			// dd($register);
            @endphp  

							<div class="col-md-6 col-lg-6 col-xl-3">
									<div class="media widget-media p-4 bg-white border">
										<div class="icon bg-success rounded-circle mr-4">
											<i class="mdi mdi-account-outline text-white "></i>
										</div>
										<div class="media-body align-self-center">
											<h2 class="text-primary mb-2">
											<a href="{{ route('view.reg') }}">{{ $register }}</h2>
											<p>Total User</p></a>
										</div>
									</div>
								</div>       
             

  @php
            $ticket = App\Models\ticket::where('status','0')->count('id');
			// dd($ticket);
            @endphp  


  <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="media widget-media p-4 bg-white border">
										<div class="icon rounded-circle mr-4 bg-primary">
											<i class="mdi mdi-diamond text-white "></i>
										</div>
										<div class="media-body align-self-center">
											<a href="{{ route('view.ticket') }}"><h2 class="text-primary mb-2">{{ $ticket }}</h2>
											<p>New Ticket</p></a>
										</div>
									</div>
								</div>
								
								
	 @php
            $order = App\Models\order::where('status','1')->count('id');
			// dd($order);
			$totalconformorder = App\Models\order::whereYear('created_at', date('Y'))->where('status','2')->sum('points');
			$totalorder = App\Models\order::whereYear('created_at', date('Y'))->sum('points');
			$totalorderpending = App\Models\order::whereYear('created_at', date('Y'))->where('status','1')->sum('points');
			$totalordercancel = App\Models\order::whereYear('created_at', date('Y'))->where('status','3')->sum('points');
			//dd($totalorder);
			
	
            @endphp  							
								
  <div class="col-md-6 col-lg-6 col-xl-3">
									<div class="media widget-media p-4 bg-white border">
										<div class="icon rounded-circle mr-4 bg-primary">
											<i class="mdi mdi-diamond text-white "></i>
										</div>
										<div class="media-body align-self-center">
											<a href="{{ route('producthistory') }}"><h2 class="text-primary mb-2">{{ $order }}</h2>
											<p>New Orders</p></a>
										</div>
									</div>
								</div>




			 </div>                  
			
			
			
			
			
			
			
			
			
			
			
			
			
            <div class="row">
							<div class="col-xl-8 col-md-12">
                      <!-- Sales Graph -->
                      <div class="card card-default" data-scroll-height="675">
                        <div class="card-header">
                          <h2>Sales Of The Current Year</h2>
                        </div>
                        <div class="card-body">
                          <canvas id="linechartnew" class="chartjs"></canvas>
                        </div>
                        <div class="card-footer d-flex flex-wrap bg-white p-0">
                          <div class="col-6 px-0">
                            <div class="text-center p-4">
                              <h4>{{$totalorder}}</h4>
                              <p class="mt-2">Total orders of this year</p>
                            </div>
                          </div>
                          <div class="col-6 px-0">
                            <div class="text-center p-4 border-left">
                              <h4>{{$totalconformorder}}</h4>
                              <p class="mt-2">Total revenue of this year</p>
                            </div>
                          </div>
                        </div>
                      </div>
</div>
							<div class="col-xl-4 col-md-12">
                  <!-- Doughnut Chart -->
                  <div class="card card-default" data-scroll-height="675">
                    <div class="card-header justify-content-center">
                      <h2>Orders Overview</h2>
                    </div>
                    <div class="card-body" >
                      <canvas id="doChartnew" ></canvas>
                    </div>
                  
                    <div class="card-footer d-flex flex-wrap bg-white p-0" style="height: 100px;">
                      <div class="col-6">
                        <div class="py-4 px-6">
                          <ul class="d-flex flex-column justify-content-between">
                            <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #4c84ff"></i>Order Completed</li>
                            <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #80e1c1 "></i>Order Total</li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-6 border-left">
                        <div class="py-4 px-6 ">
                          <ul class="d-flex flex-column justify-content-between">
                            <li class="mb-2"><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #8061ef"></i>Order Pending</li>
                            <li><i class="mdi mdi-checkbox-blank-circle-outline mr-2" style="color: #ffa128"></i>Order Canceled</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
</div>
						</div>

           

            </div>
			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>			
	<script>
	
	 /*======== 3. LINE CHART ========*/
	 
	$(document).ready(function() { 
	 
  var ctx = document.getElementById("linechartnew");
   var cData = JSON.parse(`<?php echo $data; ?>`);
   
   //alert(cData);
  if (ctx !== null) {
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: "line",

      // The data for our dataset
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        datasets: [
          {
            label: "",
            backgroundColor: "transparent",
            borderColor: "rgb(82, 136, 255)",
			data: cData.data,
          
			
            lineTension: 0.3,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255,255,255,1)",
            pointHoverBackgroundColor: "rgba(255,255,255,1)",
            pointBorderWidth: 2,
            pointHoverRadius: 8,
            pointHoverBorderWidth: 1
          }
        ]
      },

      // Configuration options go here
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        layout: {
          padding: {
            right: 10
          }
        },
        scales: {
          xAxes: [
            {
              gridLines: {
                display: false
              }
            }
          ],
          yAxes: [
            {
              gridLines: {
                display: true,
                color: "#eee",
                zeroLineColor: "#eee",
              },
              ticks: {
                callback: function(value) {
                  var ranges = [
                    { divider: 1e6, suffix: "M" },
                    { divider: 1e4, suffix: "k" }
                  ];
                  function formatNumber(n) {
                    for (var i = 0; i < ranges.length; i++) {
                      if (n >= ranges[i].divider) {
                        return (
                          (n / ranges[i].divider).toString() + ranges[i].suffix
                        );
                      }
                    }
                    return n;
                  }
                  return formatNumber(value);
                }
              }
            }
          ]
        },
        tooltips: {
          callbacks: {
            title: function(tooltipItem, data) {
              return data["labels"][tooltipItem[0]["index"]];
            },
            label: function(tooltipItem, data) {
              return "point - " + data["datasets"][0]["data"][tooltipItem["index"]];
            }
          },
          responsive: true,
          intersect: false,
          enabled: true,
          titleFontColor: "#888",
          bodyFontColor: "#555",
          titleFontSize: 12,
          bodyFontSize: 18,
          backgroundColor: "rgba(256,256,256,0.95)",
          xPadding: 20,
          yPadding: 10,
          displayColors: false,
          borderColor: "rgba(220, 220, 220, 0.9)",
          borderWidth: 2,
          caretSize: 10,
          caretPadding: 15
        }
      }
    });
  }
	
	
	//gbhbngh
	
	
	var doughnut = document.getElementById("doChartnew");
  if (doughnut !== null) {
    var myDoughnutChart = new Chart(doughnut, {
      type: "doughnut",
      data: {
        labels: ["completed", "Total", "pending", "canceled"],
        datasets: [
          {
            label: ["completed", "Total", "pending", "canceled"],
            data: [{{$totalconformorder}}, {{$totalorder}}, {{$totalorderpending}}, {{$totalordercancel}}],
            backgroundColor: ["#4c84ff", "#29cc97", "#fec402", "#FF0000"],
            borderWidth: 1
            // borderColor: ['#4c84ff','#29cc97','#8061ef','#fec402']
            // hoverBorderColor: ['#4c84ff', '#29cc97', '#8061ef', '#fec402']
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        cutoutPercentage: 75,
        tooltips: {
          callbacks: {
            title: function(tooltipItem, data) {
              return "Order : " + data["labels"][tooltipItem[0]["index"]];
            },
            label: function(tooltipItem, data) {
              return data["datasets"][0]["data"][tooltipItem["index"]];
            }
          },
          titleFontColor: "#888",
          bodyFontColor: "#555",
          titleFontSize: 12,
          bodyFontSize: 14,
          backgroundColor: "rgba(256,256,256,0.95)",
          displayColors: true,
          borderColor: "rgba(220, 220, 220, 0.9)",
          borderWidth: 2
        }
      }
    });
  }
	
	
	});
	
	
	</script>		
			
			
  @endsection 
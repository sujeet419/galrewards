@extends('frontend.master')
@section('indexhome')
<?php if(session()->get('language') == 'fr') { ?>
<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>
					<li class="item-link"><span>Des billets</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				
					<h3 class="box-title">Liste des billets</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
           
        @endif   


              <!-- List start -->
				  
            
              <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Besoin d'assistance</th>
      <th scope="col">Commenter</th>
      <th scope="col">Date du billet</th>
      <th scope="col">Statut</th>
      <th scope="col">Voir</th>
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($ticketlist as $item)

    <tr>
      <th scope="row"><a href="{{ route('ticket_detail',$item->id)}}">{{ $sno++ }}</a></th>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->need_assistance ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->comment ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->ticket_date ?? '' }}</a></td>
      <td>
      @if ($item->status == 0)
                                    
                                    <span class="badge badge-pill badge-danger" style="background-color: red;">
									<a href="{{ route('ticket_detail',$item->id)}}">Open</a></span>
                               
                                    @elseif($item->status == 1)
                               
                                    <span class="badge badge-pill badge-success" style="background-color: yellow;">
									<a href="{{ route('ticket_detail',$item->id)}}">WIP</a></span>     
                                    
                                    @else

                                    <span class="badge badge-pill badge-success" style="background-color: green;">
									<a href="{{ route('ticket_detail',$item->id)}}">Closed</a></span>  
                               
                                @endif   
      
      
     </td>
      <td><a href="{{ route('ticket_detail',$item->id)}}"><i class="fa fa-eye"></i></a></td>
    </tr>
  
    @endforeach
  </tbody>
</table>
</div>




					
			
			
				
					
			<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Caractéristiques Produits</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

								@foreach ($special_deal as $item)
								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
                                        
                                        <a href="{{route('detail',$item->id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset($item->product_thambnail)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">nouvelle</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('detail',$item->id)}}" class="function-link">aperçu rapide</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('detail',$item->id)}}" class="product-name"><span>{{$item->product_name_fr}}</span></a>
                                        <div class="wrap-price"><span class="product-price">{{$item->points}}</span></div>
                                    </div>
								</div>
								@endforeach
							</div>
						</div><!--End wrap-products-->
					</div>

				

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
<?php }else{?>

<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Tickets</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				
					<h3 class="box-title">Tickets List</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
           
        @endif   


              <!-- List start -->
				  
            
              <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
	   <th scope="col">Ticket Number</th>
      <th scope="col">Need Assistance</th>
      <th scope="col">Comment</th>
      <th scope="col">Ticket date</th>
      <th scope="col">Status</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($ticketlist as $item)

    <tr>
      <th scope="row"><a href="{{ route('ticket_detail',$item->id)}}">{{ $sno++ }}</a></th>
	    <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->ticket_number ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->need_assistance ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->comment ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->ticket_date ?? '' }}</a></td>
      <td>
      @if ($item->status == 0)
                                    
                                    <span class="badge badge-pill badge-danger" style="background-color: red;">
									Open</span>
                               
                                    @elseif($item->status == 1)
                               
                                    <span class="badge badge-pill badge-success" style="background-color: #f59524;">
									WIP</span>     
                                    
                                    @else

                                    <span class="badge badge-pill badge-success" style="background-color: green;">
									Closed</span>  
                               
                                @endif   
      
      
     </td>
      <td><a href="{{ route('ticket_detail',$item->id)}}"><i class="fa fa-eye"></i></a></td>
    </tr>
  
    @endforeach
  </tbody>
</table>
</div>




					
			
			
				
					
			<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Features Products</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

								@foreach ($special_deal as $item)
								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
                                        
                                        <a href="{{route('detail',$item->id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset($item->product_thambnail)}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('detail',$item->id)}}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('detail',$item->id)}}" class="product-name"><span>{{$item->product_name_en}}</span></a>
                                        <div class="wrap-price"><span class="product-price">Points: {{$item->points}}</span></div>
                                    </div>
								</div>
								@endforeach
							</div>
						</div><!--End wrap-products-->
					</div>

				

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->



<?php } ?>
	
@endsection
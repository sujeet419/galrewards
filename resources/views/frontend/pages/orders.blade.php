@extends('frontend.master')
@section('indexhome')
<?php if(session()->get('language') == 'fr') { ?>
<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>
					<li class="item-link"><span>Commande</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				
					<h3 class="box-title">Liste de commandes</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
           
        @endif   


              <!-- List start -->
				  
            
              <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">numéro de facture</th>
      <th scope="col">Points</th>
      <th scope="col">Date de commande</th>
      <th scope="col">Statut de la commande</th>
      <th scope="col">Voir</th>
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($orderlist as $item)

    <tr>
      <th scope="row"><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $sno++ }}</a></th>
      <td><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $item->invoice_no ?? '' }}</a></td>
      <td><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $item->points ?? '' }}</a></td>
      <td><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $item->created_at ?? '' }}</a></td>

      <td>
	  
	  @if ($item->status == 1)
                                <span class="badge badge-pill badge-success" style="background-color: #f59524;">Pending</span> 
							 @elseif($item->status == 4)
								 <span class="badge badge-pill badge-success" style="background-color: green;">Delivered</span>  
                                @elseif($item->status == 2)
								 <span class="badge badge-pill badge-success" style="background-color: green;">Confirmed</span>  
								@else
                                <span class="badge badge-pill badge-success" style="background-color: red;">Canceled</span>   
                                @endif 
	

      </td>

      <td><a href="{{ route('order_detail',$item->invoice_no)}}"><i class="fa fa-eye"></i></a></td>
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
	
<?php }else{?>


<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">Home</a></li>
					<li class="item-link"><span>Order</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				
			
              <!-- List start -->
				  <?php 

        
          if(count($orderlist) > 0){?>

            <h3 class="box-title">Order List</h3>
					
          @if(Session::has('success'))
          <div class="alert alert-success text-center">
              {{Session::get('success')}}
         
      @endif   

      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">invoice Number</th>
      <th scope="col">Points</th>
      <th scope="col">Order date</th>
      <th scope="col">Order Status</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($orderlist as $item)

    <tr>
      <th scope="row"><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $sno++ }}</a></th>
      <td><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $item->invoice_no ?? '' }}</a></td>
      <td><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $item->points ?? '' }}</a></td>
      <td><a href="{{ route('order_detail',$item->invoice_no)}}">{{ $item->created_at ?? '' }}</a></td>


      <td>
	  
	  @if ($item->status == 1)
                                <span class="badge badge-pill badge-success" style="background-color: #f59524;">Pending</span> 
							 @elseif($item->status == 4)
								 <span class="badge badge-pill badge-success" style="background-color: green;">Delivered</span>  
                                @elseif($item->status == 2)
								 <span class="badge badge-pill badge-success" style="background-color: green;">Confirmed</span>  
								@else
                                <span class="badge badge-pill badge-success" style="background-color: red;">Canceled</span>   
                                @endif 
	

      </td>


      <td><a href="{{ route('order_detail',$item->invoice_no)}}"><i class="fa fa-eye"></i></a></td>
    </tr>
  
    @endforeach
  </tbody>
</table>



          <?php } else { ?>

<h3 class="box-title">Place your order</h3>

<a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">Continue Shopping</a>
         <?php } ?>
          
          
            
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
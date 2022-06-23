@extends('frontend.master')
@section('indexhome')

	<?php if(session()->get('language') == 'fr') { ?>
	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>
					<li class="item-link"><span>Chariot</span></li>
				</ul>
			</div>
			
			@if(Session::has('error'))
            <div class="alert alert-danger text-center" role="alert">
                {{Session::get('error')}}
            </div>
        	@endif 

			<div class=" main-content-area">
			
			@php
			
			$cart = Cart::count();
				
		@endphp
		@if ($cart == 0)

		<div class="row ">
		<div class="shopping-cart" style="margin-bottom: 20px;">
	
	    <div style="text-align: center"><h1><b>Vous n'avez aucun article dans votre panier.</b></h1></div>
	 <a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">Continuer vos achats</a>
		</div>
		</div>
			
		@else
			
			

				<div class="wrap-iten-in-cart">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="cart-romove item" style="margin-left:0px">Image</th>
									<th class="cart-description item">Nom</th>
									<th class="cart-qty item">Quantité</th>
									<th class="cart-sub-total item">Points</th>
									<th class="cart-total last-item">Retirer</th>
								</tr>
							</thead><!-- /thead -->
							<tbody id="mycart">
								
				
							</tbody>
						</table>
					</div>
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Récapitulatif de la commande</h4>
						<p class="summary-info"><span class="title">Total</span><b class="index" id="Subtotal"></b></p>
						<p class="summary-info"><span class="title">Expédition</span><b class="index">Livraison gratuite</b></p>
						<p class="summary-info total-info "><span class="title">Totale</span><b class="index" id="Subtotal"></b></p>
					</div>
					<div class="checkout-info">
						
						<a class="btn btn-checkout" href="{{ route('checkout') }}">Vérifier</a>
						<a class="link-to-shop" href="{{route('shop')}}">Continuer vos achats<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					
				</div>

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Produits connexes</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

								@foreach ($releted_product as $item)
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
				</div>

			</div><!--end main content area-->
			
			@endif
			
			
		</div><!--end container-->

	</main>
	<!--main area-->
	
	<?php } else{?>
	
	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">Home</a></li>
					<li class="item-link"><span>Cart</span></li>
				</ul>
			</div>
			
			@if(Session::has('error'))
            <div class="alert alert-danger text-center" role="alert">
                {{Session::get('error')}}
            </div>
        	@endif 

			<div class=" main-content-area">
			
		@if ($cart == 0)

		<div class="row ">
		<div class="shopping-cart" style="margin-bottom: 20px;">
	
	    <div style="text-align: center"><h3><b>Your cart is empty.</b></h3></div>
	 <a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">Continue Shopping</a>
		</div>
		</div>
			
		@else
			
			

				<div class="wrap-iten-in-cart">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="cart-romove item" style="margin-left:0px">Image</th>
									<th class="cart-description item">Name</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-sub-total item">Points</th>
									<th class="cart-total last-item">Remove</th>
								</tr>
							</thead><!-- /thead -->
							<tbody id="mycart">
								
				
							</tbody>
						</table>
					</div>
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index" id="Subtotal"></b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index" id="Subtotal"></b></p>
					</div>
					<div class="checkout-info">
						
						<a class="btn btn-checkout" href="{{ route('checkout') }}">Check out</a>
						<a class="link-to-shop" href="{{route('shop')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					
				</div>

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Related Products</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

								@foreach ($releted_product as $item)
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
				</div>

			</div><!--end main content area-->
			
			@endif
			
			
		</div><!--end container-->

	</main>
	<!--main area-->
	
	
	
	<?php } ?>

@endsection
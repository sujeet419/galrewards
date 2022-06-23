@extends('frontend.master')
@section('indexhome')
	<!--main area-->
	<?php if(session()->get('language') == 'fr') { ?>
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('frontend') }}" class="link">domicile</a></li>
					<li class="item-link"><span>Vérifier</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-address-billing">
					<h3 class="box-title">Détails de la facturation</h3>
					<form class="register-form" action="{{ route('orderplace') }}" method="POST">
						@csrf
						<p class="row-in-form">
							<label for="first_name">Prénom<span>*</span></label>
							<input id="first_name" style="background:beige" type="text" name="first_name" value="{{$userdata['first_name']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="last_name">nom de famille<span>*</span></label>
							<input id="last_name" style="background:beige" type="text" name="last_name" value="{{$userdata['last_name']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="email">Adresse e-mail:</label>
							<input id="email" style="background:beige" type="email" name="email" value="{{$userdata['email']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="contact">Numéro de téléphone<span>*</span></label>
							<input id="contact" style="background:beige" type="text" name="contact" value="{{$userdata['contact']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="pcc">PCC:</label>
							<input id="pcc" style="background:beige" type="text" name="pcc" value="{{$userdata['pcc']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="sign_on">Sign on<span>*</span></label>
							<input id="sign_on" style="background:beige" type="text" name="sign_on" value="{{$userdata['sign_on']}}" readonly>
						</p>
					
					
					
				</div>
<?php //dd($carts) ?>
				
				<input id="product_id"  type="hidden" name="product_id" value="{{$cartQty}}" readonly>

				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">{{$cartTotal}}</span></p>
						<button type="submit" class="btn btn-medium">Faites votre commande maintenant</button>
					</div>
				</div>
					</form>



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
	
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-address-billing">
					<h3 class="box-title">Billing Details</h3>
					<form class="register-form" action="{{ route('orderplace') }}" method="POST">
						@csrf
						<p class="row-in-form">
							<label for="first_name">first name<span>*</span></label>
							<input id="first_name" style="background:beige" type="text" name="first_name" value="{{$userdata['first_name']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="last_name">last name<span>*</span></label>
							<input id="last_name" style="background:beige" type="text" name="last_name" value="{{$userdata['last_name']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input id="email" style="background:beige" type="email" name="email" value="{{$userdata['email']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="contact">Phone number<span>*</span></label>
							<input id="contact" style="background:beige" type="text" name="contact" value="{{$userdata['contact']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="pcc">PCC:</label>
							<input id="pcc" style="background:beige" type="text" name="pcc" value="{{$userdata['pcc']}}" readonly>
						</p>
						<p class="row-in-form">
							<label for="sign_on">Sign on<span>*</span></label>
							<input id="sign_on" style="background:beige" type="text" name="sign_on" value="{{$userdata['sign_on']}}" readonly>
						</p>
					
					
					
				</div>
<?php //dd($carts) ?>
				
				<input id="product_id"  type="hidden" name="product_id" value="{{$cartQty}}" readonly>

				<div class="summary summary-checkout">
				<!-- <h3 class="box-title">To be delivered at + Travelport Office + Agency Address</h3> -->
					<div class="summary-item payment-method">
					<div class="row">
					
					<div class="col-md-6">
						<p class="row-in-form" style="display: flex;">
							<label for="office_address">Office Address:</label>&nbsp;&nbsp;
							<input type="radio" name="delivery_type" value="office_address">
						</p>
					</div>
					<div class="col-md-6">
						<p class="row-in-form" style="display: flex;">
							<label for="agency_address">Agency Address:</label>&nbsp;&nbsp;
							<input type="radio" name="delivery_type" value="agency_address">
						</p>
					</div>
					</div>
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{$cart_val}}</span></p>
						<button type="submit" class="btn btn-medium">Place order now</button>
					</div>
				</div>
					</form>



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
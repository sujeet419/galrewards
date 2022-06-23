@extends('frontend.master')

@section('indexhome')



<?php if(session()->get('language') == 'fr') { ?>

<!--main area-->

	<main id="main" class="main-site">



		<div class="container">



			<div class="wrap-breadcrumb">

				<ul>

					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>

					<li class="item-link"><span>Mon profil</span></li>

				</ul>

			</div>

			<div class=" main-content-area">

				<div class="wrap-address-billing">

					<h3 class="box-title">Mon profil</h3>

					

					  @if(Session::has('success'))

            <div class="alert alert-success text-center">

                {{Session::get('success')}}

            </div>

        @endif   





              <!-- form start -->

				  

            <form action="#" method="POST" enctype="multipart/form-data">

            

					

				

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

							<label for="phone">Numéro de téléphone<span>*</span></label>

							<input id="phone" style="background:beige" type="number" name="phone" value="{{$userdata['contact']}}" readonly>

						</p>

						<p class="row-in-form">

							<label for="Sign On ID">ID de connexion:</label>

							<input id="Sign On ID" style="background:beige" type="text" name="Sign On ID" value="{{$userdata['sign_on']}}" readonly>

						</p>

						<p class="row-in-form">

							<label for="PCC">PCC<span>*</span></label>

							<input id="PCC" style="background:beige" type="text" name="PCC" value="{{$userdata['pcc']}}" readonly>

						</p>





                        <p class="row-in-form">

							<label for="Country">De campagne:</label>

							<input id="Country" style="background:beige" type="text" name="Country" value="{{$userdata['country_name']}}" readonly>

						</p>

						<p class="row-in-form">

							<label for="Closing Balance">Solde de clôture<span>*</span></label>

							<input id="Closing Balance" style="background:beige" type="text" name="Closing Balance" value="{{$userdata['closing_bal']}}" readonly>

						</p>





                        

						



</form>

					

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

					<li class="item-link"><span>My Profile</span></li>

				</ul>

			</div>

			<div class=" main-content-area">

				<div class="wrap-address-billing">

					<h3 class="box-title">My Profile</h3>

					

					  @if(Session::has('success'))

            <div class="alert alert-success text-center">

                {{Session::get('success')}}

            </div>

        @endif   





              <!-- form start -->

				  

            <form action="#" method="POST" enctype="multipart/form-data">

            

					

				

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

							<label for="phone">Phone number<span>*</span></label>

							<input id="phone" style="background:beige" type="number" name="phone" value="{{$userdata['contact']}}" readonly>

						</p>

						<p class="row-in-form">

							<label for="Sign On ID">Sign On ID:</label>

							<input id="Sign On ID" style="background:beige" type="text" name="Sign On ID" value="{{$userdata['sign_on']}}" readonly>

						</p>

						<p class="row-in-form">

							<label for="PCC">PCC<span>*</span></label>

							<input id="PCC" style="background:beige" type="text" name="PCC" value="{{$userdata['pcc']}}" readonly>

						</p>





                        <p class="row-in-form">

							<label for="Country">Country:</label>

							<input id="Country" style="background:beige" type="text" name="Country" value="{{$userdata['country_name']}}" readonly>

						</p>

						<p class="row-in-form">

							<label for="Closing Balance">Closing Balance<span>*</span></label>

							<input id="Closing Balance" style="background:beige" type="text" name="Closing Balance" value="{{$userdata['closing_bal']}}" readonly>

						</p>





                        

						



</form>

					

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
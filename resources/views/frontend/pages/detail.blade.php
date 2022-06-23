@extends('frontend.master')

@section('indexhome')	





   <style type="text/css">

  



    .piclist{

        margin-top: 30px;

    }

    .piclist li{

        display: inline-block;

        width: 50px;

        height: 50px;

    }

    .piclist li img{

        width: 100%;

        height: auto;

    }



    /* custom style */

    .picZoomer-pic-wp,

    .picZoomer-zoom-wp{

        border: 1px solid #fff;

    }





    </style>





  <script type="text/javascript">

  $(document).ready(function() {

       

            jQuery('.picZoomer').picZoomer();



            $('.piclist li').on('click',function(event){

                var $pic = $(this).find('img');

                $('.picZoomer-pic').attr('src',$pic.attr('src'));

            });

        });

    </script>

	 



<?php if(session()->get('language') == 'fr') { ?>







<!--main area-->

	<main id="main" class="main-site">



		<div class="container">



			<div class="wrap-breadcrumb">

				<ul>

					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>

					<li class="item-link"><span>détail</span></li>

				</ul>

			</div>

			<div class="row">

		

			

	

			



				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="wrap-product-detail">

						<div class="detail-media">

						

				

						<!--    <div class="picZoomer">

        <img src="{{asset($product_detail->product_thambnail)}}" height="320" width="320" alt="">

    </div>



    <ul class="piclist">

        <li><img src="{{asset($product_detail->product_thambnail)}}" alt=""></li>

        <li><img src="{{asset($product_detail->product_thambnail)}}" alt=""></li>

        <li><img src="{{asset($product_detail->product_thambnail)}}" alt=""></li>

  

    </ul>-->

			

				

						

						

							<div class="product-gallery ">

	<div >

							<div class="picZoomer ">

        <img src="{{asset($product_detail->product_thambnail)}}"  alt="">

    </div>

</div>

							  <ul class=" piclist" id="bzoomsss">

							    <li data-thumb="{{asset($product_detail->product_thambnail)}}">

							    	<img src="{{asset($product_detail->product_thambnail)}}" alt="product thumbnail" id="pimage" />

							    </li>



								<li data-thumb="{{asset($product_detail->product_thambnail)}}">

							    	<img src="{{asset($product_detail->product_thambnail)}}" alt="product thumbnail" />

							    </li>



								<li data-thumb="{{asset($product_detail->product_thambnail)}}">

							    	<img src="{{asset($product_detail->product_thambnail)}}" alt="product thumbnail" />

							    </li>

								

								

							  </ul>

							  

							</div>

						</div>

						<div class="detail-info">

                            <h2 class="product-name"> <span  id="pname">{{$product_detail->product_name_fr}}</span></h2>

            

                            <div class="wrap-social">

                            	<a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>

                            </div>

                            <div class="wrap-price"><span class="product-price" id="pprice">Points: {{$product_detail->points}}</span></div>

                            <div class="stock-info in-stock">

                          <!--       <p class="availability">Disponibilité: <b>En stock</b></p> -->

                            </div>

                            <div class="quantity">

                            	<span>Quantité:</span>

								<div class="quantity-input">

									<input type="text" name="product-quatity" id="qty" value="1" data-max="120" pattern="[0-9]*" >

									

									<a class="btn btn-reduce" href="#"></a>

									<a class="btn btn-increase" href="#"></a>

								</div>

							</div>

							<div class="wrap-butons">

								<a href="#" onclick="addToCart(this)" data-id="{{$product_detail->id}}" class="btn add-to-cart">Ajouter au chariot</a>

							</div>

						</div>

					</div>

				</div><!--end main products area-->



				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">



					<div class="widget mercado-widget widget-product">

						<h2 class="widget-title">Offre spéciale</h2>

						<div class="widget-content">

							<ul class="products">



							@foreach ($special_deal as $item)

					

								<li class="product-item">

									<div class="product product-widget-style">

										<div class="thumbnnail">

											<a href="{{route('detail',$item->id)}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">

												<figure><img src="{{asset($item->product_thambnail)}}" alt=""></figure>

											</a>

										</div>

										<div class="product-info">

											<a href="{{route('detail',$item->id)}}" class="product-name"><span>{{$item->product_name_fr}}</span></a>

											<div class="wrap-price"><span class="product-price">Points: {{$item->points}}</span></div>

										</div>

									</div>

								</li>

								@endforeach



							</ul>

						</div>

					</div>



				</div><!--end sitebar-->



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

                                        <a href="{{route('detail',$item->id)}}" class="product-name"><span>{{$item->product_name_en}}</span></a>

                                        <div class="wrap-price"><span class="product-price">Points: {{$item->points}}</span></div>

                                    </div>

								</div>

								@endforeach

							</div>

						</div><!--End wrap-products-->

					</div>

				</div>



			</div><!--end row-->



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

					<li class="item-link"><span>detail</span></li>

				</ul>

			</div>

			<div class="row">

	
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="wrap-product-detail">

						<div class="detail-media">

						

				

						<!--    <div class="picZoomer">

        <img src="{{asset($product_detail->product_thambnail)}}" height="320" width="320" alt="">

    </div>



    <ul class="piclist">

        <li><img src="{{asset($product_detail->product_thambnail)}}" alt=""></li>

        <li><img src="{{asset($product_detail->product_thambnail)}}" alt=""></li>

        <li><img src="{{asset($product_detail->product_thambnail)}}" alt=""></li>

  

    </ul>-->

			

				

							<div class="product-gallery ">

	

							<div class="picZoomer ">

        <img src="{{asset($product_detail->product_thambnail)}}"  alt="">

    </div>



							  <ul class=" piclist" id="bzoomsss">


@php 
$product_id= $product_detail->id;

$getmulti = App\Models\multi_image::where('product_id', $product_id)->get(); 



@endphp


<li data-thumb="{{asset($product_detail->product_thambnail)}}">

<img src="{{asset($product_detail->product_thambnail)}}" alt="product thumbnail" id="pimage" />

</li>

                                 @foreach($getmulti as $item)

							    <li data-thumb="{{asset($item->image_name)}}">

							    	<img src="{{asset($item->image_name)}}" alt="product thumbnail" id="pimage" />

							    </li>

                                @endforeach

							




								

								

							  </ul>

							  

							</div>

						</div>

						<div class="detail-info">

                            <h2 class="product-name"> <span  id="pname">{{$product_detail->product_name_en}}</span></h2>

            

                            <div class="wrap-social">

                            	<a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>

                            </div>

                            <div class="wrap-price"><span class="product-price" id="pprice">Points: {{$product_detail->points}}</span></div>

                            <div class="stock-info in-stock">

                              <!--   <p class="availability">Availability: <b>In Stock</b></p> -->

                            </div>

                            <div class="quantity">

                            	<span>Quantity:</span>

								<div class="quantity-input">

									<input type="text" name="product-quatity" id="qty" value="1" data-max="120" pattern="[0-9]*" >

									

									<a class="btn btn-reduce" href="#"></a>

									<a class="btn btn-increase" href="#"></a>

								</div>

							</div>

							<div class="wrap-butons">

								<a href="#" onclick="addToCart(this)" data-id="{{$product_detail->id}}" class="btn add-to-cart">Add to Cart</a>

							</div>

						</div>

					</div>

				</div><!--end main products area-->



				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">



					<div class="widget mercado-widget widget-product">

						<h2 class="widget-title">Special Deal</h2>

						<div class="widget-content">

							<ul class="products">



							@foreach ($special_deal as $item)

					

								<li class="product-item">

									<div class="product product-widget-style">

										<div class="thumbnnail">

											<a href="{{route('detail',$item->id)}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">

												<figure><img src="{{asset($item->product_thambnail)}}" alt=""></figure>

											</a>

										</div>

										<div class="product-info">

											<a href="{{route('detail',$item->id)}}" class="product-name"><span>{{$item->product_name_en}}</span></a>

											<div class="wrap-price"><span class="product-price">Points: {{$item->points}}</span></div>

										</div>

									</div>

								</li>

								@endforeach



							</ul>

						</div>

					</div>



				</div><!--end sitebar-->


				<?php 


if(count($releted_product) >0){?>
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

<?php } ?>

			</div><!--end row-->



		</div><!--end container-->



	</main>

	<!--main area-->









<?php } ?>





<style>

.picZoomer{

	position: relative;

}

.picZoomer-pic-wp{

	position: relative;

	overflow: hidden;

}

.picZoomer-pic-wp:hover .picZoomer-cursor{

	display: block;

}

.picZoomer-zoom-pic{

	position: absolute;

	top: 0;

	left: 0;

}

.picZoomer-pic{

	width: 100%;

	height: 100%;

}

.picZoomer-zoom-wp{

	display: none;

	position: absolute;

	z-index: 999;

	overflow: hidden;

}

.picZoomer-cursor{

	display: none;

	cursor: crosshair;

	width: 100px;

	height: 100px;

	position: absolute;

	top: 0;

	left: 0;

	border-radius: 50%;

	border: 1px solid #eee;

	background-color: rgba(0,0,0,.1);

}

.picZoomCursor-ico{

	width: 23px;

	height: 23px;

	position: absolute;

	top: 40px;

	left: 40px;

	background: url(images/zoom-ico.png) left top no-repeat;

}





</style>



@endsection
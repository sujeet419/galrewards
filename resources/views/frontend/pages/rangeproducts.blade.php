@extends('frontend.master')
@section('indexhome')

<?php if(session()->get('language') == 'fr') { ?>
	

	<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>
					<li class="item-link"><span>Des produits</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
						</a>
					</div>

					<div class="wrap-shop-control">

						<h1 class="shop-title">Liste des produits Point Wise ( {{$value1}} - {{$value2}} )</h1>

					</div><!--end wrap shop control-->

					<div class="row">

						<ul class="product-list grid-products equal-container">


							@foreach ($rangeproducts as $item)

							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
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
							</li>

							@endforeach

						</ul>

					</div>

					<div class="wrap-pagination-info">
						<ul class="page-numbers">
							
						</ul>
						<p class="result-count"></p>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">toutes catégories</h2>
						<div class="widget-content">
							@foreach ($category as $item)
								
							<ul class="list-category">
								<li class="category-item has-child-cate">
									<a href="{{route('product-cat',$item->id)}}" class="cate-link">{{$item->categories_name_fr}}</a>
									<span class="toggle-control">+</span>

									@php
									$subcategories = App\Models\subcategory::where('category_id',$item->id)->orderBy('subcategories_name_fr','ASC')->get();
									@endphp 

									<ul class="sub-cate">
										@foreach ($subcategories as $subcat)
											
										<li class="category-item"><a href="{{route('product-subcat',[$subcat->category_id,$subcat->id])}}" class="cate-link">{{$subcat->subcategories_name_fr}}</a></li>
									
										@endforeach
									</ul>
								</li>
							</ul>
							@endforeach
						</div>
					</div><!-- Categories widget-->

			

					
					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Plage de points</h2>
						   @php
                            $max=DB::table('products')->max('points');
                             // dd($max);
                          @endphp
						<div class="widget-content">
							<form action="{{ route('product-range')}}" method="post" enctype="multipart/form-data">
     @csrf
						<div id="slider-range" data-min="0" data-max="{{$max}}"></div>
                                                <div class="product_filter">
                                             
                                                </div>
						
						
							<div id="slider-range"></div>
							<p style="margin-top:20px">
								<label for="amount">Points:</label>
								<input name="points" type="text" id="amount" readonly>
								 <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_POST['price_range'])){{$_POST['price_range']}}@endif"/>
								<button type="submit" class="filter-submit">Filtre</button>
							</p>
						</div>
					</div><!-- Price-->
</form>

			

				

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Produits populaires</h2>
						<div class="widget-content">
							<ul class="products">
								@php
								$product = App\Models\product::where('special_deals',1)->limit(8)->get();
								@endphp 

								@foreach ($product as $item)

								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{route('detail',$item->id)}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{asset($item->product_thambnail)}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="{{route('detail',$item->id)}}" class="product-name"><span>{{$item->product_name_fr}}</span></a>
											<div class="wrap-price"><span class="product-price">{{$item->points}}</span></div>
										</div>
									</div>
								</li>
																	
								@endforeach

							</ul>
						</div>
					</div><!-- brand widget-->

				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->
	
<?php }else{?>


<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">Home</a></li>
					<li class="item-link"><span>Products</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
						</a>
					</div>

					<div class="wrap-shop-control">

						<h1 class="shop-title">Point Wise Product List ( {{$value1}} - {{$value2}} )</h1>

					</div><!--end wrap shop control-->

					<div class="row">

						<ul class="product-list grid-products equal-container">


							@foreach ($rangeproducts as $item)

							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
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
										<div class="wrap-price"><span class="product-price">{{$item->points}}</span></div>
									</div>
								</div>
							</li>

							@endforeach

						</ul>

					</div>

					<div class="wrap-pagination-info">
						<ul class="page-numbers">
							
						</ul>
						<p class="result-count"></p>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							@foreach ($category as $item)
								
							<ul class="list-category">
								<li class="category-item has-child-cate">
									<a href="{{route('product-cat',$item->id)}}" class="cate-link">{{$item->categories_name_en}}</a>
									<span class="toggle-control">+</span>

									@php
									$subcategories = App\Models\subcategory::where('category_id',$item->id)->orderBy('subcategories_name_en','ASC')->get();
									@endphp 

									<ul class="sub-cate">
										@foreach ($subcategories as $subcat)
											
										<li class="category-item"><a href="{{route('product-subcat',[$subcat->category_id,$subcat->id])}}" class="cate-link">{{$subcat->subcategories_name_en}}</a></li>
									
										@endforeach
									</ul>
								</li>
							</ul>
							@endforeach
						</div>
					</div><!-- Categories widget-->

			

					
					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Points Range</h2>
						   @php
                            $max=DB::table('products')->max('points');
                             // dd($max);
                          @endphp
						<div class="widget-content">
							<form action="{{ route('product-range')}}" method="post" enctype="multipart/form-data">
     @csrf
						<div id="slider-range" data-min="0" data-max="{{$max}}"></div>
                                                <div class="product_filter">
                                             
                                                </div>
						
						
							<div id="slider-range"></div>
							<p style="margin-top:20px">
								<label for="amount">Points:</label>
								<input name="points" type="text" id="amount" readonly>
								 <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_POST['price_range'])){{$_POST['price_range']}}@endif"/>
								<button type="submit" class="filter-submit">Filter</button>
							</p>
						</div>
					</div><!-- Price-->
</form>

			

				

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Popular Products</h2>
						<div class="widget-content">
							<ul class="products">
								@php

		$data = session()->all(); 
		
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		$class = $country_name;
         }
		else{
		$class = '';
		}


		$product = App\Models\product::where('special_deals',1)->where('product_start_date', '<=', now())
    ->where('product_end_date', '>=', now())->whereRaw('find_in_set("'.$class.'",country_id)')->limit(8)->get();
								
	@endphp 

								@foreach ($product as $item)

								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{route('detail',$item->id)}}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{asset($item->product_thambnail)}}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="{{route('detail',$item->id)}}" class="product-name"><span>{{$item->product_name_en}}</span></a>
											<div class="wrap-price"><span class="product-price">{{$item->points}}</span></div>
										</div>
									</div>
								</li>
																	
								@endforeach

							</ul>
						</div>
					</div><!-- brand widget-->

				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->


<?php } ?>
	
	
	<script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 600;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>


	@endsection
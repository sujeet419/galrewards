@extends('frontend.master')

@section('indexhome')

  @if(Session::has('success'))

  <div class="alert alert-success text-center" id="success-alert">

                {{Session::get('success')}}

            </div>

        @endif

		

<?php if(session()->get('language') == 'fr') { ?>	

		

		

<main id="main">

    <div class="container-fluid">



        <!--MAIN SLIDE-->

        <div class="wrap-main-slide">

            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">

                @foreach ($slider as $item)

                    

                <div class="item-slide">

                    <img src="{{asset($item->image)}}" alt="" class="img-slide">

                   

                </div>

                @endforeach

            </div>

        </div>



        <!--BANNER-->

        <div class="wrap-banner style-twin-default">

		



		   @foreach ($revolimage as $item)

            <div class="banner-item">

                <a href="#" class="link-banner banner-effect-1">

                    <figure><img src="{{asset($item->image)}}" alt="" width="780" height="190"></figure>

                </a>

            </div>

             @endforeach

		 

        </div>





     <div class="wrap-show-advance-info-box style-1">

            <h3 class="title-box">

                

          OFFRE SPÉCIALE

            </h3>

            {{-- <div class="wrap-top-banner">

                <a href="#" class="link-banner banner-effect-2">

                    <figure><img src="{{asset('frontend/assets/images/banner/banner_0.jpg')}}" width="1580" height="100" alt=""></figure>

                </a>

            </div> --}}

            <div class="wrap-products">

                <div class="wrap-product-tab tab-style-1">						

                    <div class="tab-contents">

                        <div class="tab-content-item active" id="digital_1a">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                @foreach ($featured as $item)

                                    

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

                        </div>							

                    </div>

                </div>

            </div>

        </div>





    



        <!--Latest Products-->

        <div class="wrap-show-advance-info-box style-1">

            <h3 class="title-box">

                

           derniers produits 

            </h3>

            {{-- <div class="wrap-top-banner">

                <a href="#" class="link-banner banner-effect-2">

                    <figure><img src="{{asset('frontend/assets/images/banner/banner_0.jpg')}}" width="1580" height="100" alt=""></figure>

                </a>

            </div> --}}

            <div class="wrap-products">

                <div class="wrap-product-tab tab-style-1">						

                    <div class="tab-contents">

                        <div class="tab-content-item active" id="digital_1a">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                @foreach ($products as $item)

                                    

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

                        </div>							

                    </div>

                </div>

            </div>

        </div>



        <!--Product Categories-->

        <div class="wrap-show-advance-info-box style-1">

            <h3 class="title-box">

                

           catégories de produits

            </h3>

            {{-- <div class="wrap-top-banner">

                <a href="#" class="link-banner banner-effect-2">

                    <figure><img src="{{asset('frontend/assets/images/banner/cms-banner.jpg')}}" width="1580" height="240" alt=""></figure>

                </a>

            </div> --}}

            <div class="wrap-products">

                <div class="wrap-product-tab tab-style-1">



                    @php

                         $name = 1;

                    @endphp



                    <div class="tab-control">

                        <a href="#categoryall" class="tab-control-item active">Toute</a>

                        @foreach ($category as $item)

                        <a href="#category{{$item->id}}" class="tab-control-item">{{$item->categories_name_fr}}</a>



                        @endforeach

                    </div>





                    <div class="tab-contents">

                        <div class="tab-content-item active" id="categoryall">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >



                        @php

                            $catwiseProduct = App\Models\Product::orderBy('id','DESC')->limit(8)->get(); 

                        @endphp	

                        

                        @foreach ($catwiseProduct as $item)

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

                        </div>

                    </div>







                    <div class="tab-contents">

                        @foreach ($category as $item)

                        <div class="tab-content-item" id="category{{$item->id}}">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >



                        @php

                            $catwiseProduct = App\Models\Product::where('category_id',$item->id)->orderBy('id','DESC')->limit(8)->get(); 

                        @endphp	

                        

                        @foreach ($catwiseProduct as $item)

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

                        </div>

                            @endforeach

                    </div>



                </div>

            </div>

        </div>			



    </div>



</main>



<?php }else{?>





<main id="main">

    <div class="container-fluid">



        <!--MAIN SLIDE-->

        <div class="wrap-main-slide">

            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">

                @foreach ($slider as $item)

                    

                <div class="item-slide">

                    <img src="{{asset($item->image)}}" alt="" class="img-slide">

                   

                </div>

                @endforeach

            </div>

        </div>



        <!--BANNER-->

        <div class="wrap-banner style-twin-default">

		

		   @foreach ($revolimage as $item)

            <div class="banner-item">

                <a href="#" class="link-banner banner-effect-1">

                    <figure><img src="{{asset($item->image)}}" alt="" width="780" height="190"></figure>

                </a>

            </div>

             @endforeach

		

          

          

        </div>







  <!--special Products-->

        <div class="wrap-show-advance-info-box style-1">

            <h3 class="title-box">

                

           SPECIAL DEAL 

            </h3>

            {{-- <div class="wrap-top-banner">

                <a href="#" class="link-banner banner-effect-2">

                    <figure><img src="{{asset('frontend/assets/images/banner/banner_0.jpg')}}" width="1580" height="100" alt=""></figure>

                </a>

            </div> --}}

            <div class="wrap-products">

                <div class="wrap-product-tab tab-style-1">						

                    <div class="tab-contents">

                        <div class="tab-content-item active" id="digital_1a">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                @foreach ($featured as $item)

                                    

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

                        </div>							

                    </div>

                </div>

            </div>

        </div>



        <!--Latest Products-->

        <div class="wrap-show-advance-info-box style-1">

            <h3 class="title-box">Latest Products </h3>

            <div class="wrap-products">

                <div class="wrap-product-tab tab-style-1">						

                    <div class="tab-contents">

                        <div class="tab-content-item active" id="digital_1a">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                                @foreach ($products as $item)

                                    

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

                        </div>							

                    </div>

                </div>

            </div>

        </div>




 <!-- Products Category -->

 <div class="wrap-show-advance-info-box style-1">

<h3 class="title-box">Shop By Category </h3>

<div class="wrap-products">

    <div class="wrap-product-tab tab-style-1">						

        <div class="tab-contents">

            <div class="tab-content-item active" id="digital_1a">

                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                    @foreach ($category as $item)

                        

                    <div class="product product-style-2 equal-elem ">

                        <div class="product-thumnail">

                       
                            <a href="{{route('product-cat',$item->id)}}" title="image">

                                <figure><img src="{{asset($item->image)}}" width="200" height="200" alt="image"></figure>

                            </a>

                          

                        </div>

                        <div class="product-info">

                            <a href="{{route('product-cat',$item->id)}}" class="product-name"><span>{{$item->categories_name_en}}</span></a>

                           

                        </div>

                    </div>

                    @endforeach



                </div>

            </div>							

        </div>

    </div>

</div>

</div>






        <!--Product Categories-->

        <!-- <div class="wrap-show-advance-info-box style-1">

            <h3 class="title-box">Product Categories</h3>

            <div class="wrap-products">
             <div class="wrap-product-tab tab-style-1">

                    @php

                         $name = 1;

                    @endphp



                    <div class="tab-control">

                        <a href="#categoryall" class="tab-control-item active">All</a>

                        @foreach ($category as $item)

                        <a href="#category{{$item->id}}" class="tab-control-item">{{$item->categories_name_en}}</a>



                        @endforeach

                    </div>





                    <div class="tab-contents">

                        <div class="tab-content-item active" id="categoryall">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >



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


$catwiseProduct = App\Models\Product::where('product_active','1')->where('product_start_date', '<=',now())
->where('product_end_date', '>=', now())->whereRaw('find_in_set("'.$class.'",country_id)')->orderBy('id','DESC')->limit(8)->get(); 
@endphp	

                        

                        @foreach ($catwiseProduct as $item)

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

                        @endforeach

                                

                            </div>

                        </div>

                    </div>


                    <div class="tab-contents">

                        @foreach ($category as $item)

                        <div class="tab-content-item" id="category{{$item->id}}">

                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

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


    $catwiseProduct = App\Models\Product::where('product_active','1')->where('product_start_date', '<=', now())
->where('product_end_date', '>=', now())->whereRaw('find_in_set("'.$class.'",country_id)')->where('category_id',$item->id)->orderBy('id','DESC')->limit(8)->get(); 
@endphp	

                        

                        @foreach ($catwiseProduct as $item)

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

                        @endforeach

                                

                            </div>

                        </div>

                            @endforeach

                    </div>



                </div>

            </div>

        </div> -->			



    </div>



</main>







<?php } ?>







<script>

    $(document).ready(function(){

  

 



      $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){

    $("#success-alert").slideUp(500);

});







    })

</script>



@endsection
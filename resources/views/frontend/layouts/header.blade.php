<!--header-->

	<header id="header" class="header header-style-1">

	<?php if(session()->get('language') == 'fr') {?>

		<div class="container-fluid">

			<div class="row">

				<div class="topbar-menu-area">

					<div class="container">

						<div class="topbar-menu left-menu">

							<ul>

								<li class="menu-item" >

									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>

								</li>

							</ul>

						</div>

						<div class="topbar-menu right-menu">


							<ul>



							<li class="menu-item lang-menu menu-item-has-children parent">

									<a title="Lang" href="#">

									<span class="img label-before"></span> 

									@if(session()->get('language') == 'fr') Langue @else Language @endif 

									 |  @if(session()->get('language') == 'fr') français @else English @endif <i class="fa fa-angle-down" aria-hidden="true"></i></a>

									

									<ul class="submenu lang" >

										

									<li class="menu-item" ><a title="English" href="{{route('setenlangauge')}}">

									<span class="img label-before"><img src="{{asset('frontend/assets/images/lang-en.png') }}" alt="lang-en"></span>English</a></li>	

									

									<li class="menu-item" ><a title="french" href="{{route('setfrlangauge')}}">

									<span class="img label-before"><img src="{{asset('frontend/assets/images/lang-fra.png') }}" alt="lang-fre"></span>French</a></li>

	

									</ul>

								</li>





								<li class="menu-item" >



								<?php $data = session()->all(); 

							

								if(isset($data['userdata'])){?>

							



							<li class="menu-item menu-item-has-children parent" >

									<a title="My Account" href="#">{{$data['userdata']}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>

									<ul class="submenu curency" >

										

										<li class="menu-item"><a href="{{route('account_details')}}">My Profile</a></li>

										<li class="menu-item"><a href="{{route('accountsummary')}}">Account Summary</a></li>

										<li class="menu-item"><a href="{{route('orders')}}">Orders</a></li>

										<li class="menu-item"><a href="{{route('ticket_status')}}">My Ticket</a></li>																														

										<li class="menu-item" ><a title="logout" href="{{route('user_logout')}}"> Logout</a></li>

									</ul>

								</li>



						

								<?php } else{

								?>

								<a title="Register or Login" href="{{route('flogin')}}">Login</a>

								<?php } ?>

							

							</li>

								

							</ul>




						</div>

					</div>

				</div>



				<div class="container">

					<div class="mid-section main-info-area">



						<div class="wrap-logo-top left-section">

							<a href="{{route('frontend')}}" class="link-to-home">

							

							<img src="{{asset('frontend/assets/images/logo.jpg')}}" alt="Galrewards" style="height:100px"><b style="font-size: 21px;">Galrewards</b></a>

						</div>



						<div class="wrap-search center-section">

						<?php $data = session()->all(); 

if(isset($data['userdata'])){?>

							<div class="wrap-search-form">
							<form method="post" action="#" onkeydown="return event.key != 'Enter';">
							@csrf
									<input type="text" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" value="" placeholder="Search here...">

									<button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
									<div id="searchProducts"></div>

								</div>

								<?php } ?>

						</div>



						<div class="wrap-icon right-section">

						
						<?php $data = session()->all(); 

if(isset($data['userdata'])){?>
							<div class="wrap-icon-section minicart">



								<a href="{{route('cart')}}" class="link-direction">

									<i class="fa fa-shopping-basket" aria-hidden="true"></i>

								

									<div class="left-info">

									<span class="index" id="cartqty"> </span>

										

										<span class="title">CART</span>

										<span class="index" style="background-color: green;" id="cartSubTotal"> </span>

									</div>

								</a>



                                   <div style="margin-left:93px">

								<a href="#" class="link-direction">

									

								

								<i class="fa fa-google-wallet" aria-hidden="true">Points</i>

								<div class="left-info">

								<span class="title">

								

								

								<?php if(isset($data['userData'])){ 


                               $data = session()->all(); 



                                $allsesion= $data['userData'];



								 $user_id= $allsesion['user_id'];

							

								

								 $closing_bal=DB::table('registers')->where('id',$user_id)->first();

							

	                            echo $closing_bal= $closing_bal->closing_bal;

									

								

								}

									?>

								

								</span>

								

										

								</div>

								</a>

								</div>





							</div>

							<?php } ?>

							<div class="wrap-icon-section show-up-after-1024">

								<a href="#" class="mobile-navigation">

									<span></span>

									<span></span>

									<span></span>

								</a>

							</div>

						</div>



					</div>

				</div>



				<div class="nav-section header-sticky">

				



					<div class="primary-nav-section">

						<div class="container">

							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >

										<li class="menu-item home-icon">

									<a href="{{route('frontend')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>

								</li>

								<li class="menu-item">

									<a href="{{route('aboutus')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') À propos de nous @else About Us @endif 	

									</a>

								</li>

								<li class="menu-item">

									<a href="{{route('shop')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') Des produits @else Products @endif 	

									</a>

								</li>

								<li class="menu-item">

									<a href="{{route('cart')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') Chariot @else Cart @endif 

										</a>

								</li>

							

								

									<li class="menu-item">

									<a href="{{route('ticket')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') Augmenter le billet @else Raise Ticket @endif 	

									</a>

								</li>

																									

							</ul>

						</div>

					</div>

				</div>

			</div>

		</div>



	<?php }else{?>

	

	

	<div class="container-fluid">

			<div class="row">

				<div class="topbar-menu-area">

					<div class="container">

						<div class="topbar-menu left-menu">

							<ul>

								<li class="menu-item" >

									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>

								</li>

							</ul>

						</div>

						<div class="topbar-menu right-menu">


							<ul>



							<li class="menu-item lang-menu menu-item-has-children parent">

									<a title="Lang" href="#">

									<span class="img label-before"></span> 

									@if(session()->get('language') == 'fr') Langue @else Language @endif 

									 |  @if(session()->get('language') == 'fr') français @else English @endif <i class="fa fa-angle-down" aria-hidden="true"></i></a>

									

									<ul class="submenu lang" >

										

									<li class="menu-item" ><a title="English" href="{{route('setenlangauge')}}">

									<span class="img label-before"><img src="{{asset('frontend/assets/images/lang-en.png') }}" alt="lang-en"></span>English</a></li>	

									

									<li class="menu-item" ><a title="french" href="{{route('setfrlangauge')}}">

									<span class="img label-before"><img src="{{asset('frontend/assets/images/lang-fra.png') }}" alt="lang-fre"></span>French</a></li>

	

									</ul>

								</li>





								<li class="menu-item" >



								<?php $data = session()->all(); 

							

								if(isset($data['userdata'])){?>

							



							<li class="menu-item menu-item-has-children parent" >

									<a title="My Account" href="#">{{$data['userdata']}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>

									<ul class="submenu curency" >

										

										<li class="menu-item"><a href="{{route('account_details')}}">My Profile</a></li>

										<li class="menu-item"><a href="{{route('accountsummary')}}">Account Summary</a></li>

										<li class="menu-item"><a href="{{route('orders')}}">Orders</a></li>

										<li class="menu-item"><a href="{{route('ticket_status')}}">My Ticket</a></li>																														

										<li class="menu-item" ><a title="logout" href="{{route('user_logout')}}"> Logout</a></li>

									</ul>

								</li>



						

								<?php } else{

								?>

								<a title="Register or Login" href="{{route('flogin')}}">Login</a>

								<?php } ?>

							

							</li>

								

							</ul>




						</div>

					</div>

				</div>



				<div class="container">

					<div class="mid-section main-info-area">



						<div class="wrap-logo-top left-section">

							<a href="{{route('frontend')}}" class="link-to-home">

							

							<img src="{{asset('frontend/assets/images/logo.jpg')}}" alt="Galrewards" style="height:100px"><b style="font-size: 21px;">Galrewards</b></a>

						</div>



						<div class="wrap-search center-section">

						<?php $data = session()->all(); 

if(isset($data['userdata'])){?>

							<div class="wrap-search-form">
							<form method="post" action="#" onkeydown="return event.key != 'Enter';">
							@csrf
									<input type="text" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" value="" placeholder="Search here...">

									<button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
									<div id="searchProducts"></div>

								</div>

								<?php } ?>

						</div>



						<div class="wrap-icon right-section">

						
						<?php $data = session()->all(); 

if(isset($data['userdata'])){?>
							<div class="wrap-icon-section minicart">



								<a href="{{route('cart')}}" class="link-direction">

									<i class="fa fa-shopping-basket" aria-hidden="true"></i>

								

									<div class="left-info">

									<span class="index" id="cartqty"> </span>

										

										<span class="title">CART</span>

										<span class="index" style="background-color: green;" id="cartSubTotal"> </span>

									</div>

								</a>



                                   <div style="margin-left:93px">

								<a href="#" class="link-direction">

									

								

								<i class="fa fa-google-wallet" aria-hidden="true">Points</i>

								<div class="left-info">

								<span class="title">

								

								

								<?php if(isset($data['userData'])){ 


                               $data = session()->all(); 



                                $allsesion= $data['userData'];



								 $user_id= $allsesion['user_id'];

							

								

								 $closing_bal=DB::table('registers')->where('id',$user_id)->first();

							

	                            echo $closing_bal= $closing_bal->closing_bal;

									

								

								}

									?>

								

								</span>

								

										

								</div>

								</a>

								</div>





							</div>

							<?php } ?>

							<div class="wrap-icon-section show-up-after-1024">

								<a href="#" class="mobile-navigation">

									<span></span>

									<span></span>

									<span></span>

								</a>

							</div>

						</div>



					</div>

				</div>



				<div class="nav-section header-sticky">

				



					<div class="primary-nav-section">

						<div class="container">

							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >

										<li class="menu-item home-icon">

									<a href="{{route('frontend')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>

								</li>

								<li class="menu-item">

									<a href="{{route('aboutus')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') À propos de nous @else About Us @endif 	

									</a>

								</li>

								<li class="menu-item">

									<a href="{{route('shop')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') Des produits @else Products @endif 	

									</a>

								</li>

								<li class="menu-item">

									<a href="{{route('cart')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') Chariot @else Cart @endif 

										</a>

								</li>

							

								

									<li class="menu-item">

									<a href="{{route('ticket')}}" class="link-term mercado-item-title">

									@if(session()->get('language') == 'fr') Augmenter le billet @else Raise Ticket @endif 	

									</a>

								</li>

																									

							</ul>

						</div>

					</div>

				</div>

			</div>

		</div>

	

	

	<?php }?>









		<style>

  

			.search-area{

			  position: relative;

			}

			  #searchProducts {

				position: absolute;

				top: 100%;

				left: 0;

				width: 100%;

				background: #ffffff;

				z-index: 999;

				border-radius: 8px;

				margin-top: 5px;

			  }

			  



 

 

 .submenu  > li >  a {

  position: relative;

}



.submenu  > li > a::before {

    content: '';

    position: absolute;

    width: 100%;

    height: 4px;

    border-radius: 4px;

    background-color: #18272F;

    bottom: 0;

    left: 0;

    transform-origin: right;

    transform: scaleX(0);

    transition: transform .3s ease-in-out;

  }



.submenu  > li > a:hover::before {

  transform-origin: left;

  transform: scaleX(1);

}

			  

			  

			</style>

			

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>			

			<script>

			  function search_result_hide(){

				$("#searchProducts").slideUp();

			  }

			   function search_result_show(){

				  $("#searchProducts").slideDown();

			  }

			</script>



<script type="text/javascript">
    $.ajaxSetup({
      headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
    });
				


const site_url = "https://mygalrewards.com/galrewards/";

        //$("body").on("keyup", "#search", function(){
       

            $('#search').on('keyup',function () {
           
          
          let text = $("#search").val();

          if (text.length <= 2 ) $("#searchProducts").html("");
         
          $("#searchProducts").html("")
          if (text.length > 0) {
       
          $.ajax({
           
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            // url : site_url + "search-product",
             //url : 'https://mygalrewards.com/galrewards/search-product',
            url: "{{ url('/search-product') }}",
            type : 'post',
            crossDomain: true,
         
            data: {
        "_token": "{{ csrf_token() }}",
        "search": text
        },

     
            success:function(result){
             // console.log("sujeet");
              $("#searchProducts").html(result);
            }
            
        
          }); // end ajax 
        
        } // end if
        
        if (text.length < 1 ) $("#searchProducts").html("");
        
     
        
        }); // end one 
        </script>




	</header>
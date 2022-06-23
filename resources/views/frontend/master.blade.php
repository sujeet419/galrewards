<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />


	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
	 <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/chosen.min.css')}}">
	 <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/assets/css/color-01.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">   
</head>
<body class="home-page home-01 ">

<style>
  label.error {
       color: #dc3545;
       font-size: 14px;
  }
</style>

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

@include('frontend.layouts.header')

@yield('indexhome')

@include('frontend.layouts.footer')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
</script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
   
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
   
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
   
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
   </script>
   
 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
   
   
<script src="{{asset('frontend/assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>

<script src="{{asset('frontend/assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('frontend/assets/js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
	
<script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.sticky.js')}}"></script>
<script src="{{asset('frontend/assets/js/functions.js')}}"></script>



<script src="{{asset('frontend/assets/js/src/jquery.picZoomer.js')}}"></script>





<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

//--------------------------------------------------------- add to cart product-------------------------------//

	function addToCart(cart){

	 var id = cart.getAttribute('data-id');
	  var product_name = $('#pname').text();
	  var quantity = $('#qty').val();

	  //alert(quantity);
	$.ajax({
	type: "POST",
	url: "{{  url('/cart/data/store') }}/"+id,
	data: {quantity:quantity, product_name:product_name },
	dataType: "json",
	success: function (data) {

	console.log(data);
		miniCart()

		const Toast = Swal.mixin({
		toast: true,
	position: 'top-end',
	icon: 'success',

	showConfirmButton: false,
	timer: 3000
	})
	if ($.isEmptyObject(data.error)) {
	Toast.fire({
		type: 'success',
		title: data.success
	})
	} else {
	Toast.fire({
		type: 'error',
		title: data.error
	})
	
	}
		
	}
	});

	}

</script>
{{-- //--------------------------------------------Mini Cart----------------------------------------------// --}}

<script type="text/javascript">

	function miniCart() { 
	  $.ajax({
		type: "GET",
		 url: "{{  url('/product/mini/cart') }}/",

		dataType: "json",
		success: function (response) {

			$('span[id="cartqty"]').text(response.cartqty);
			$('span[id="cartSubTotal"]').text(response.cartTotal);
		}
	  });
	 }
	 miniCart()
	</script>

{{-- //------------------------------------------Cart page----------------------------------------// --}}


<script type="text/javascript">

	function cart() { 
	  $.ajax({
		type: "GET",
		url: "{{  url('/get-mycart-product') }}/",
		dataType: "json",
		success: function (response) {
		  console.log(response);
		  $('b[id="Subtotal"]').text(response.cartTotal);
		  var vat = response.cartTotal*3/100;
		  $('span[id="vat"]').text('GH₵ '+vat);
		  var covid = response.cartTotal*1/100;
		  $('span[id="covid"]').text('GH₵ '+covid);
  
		  var total = (Number(response.cartTotal))+(Number(vat))+(Number(covid));
  
		
			$('span[id="Grandtotal"]').text('GH₵ '+(total).toFixed(2));
			//console.log(response);
		  var rows = ""
		  $.each(response.carts, function (key, value) { 
			//console.log(value.product_thambnail);
			rows += `<tr>
			  <td class="col-md-2"><img src="{{url('/')}}/${value.product_thambnail}" alt="imga" style="width: 60px; height: 60px;"></td>
			  <td class="col-md-2">
				<div class="product-name"><a href="#">${value.product_name}</a></div>
				<div class="price">${value.point}</div>
			  </td>
				<td class="col-md-2"> 
  
			${value.quantity > 1 ? `
			
			  <button type="submit" class="btn btn-danger tn-sm"  id="${value.id}" onclick="cartdecrement(this.id)">-</button>` : `
			  <button type="submit" class="btn btn-danger tn-sm" disabled>-</button>`}
			<input type="text" value="${value.quantity}" min="1" max="100" disabled="" style="width: 25px; text-align:center">
			  <button type="submit" class="btn btn-success tn-sm" id="${value.id}" onclick="cartrincrement(this.id)">+</button>
		   
				</td>
	
				<td class="col-md-2">
				  <strong>${value.point}</strong>
				</td>
			  <td class="col-md-1 close-btn">
				<button type="submit" id="${value.id}" onclick="cartremove(this.id)" class=""><i class="fa fa-times-circle" aria-hidden="true"></i></button>
			  </td>
			</tr>`
		  });
	
		  $('#mycart').html(rows);
		}
		
	  });
	 }
	 cart();
	
	// remove cart
	
	 function cartremove(id){
	   $.ajax({
		 type: "GET",
		  url: "{{  url('/cart/remove') }}/"+id,
		 //url: "/cart/remove/"+rowId,
		 dataType: "json",
		 success: function (data) {
		  //couponCalculation();
		  cart();
		  miniCart();
		   //sweet alert msg 
	
		   const Toast = Swal.mixin({
		  toast: true,
	  position: 'top-end',
	  icon: 'success',
	  // title: 'Product Added In Cart',
	  showConfirmButton: false,
	  timer: 3000
	})
	if ($.isEmptyObject(data.error)) {
	  Toast.fire({
		type: 'success',
		icon: 'success',
		title: data.success
	  })
	  location.reload(true);
	} else {
	  Toast.fire({
		type: 'error',
		icon: 'error',
		title: data.error
	  })
	  
	}
		   
		 }
	   });
	 }
	
	//cart Increment 
	
	function cartrincrement(id){
	$.ajax({
	  type: "GET",
	   url: "{{  url('/cart-increment') }}/"+id,
	  //url: "/cart-increment/"+rowId,
	  dataType: "json",
	  success: function (response) {
		//couponCalculation();
		cart();
		miniCart();
	  }

	});
	}
	
	// cart decrement 
	
	function cartdecrement(id){
	$.ajax({
	  type: "GET",
	  url: "{{  url('/cart-decrement') }}/"+id,
	  //url: "/cart-decrement/"+rowId,
	  dataType: "json",
	  success: function (response) {
		//couponCalculation();
		cart();
		miniCart();
		
	  }
	});
	}
	
	
	
	</script>

</html>
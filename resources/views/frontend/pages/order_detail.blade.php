@extends('frontend.master')
@section('indexhome')
<?php if(session()->get('language') == 'fr') { ?>
<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('frontend') }}" class="link">domicile</a></li>
					<li class="item-link"><span>Détails de la commande</span></li>
				</ul>
				<a href="{{ route('orders') }}" class="btn btn-primary" >Arrière</a>  
				
				<form action="{{ route('generateorderPDF') }}" method="POST" enctype="multipart/form-data" >
				@csrf 
				<input type="hidden" name="invoice_no" class="form-control" value="{{$invoice_no}}" readonly   autocomplete=off>
				
				
				<button type="submit" class="btn btn-primary float-right pull-right" id="data">Télécharger le PDF</button>
				</form>
				
				
				
			</div>
			<div class=" main-content-area">
				
					<h3 class="box-title">Détails de la commande</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
           
        @endif   


              <!-- List start -->
				  
            
              <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom du produit</th>
      <th scope="col">Numéro de commande</th>
      <th scope="col">Quantité de produit</th>
      <th scope="col">Points produit</th>
      <th scope="col">Total</th>
      <th scope="col">Date de commande</th>
      <th scope="col">Statut de la commande</th>
    
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($orderdetail as $item)

    <tr>
      <th scope="row">{{ $sno++ }}</th>
      <td>{{ $item->product_name_en ?? '' }}</td>
      <td>{{ $item->invoice_no ?? '' }}</td>
      <td>{{ $item->product_qty ?? '' }}</td>
      <td>{{ $item->points ?? '' }}</td>
      <td>{{ $item->subtotal ?? '' }}</td>
      <td>{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
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

<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Order details</span></li>
				</ul>
				<a href="{{ route('orders') }}" class="btn btn-primary" >Back</a>  
				
				<form action="{{ route('generateorderPDF') }}" method="POST" enctype="multipart/form-data" >
				@csrf 
				<input type="hidden" name="invoice_no" class="form-control" value="{{$invoice_no}}" readonly   autocomplete=off>
				
				
				<button type="submit" class="btn btn-primary float-right pull-right" id="data">Download PDF</button>
				</form>
				
				
				
			</div>
			<div class=" main-content-area">
				
					<h3 class="box-title">Order details</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
           
        @endif   


              <!-- List start -->
				  
            
              <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Order Number</th>
      <th scope="col">Product Qty</th>
      <th scope="col">Product Point</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Order date</th>
      <th scope="col">Order Status</th>
    
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($orderdetail as $item)

    <tr>
      <th scope="row">{{ $sno++ }}</th>
      <td>{{ $item->product_name_en ?? '' }}</td>
      <td>{{ $item->invoice_no ?? '' }}</td>
      <td>{{ $item->product_qty ?? '' }}</td>
      <td>{{ $item->points ?? '' }}</td>
      <td>{{ $item->subtotal ?? '' }}</td>
      <td>{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
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


<?php } ?>
	
	
@endsection
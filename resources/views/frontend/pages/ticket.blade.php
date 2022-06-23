@extends('frontend.master')
@section('indexhome')

<?php if(session()->get('language') == 'fr') { ?>
<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>
					<li class="item-link"><span>Billet</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="">
					<h3 class="box-title">Relever le ticket</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{Session::get('success')}}
            </div>
        @endif   


              <!-- form start -->
				  
            <form action="{{ route('ticket_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
					
					

			<div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="need_assistance">Formulaire d'aide:</label>

						<select name="need_assistance" class="form-control">
						<option value="Discrepancy in points">Discrepancy in points</option>
                       <option value="Item Not Delivered/Wrong Item Delivered">Item Not Delivered/Wrong Item Delivered</option>
						<option value="Other">Other</option>
</select>

                       
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="comment">Commenter :</label>
                        <input type="text" class="form-control" value="" placeholder="Comment" name="comment" required>
                    </div>
                    </div>
                    </div>


					<input type="submit" class="btn btn-submit primaray btn-primary pull-right" value="nous faire parvenir" name="submit">
					
					</form>
				</div>
				</div>

				<div style="display:none;">
						<p class="row-in-form">
							<label for="first_name">Prénom<span>*</span></label>
							<input id="user_id" style="background:beige" type="hidden" name="user_id" value="{{$userdata['id']}}" readonly>

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
							<input id="Sign On ID" style="background:beige" type="text" name="Sign On ID" value="{{$userdata['sign_on']}}" placeholder="Sign On ID">
						</p>
						<p class="row-in-form">
							<label for="PCC">PCC<span>*</span></label>
							<input id="PCC" style="background:beige" type="text" name="PCC" value="{{$userdata['pcc']}}" placeholder="PCC">
						</p>
						

</div>
						
					
						
						
				
			
				


				<div class="">
				<h3 class="title-box" style="background-color: #4E5D53;display: inline-block;
    width: 100%;
    text-align: left;
   background-color: #4E5D53; 
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 700;
    color: #fefefe;
    line-height: 14px;
    padding: 13px 18px;
    margin: 0;">Ticket </h3><br><br>
							<a class="btn btn-submit primaray btn-primary pull-right" href="{{route('ticket_status')}}">All Ticket</a> 
						
						
						<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
	   <th scope="col">Ticket Number</th>
      <th scope="col">Need Assistance</th>
      <th scope="col">Comment</th>
      <th scope="col">Ticket date</th>
      <th scope="col">Status</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($ticketlist as $item)

    <tr>
      <th scope="row"><a href="{{ route('ticket_detail',$item->id)}}">{{ $sno++ }}</a></th>
	    <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->ticket_number ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->need_assistance ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->comment ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->ticket_date ?? '' }}</a></td>
      <td>
      @if ($item->status == 0)
                                    
                                    <span class="badge badge-pill badge-danger" style="background-color: red;">
									Open</span>
                               
                                    @elseif($item->status == 1)
                               
                                    <span class="badge badge-pill badge-success" style="background-color: #f59524;">
									WIP</span>     
                                    
                                    @else

                                    <span class="badge badge-pill badge-success" style="background-color: green;">
									Closed</span>  
                               
                                @endif   
      
      
     </td>
      <td><a href="{{ route('ticket_detail',$item->id)}}"><i class="fa fa-eye"></i></a></td>
    </tr>
  
    @endforeach
  </tbody>
</table>
					
				

				

			</div><!--end main content area-->
		</div><!--end container-->


	

	</main>
	<!--main area-->
	
<?php }else{ ?>

<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">Home</a></li>
					<li class="item-link"><span>Ticket</span></li>
				</ul>
			</div>
			
			
			<div class=" main-content-area">
			
					<h3 class="box-title">Raise Ticket</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{Session::get('success')}}
            </div>
        @endif   


              <!-- form start -->
				  
            <form action="{{ route('ticket_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
					

			<div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="need_assistance">Assistance For:</label>

						<select name="need_assistance" class="form-control">
						<option value="Discrepancy in points">Discrepancy in points</option>
                       <option value="Item Not Delivered/Wrong Item Delivered">Item Not Delivered/Wrong Item Delivered</option>
						<option value="Other">Other</option>
</select>

                       
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="comment">Comment :</label>
                        <input type="text" class="form-control" value="" placeholder="Comment" name="comment" autocomplete="off" required="required">
                    </div>
                    </div>
                    </div>


					
				<div style="display:none">
						<p class="row-in-form">
							<label for="first_name">first name<span>*</span></label>
							<input id="user_id" style="background:beige" type="hidden" name="user_id" value="{{$userdata['id']}}" readonly>

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
							<input id="Sign On ID" style="background:beige" type="text" name="Sign On ID" value="{{$userdata['sign_on']}}" placeholder="Sign On ID">
						</p>
						<p class="row-in-form">
							<label for="PCC">PCC<span>*</span></label>
							<input id="PCC" style="background:beige" type="text" name="PCC" value="{{$userdata['pcc']}}" placeholder="PCC">
						</p>
						

</div>
				
					
						
					
					
					
					
						<input type="submit" class="btn btn-submit primaray btn-primary pull-right" name="submit">
					
					</form>
				</div>
			
				
					
			<div class="">
						<h3 class="title-box" style="background-color: #4E5D53;display: inline-block;
    width: 100%;
    text-align: left;
   background-color: #4E5D53; 
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 700;
    color: #fefefe;
    line-height: 14px;
    padding: 13px 18px;
    margin: 0;">Ticket </h3><br><br>
							<a class="btn btn-submit primaray btn-primary pull-right" href="{{route('ticket_status')}}">All Ticket</a> 
						
						<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
	   <th scope="col">Ticket Number</th>
      <th scope="col">Need Assistance</th>
      <th scope="col">Comment</th>
      <th scope="col">Ticket date</th>
      <th scope="col">Status</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>

  @php
        $sno = 1;
    @endphp
                          
@foreach ($ticketlist as $item)

    <tr>
      <th scope="row"><a href="{{ route('ticket_detail',$item->id)}}">{{ $sno++ }}</a></th>
	    <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->ticket_number ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->need_assistance ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->comment ?? '' }}</a></td>
      <td><a href="{{ route('ticket_detail',$item->id)}}">{{ $item->ticket_date ?? '' }}</a></td>
      <td>
      @if ($item->status == 0)
                                    
                                    <span class="badge badge-pill badge-danger" style="background-color: red;">
									Open</span>
                               
                                    @elseif($item->status == 1)
                               
                                    <span class="badge badge-pill badge-success" style="background-color: #f59524;">
									WIP</span>     
                                    
                                    @else

                                    <span class="badge badge-pill badge-success" style="background-color: green;">
									Closed</span>  
                               
                                @endif   
      
      
     </td>
      <td><a href="{{ route('ticket_detail',$item->id)}}"><i class="fa fa-eye"></i></a></td>
    </tr>
  
    @endforeach
  </tbody>
</table>
					
				

				

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->



<?php } ?>
	
	<script>
    $(document).ready(function(){
  
 

      $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});



    })
</script>
@endsection
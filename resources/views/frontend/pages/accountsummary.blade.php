@extends('frontend.master')
@section('indexhome')
<?php if(session()->get('language') == 'fr') { ?>
<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">domicile</a></li>
					<li class="item-link"><span>Relevé de compte</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
		
            
            <div class="card-header">

<form action="{{ route('getaccountsummary') }}" method="POST" enctype="multipart/form-data">
      @csrf       
        <div class="col-12">

<div class="card-body">
<div class="form-row">
<div class="form-group col-md-6">
<label for="From Date">Partir de la date</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="From Date" autocomplete=off>
</div>
</div>
<div class="form-group col-md-6">
<label for="To Date">À ce jour</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input  type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="To Date" autocomplete=off>
</div>
</div>

</div>

</div>
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

  <script>
    $('.datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        endDate: "today",
    });
    $('.datepicker').datepicker("setDate", new Date());
</script>


<button type="submit" class="btn btn-primary float-right pull-right" id="get_data">Obtenir le résumé</button>

</form>

</div>
				
			

	</main>
	<!--main area-->
	
<?php }else{?>

<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{route('frontend')}}" class="link">Home</a></li>
					<li class="item-link"><span>Account Summary</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
		
            
            <div class="card-header">

<form action="{{ route('getaccountsummary') }}" method="POST" enctype="multipart/form-data">
      @csrf       
        <div class="col-12">

<div class="card-body">
<div class="form-row">
<div class="form-group col-md-6">
<label for="From Date">From Date</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="From Date" autocomplete=off>
</div>
</div>
<div class="form-group col-md-6">
<label for="To Date">To Date</label>
<div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
<input  type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="To Date" autocomplete=off>
</div>
</div>

</div>

</div>
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

  <script>
    $('.datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        endDate: "today",
    });
    $('.datepicker').datepicker("setDate", new Date());
</script>


<button type="submit" class="btn btn-primary float-right pull-right" id="get_data">Get Summary</button>

</form>

</div>
					

	</main>
	<!--main area-->


<?php } ?>
	
@endsection
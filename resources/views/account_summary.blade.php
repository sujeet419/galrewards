@extends('admin.admin_master')
@section('admin')



<div class="content">
<div class="breadcrumb-wrapper">
<h1> User Account Summary</h1>
    
<nav aria-label="breadcrumb">
<ol class="breadcrumb p-0">
<li class="breadcrumb-item">
<a href="{{ route('dashboard')}}">
<span class="mdi mdi-home"></span>                
</a>
</li>
<li class="breadcrumb-item">
components
</li>
<li class="breadcrumb-item" aria-current="page">View Account Summary</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            <div class="row justify-content-between">
            <div class="col-11">
                <h2>
                </h2>
            </div>
            <div class="col-1">
            </div>
            </div>
            </div>
            <div class="card-body">
			
			<form action="{{ route('getaccount_summary') }}" method="POST" name="RegForm" onsubmit="return checkformvalidation()" enctype="multipart/form-data">
          @csrf  
                <div class="content">
                    
					<div class="row">
                    <div class="col-md-4">       
                <div class="form-group">
                    <label for="exampleInputPassword1">From Date :</label>
					
					<input type="date" name="from_date" class="form-control datepicker" id="from_date" placeholder="From Date" autocomplete=off>
                   
                </div>
                    </div>
					
					    <div class="col-md-4">       
                <div class="form-group">
                    <label for="exampleInputPassword1">TO Date :</label>
					
				<input  type="date" name="to_date" class="form-control datepicker" id="to_date" max="<?php echo date("Y-m-d"); ?>" placeholder="To Date" autocomplete=off>
                   
                </div>
                    </div>
					
                    
                    <div class="col-md-4"> 
                   <div class="form-group">
                    <label for="exampleFormControlSelect1">Select UserID</label>
                    <select class="form-control" name="guserid" id="guserid">
                        <option value="">Select UserID</option>
                        @foreach($email as $item)
                    <option value="{{$item->guserid}}">{{$item->guserid}}</option>
            @endforeach
                    </select>
                </div>
                    </div>
                  
                    </div>
					
			
					
           
                <div class="row">
                <div class="col-md-12"> 



<button type="submit" class="btn btn-primary float-right pull-right" id="get_data">Get Summary</button>		 
				 
				 
				 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
						
</div>


 <script>
            function checkformvalidation() {
                var from_date = 
                    document.forms["RegForm"]["from_date"];
              
                var to_date = 
                    document.forms["RegForm"]["to_date"];
					
					
				var guserid = 
                    document.forms["RegForm"]["guserid"];	
  
               
			   if (from_date.value == "") {
                    window.alert("Please enter from date.");
                    from_date.focus();
                    return false;
                }
  
                if (to_date.value == "") {
                    window.alert("Please enter to date.");
                    to_date.focus();
                    return false;
                }
  
             if (guserid.value == "") {
                    window.alert("Please enter userid.");
                    guserid.focus();
                    return false;
                }
  
            
  
                return true;
            }
        </script>

@endsection
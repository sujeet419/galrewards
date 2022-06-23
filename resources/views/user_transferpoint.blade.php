@extends('admin.admin_master')
@section('admin')
@php


@endphp
<div class="content">							<div class="breadcrumb-wrapper">
    <h1> User Point Transfer</h1>
    
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
<li class="breadcrumb-item" aria-current="page">User Point Transfer</li>
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
                <div class="content">
				
					<form action="{{route('userpointtransfer')}}" method="post" name="RegForm" onsubmit="return checkformvalidation()">
                        @csrf	
					
				
				
                   
                    <div class="row">
                    <div class="col-md-4">       
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Transfer Type</label>
                    <select class="form-control" name="transfer_type" id="transfer_type">
                        <option selected="" disabled="" >Select Any</option>
                       
                    <option value="1">Point Cash On</option>
					 <option value="2">Point Transfer</option>
     
                    </select>
                </div>
                    </div>
                    
                    <div class="col-md-4" > 
                <div class="form-group">
                    <label for="exampleFormControlSelect1">From User ID</label>
                    <select class="form-control" name="from_user" id="from_user">
                        <option selected="" disabled="" >Select User-ID</option>
                        @foreach($guserid as $item)
                    <option value="{{$item->guserid}}">{{$item->guserid}}</option>
            @endforeach
                    </select>
                </div>
                    </div>
					
					
					
					      <div class="col-md-4 userdetail" id="userto"> 
                <div class="form-group">
                    <label for="exampleFormControlSelect1">To User ID</label>
                    <select class="form-control" name="touser" id="touser">
                        <option selected="" disabled="" >Select User-ID</option>
                        @foreach($guseridall as $item)
                    <option value="{{$item->guserid}}">{{$item->guserid}}</option>
            @endforeach
                    </select>
                </div>
                    </div>
					
                   
                       
                    </div>
				
                	
				<div class="row">
				
				<span> <b>From User Details</b></span>
				</br>
				
                <div class="col-md-4"> 
                <div class="form-group">
                    <label for="point_added">Total Points :</label>
                    <input type="text" class="form-control"  id="point_added1" name="point_added1" readonly>
                </div>
                </div>
				
				<div class="col-md-4"> 
                <div class="form-group">
                    <label for="user_email">User Email:</label>
                    <input type="text" class="form-control"  id="user_email1" name="user_email1" readonly>
                </div>
                </div>
				
				<div class="col-md-4"> 
                <div class="form-group">
                    <label for="user_country">User Country :</label>
                    <input type="text" class="form-control"  id="user_country1" name="user_country1" readonly>
                </div>
                </div>
				

                </div>
				
			
				      <div class="row userdetail" >
					  
						<span><b>To User Details </b></span>
				</br>  
					  
                <div class="col-md-4"> 
                <div class="form-group">
                    <label for="point_added">Total Points :</label>
                    <input type="text" class="form-control"  id="point_added2" name="point_added2" readonly>
                </div>
                </div>
				
				<div class="col-md-4"> 
                <div class="form-group">
                    <label for="user_email">User Email:</label>
                    <input type="text" class="form-control"  id="user_email2" name="user_email2" readonly>
                </div>
                </div>
				
				<div class="col-md-4"> 
                <div class="form-group">
                    <label for="user_country">User Country :</label>
                    <input type="text" class="form-control"  id="user_country2" name="user_country2" readonly>
                </div>
                </div>
				

                </div>
				
				
				
				
                <div class="row">
                <div class="col-md-12"> 
                   <div class="form-group">
                    <label for="update_reason">Transfer Reason :</label>
                    <textarea type="text" class="form-control" id="update_reason" name="update_reason"  ></textarea>
					
					@if ($errors->has('update_reason'))
                    <span class="text-danger">{{ $errors->first('update_reason') }}</span>
                @endif
                </div>
                </div>
                </div>
				
				
			 <div class="form-group" style="float: right">
                            <button type="submit" class="btn btn-primary " id="" style="width: 150px" >Transfer Point</button>
                        </div>	
				
				
				</form>
				
            </div>
        </div>
    </div>
</div>
						
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script type="text/javascript">
$.ajaxSetup({ 
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
	$('.userdetail').hide();
	$('#transfer_type').on('change', function(){
            var id = $(this).val();
			if(id == 2){
				
				$('.userdetail').show();	
			}else{
				
			$('.userdetail').hide();	
			}

    
    });
});
</script>




 <script>
            function checkformvalidation() {
                var transfer_type = 
                    document.forms["RegForm"]["transfer_type"];
              
                var update_reason = 
                    document.forms["RegForm"]["update_reason"];
  
               
			   if (transfer_type.value == "") {
                    window.alert("Please enter update point.");
                    update_point.focus();
                    return false;
                }
  
                if (update_reason.value == "") {
                    window.alert("Please enter update reason.");
                    update_reason.focus();
                    return false;
                }
  
            
  
            
  
                return true;
            }
        </script>



<script type="text/javascript">

    $(document).ready(function() {
      $(document).on('change', '#from_user', function(e){
        e.preventDefault();
          var guserid = $('#from_user').val();
           
          var point_added = $('#point_added1').val('0');
		  var user_email = $('#user_email1').val('0');
		  var user_country = $('#user_country1').val('0');
       
          point_added1='';
          user_email1='';
		  user_country1='';
		  
          if(guserid) {
           
		   $.ajax({
		  url: "{{ url('./getpointfromuser/ajax') }}"+"/"+guserid,
                  type:"get",
                  dataType:"json",
                
                  success:function(data) {
					  console.log(data);

                    if(data){
         
                    var a2 = data.email;
					var a3 = data.country;
					var a4 = data.closing_bal;
				
                    $('#user_email1').val(a2.length > 0 ? data.email : '0');	
					$('#user_country1').val(a3.length > 0 ? data.country : '0');	
					$('#point_added1').val(a4);	
                    					
					}else{
                  
					$('#point_added1').val(0);
					$('#user_email1').val(0);
					$('#user_country1').val(0);
                     
                    }
                        
					
				},
                
              });
          } else {
              alert('Both field required');
          }
      });

});
  </script>
  
  
  <script type="text/javascript">

    $(document).ready(function() {
      $(document).on('change', '#touser', function(e){
        e.preventDefault();
          var guserid = $('#touser').val();
           
          var point_added = $('#point_added2').val('0');
		  var user_email = $('#user_email2').val('0');
		  var user_country = $('#user_country2').val('0');
       
          point_added2='';
          user_email2='';
		  user_country2='';
		  
          if(guserid) {
           
		   $.ajax({
		  url: "{{ url('./getpointfromuser/ajax') }}"+"/"+guserid,
                  type:"get",
                  dataType:"json",
                
                  success:function(data) {
					  console.log(data);

                    if(data){
         
                    var a2 = data.email;
					var a3 = data.country;
					var a4 = data.closing_bal;
				
                    $('#user_email2').val(a2.length > 0 ? data.email : '0');	
					$('#user_country2').val(a3.length > 0 ? data.country : '0');	
					$('#point_added2').val(a4);	
                    					
					}else{
                  
					$('#point_added2').val(0);
					$('#user_email2').val(0);
					$('#user_country2').val(0);
                     
                    }
                        
					
				},
                
              });
          } else {
              alert('Both field required');
          }
      });

});
  </script>
  
  
  
  
  
  
  
  
  
  
@endsection
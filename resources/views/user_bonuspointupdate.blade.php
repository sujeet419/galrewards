@extends('admin.admin_master')
@section('admin')
@php


@endphp
<div class="content">							<div class="breadcrumb-wrapper">
    <h1> User Bonus Point Update</h1>
    
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
<li class="breadcrumb-item" aria-current="page">User Bonus Point</li>
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
                    {{-- <form action="{{route('view.user.point')}}" method="post" id="show_point_form"> --}}
                        @csrf
                    <div class="row">
                    <div class="col-md-3">       
                <div class="form-group">
                    <label for="exampleInputPassword1">Date :</label>
                    <input type="month" class="form-control" id="ac_date" name="ac_date" max="<?php echo date("Y-m"); ?>">
                </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Agency Group</label>
                            <select class="form-control" name="agency" id="agency">
                                <option selected="" disabled="" >Select Group</option>
                                @foreach($agency as $item)
                            <option value="{{$item->agency_name}}">{{$item->agency_name}}</option>
                    @endforeach
                            </select>
                        </div>
                            </div>
                    <div class="col-md-3"> 
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select User ID</label>
                    <select class="form-control" name="email" id="email_id">
                    <option value="select User ID" selected disabled>Select User ID</option>
                    </select>
                </div>
                    </div>
                    <div class="col-md-3">       
                        <div class="form-group" style="float: right">
                            <button type="button" class="btn btn-primary view_point_button" id="view_point_button" style="width: 150px" >Get Point</button>
                        </div>
                            </div>
                        {{-- </form> --}}
                    </div>
					
					
				<form action="{{route('userbonuspointupdate')}}" method="post">
                        @csrf	
					
					
				 <input type="hidden" class="form-control"  id="guserid" name="guserid" readonly>
                <input type="hidden" class="form-control"  id="closing_bal" name="closing_bal" readonly>					 
            
                <div class="row">
                <div class="col-md-3"> 
                <div class="form-group">
                    <label for="point_added">Bonus Points :</label>
                    <input type="text" class="form-control"  id="point_added" name="point_added" readonly>
                </div>
                </div>
				
				<div class="col-md-3"> 
                <div class="form-group">
                    <label for="user_email">User Email:</label>
                    <input type="text" class="form-control"  id="user_email" name="user_email" readonly>
                </div>
                </div>
				
				<div class="col-md-3"> 
                <div class="form-group">
                    <label for="user_country">User Country :</label>
                    <input type="text" class="form-control"  id="user_country" name="user_country" readonly>
                </div>
                </div>
				
                <div class="col-md-3"> 
                <div class="form-group">
                    <label for="update_point">Update Bonus Point :</label>
                    <input type="number" class="form-control" id="update_point" name="update_point" required>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12"> 
                   <div class="form-group">
                    <label for="update_reason">Update Reason :</label>
                    <textarea type="text" class="form-control" id="update_reason" name="update_reason" required></textarea>
                </div>
                </div>
                </div>
				
				
			 <div class="form-group" style="float: right">
                            <button type="submit" class="btn btn-primary " id="" style="width: 150px" >Update Point</button>
                        </div>	
				
				
				</form>
				
            </div>
        </div>
    </div>
</div>
						
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
      $(document).on('click', '.view_point_button', function(e){
        e.preventDefault();
          var guserid = $('#email_id').val();
          var ac_date = $('#ac_date').val();
        
          var point_added = $('#point_added').val('0');
		  var user_email = $('#user_email').val('0');
		  var user_country = $('#user_country').val('0');
       
          point_added='';
          user_email='';
		 user_country='';
		 
		 	 if (ac_date == "") {
                    window.alert("Please Enter Date.");
                    ac_date.focus();
                    return false;
                }
		  
          if(guserid) {
           
		   $.ajax({
		  url: "{{ url('./userbonuspoint/ajax') }}"+"/"+guserid+"/"+ac_date,
                  type:"get",
                  dataType:"json",
                
                  success:function(data) {
					  console.log(data);

                    if(data){
         
					
					var a1 = data.points;
                    var a2 = data.email;
					var a3 = data.country;
					var a4 = data.closing_bal;
					
				
					
			      $('#guserid').val(a1.length > 0 ? data.points[0].guserid : '0');	
				  $('#closing_bal').val(a4.length > 0 ? data.closing_bal[0].closing_bal : '0');	
					$('#point_added').val(a1.length > 0 ? data.points[0].bonus_point : '0');	
                    $('#user_email').val(a2.length > 0 ? data.email : '0');	
					$('#user_country').val(a3.length > 0 ? data.country : '0');	
                    					
					}else{
                  
					$('#point_added').val(0);
					$('#user_email').val(0);
					$('#user_country').val(0);
                     
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
      $('select[name="agency"]').on('change', function(){
          var agency = $(this).val();
          if(agency) {
              $.ajax({
                  url: "{{  url('/agency/ajax') }}/"+agency,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {

                    console.log(data);
                    $('select[name="email"]').html('');
                     var d =$('select[name="email"]').empty();
                     //$('select[name="email"]').append('<option value="select">Select User ID</option>');
                        $.each(data, function(key, value){
                            $('select[name="email"]').append('<option value="'+ value.guserid +'">' + value.guserid + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

});
  </script>
@endsection
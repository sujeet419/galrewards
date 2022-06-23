@extends('admin.admin_master')
@section('admin')
@php
// use Carbon\Carbon;
//     $points = DB::table('points')
//     ->leftJoin('registers', 'registers.email', '=', 'points.email')
//     ->leftJoin('product_histories', 'product_histories.email', '=', 'points.email')
//     ->leftJoin('bonus_points', 'bonus_points.user_email', '=', 'points.email')
//     ->where('points.email', 'ewurasidjan@yahoo.com')
//     ->select('points.points as point','product_histories.points','bonus_points.bonus_point','registers.closing_bal','registers.points as opening_bal')
//     ->get();

//      dd($points);


//$value = Session::get('userpoint');

//$value[0]="";
//if(sizeof($value) == 0){

   // Session::forget($value[0]);
//echo $valueaa= $value[0]->points;
// echo 'not found';

// }else{
//     echo $point= $value[0]->point;
//     echo $points= $value[0]->points;
//     echo $bonus_point= $value[0]->bonus_point;
//     echo $closing_bal= $value[0]->closing_bal;
   // echo $opening_bal= $value[0]->opening_bal;
    
    //$value->Session()->forget('closing_bal');
//}


@endphp
<div class="content">							<div class="breadcrumb-wrapper">
    <h1> view User Account Balance</h1>
    
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
<li class="breadcrumb-item" aria-current="page">View Balance</li>
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
                    <a href="{{ route('view.acbalance')}}"><button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" style="float: right;">
                        Back </button></a>
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
                    <div class="col-md-4">       
                <div class="form-group">
                    <label for="exampleInputPassword1">Date :</label>
                    <input type="month" class="form-control" id="ac_date" name="ac_date" max="<?php echo date("Y-m"); ?>">
                </div>
                    </div>
                    
                    <div class="col-md-4"> 
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select User Email-ID</label>
                    <select class="form-control" name="email" id="email_id">
                        <option selected="" disabled="" >Select Email-ID</option>
                        @foreach($email as $item)
                    <option value="{{$item->email}}">{{$item->email}}</option>
            @endforeach
                    </select>
                </div>
                    </div>
                    <div class="col-md-4">       
                        <div class="form-group" style="float: right">
                            <button type="button" class="btn btn-primary view_point_button" id="view_point_button" style="width: 150px" >View</button>
                        </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                    <div class="row">
                    <div class="col-md-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Opening Balance :</label>
                    <input type="test" class="form-control" id="txt_first" name="point_earned" readonly>
                </div>
                </div>
                <div class="col-md-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Points Used For Products Order :</label>
                    <input type="test" class="form-control"  id="txt_sec" name="point_used" readonly>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Monthly Points Added  :</label>
                    <input type="test" class="form-control"  id="addpoint" name="point_added" readonly>
                </div>
                </div>
                <div class="col-md-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Bonus Earned :</label>
                    <input type="test" class="form-control" id="bonus" name="bonus_earned" readonly>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">closing Balance :</label>
                    <input type="text" class="form-control" id="close_bal" name="closing_balance" readonly>
                </div>
                </div>
                </div>
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
          var email = $('#email_id').val();
          var ac_date = $('#ac_date').val();
          var txt_first = $('#txt_first').val();
          var txt_sec = $('#txt_sec').val();
          var addpoint = $('#addpoint').val();
          var bonus = $('#bonus').val();

          txt_first='';
          addpoint='';
          bonus='';
          txt_sec='';
          if(email) {
           

              $.ajax({
		  url: "{{ url('./point/ajax') }}"+"/"+email+"/"+ac_date,
                  type:"get",
                  dataType:"json",
                  //data: 'email='+email+'&ac_date='+ac_date,
                  success:function(data) {

                    if(data.points){
                    //console.log(data.points[0].point);
                    $('#txt_first').val(data.points[0].opening_bal ?? '0');
                        //$('#txt_first').val() != null ? '0' : $('#txt_first').val(data.points);
					$('#txt_sec').val(data.points[0].points ?? '0');
                        //$('#txt_sec').val() != '' ? '0' : $('#txt_sec').val(data.achistory_point.points);
					$('#addpoint').val(data.points[0].point ?? '0');
                        //$('#addpoint').val() != '' ? '0' : $('#addpoint').val(data.points_added.points);
                    $('#bonus').val(data.points[0].bonus_point ?? '0');
                    $('#close_bal').val(data.points[0].closing_bal ?? '0');
                    }else{
                    $('#txt_first').val(0);
                        //$('#txt_first').val() != null ? '0' : $('#txt_first').val(data.points);
					$('#txt_sec').val(0);
                        //$('#txt_sec').val() != '' ? '0' : $('#txt_sec').val(data.achistory_point.points);
					$('#addpoint').val(0);
                        //$('#addpoint').val() != '' ? '0' : $('#addpoint').val(data.points_added.points);
                    $('#bonus').val(0);
                    $('#close_bal').val(0);
                    }
                        //$('#bonus').val() != '' ? '0' : $('#bonus').val(data.b_point.bonus_point);
                        //console.log(data.b_point)
                      //console.log(data);
						
                        // if(txt_first !== null && txt_first !== undefined) {
                        //     $('#txt_first').val(data.points);
                        // }
                        // else{
                        //     $('#txt_first').val('0');
                        // }

                        // if(txt_sec !== null && txt_sec !== undefined) {
                        //     $('#txt_sec').val(data.achistory_point.points);
                           
                        // }
                        // else{
                        //     $('#txt_sec').val('0');
                        // }

                        // if(addpoint !== null && addpoint !== undefined) {
                        //     $('#addpoint').val(data.points_added.points);
                        // }
                        // else{
                        //     $('#addpoint').val('0');
                        // }

                        // if(bonus !== null && bonus !== undefined) {
                        //     $('#bonus').val(data.b_point.bonus_point);
                        // }
                        // else{
                        //     $('#bonus').val('0');
                        // }
                        //$result = JSON.parse(data);
                        //console.log(data);


                        // if(txt_first.length != 0) {
                        //     $('#txt_first').val('0');
                            
                        // }
                        // else{
                            
                        //     $('#txt_first').val(data.registrartion);
                        // }

                        // if(txt_sec.length != 0) {
                        //     $('#txt_sec').val('0');                           
                           
                        // }
                        // else{
                        //     $('#txt_sec').val(data.prhistory);
                        // }

                        // if(addpoint.length != 0) {
                        //     $('#addpoint').val('0');
                        // }
                        // else{
                        //     $('#addpoint').val(data.point);
                        // }

                        // if(bonus.length != 0) {
                        //     $('#bonus').val('0'); 
                            
                        //     alert("if");
                        // }
                        // else{
                        //     alert("else");
                        //     $('#bonus').val(data.bonuspoint);
                        // }

                        
						//$('#txt_first').val(data.points);
                        //$('#txt_first').val() != null ? '0' : $('#txt_first').val(data.points);
						//$('#txt_sec').val(data.achistory_point.points);
                        //$('#txt_sec').val() != '' ? '0' : $('#txt_sec').val(data.achistory_point.points);
						//$('#addpoint').val(data.points_added.points);
                        //$('#addpoint').val() != '' ? '0' : $('#addpoint').val(data.points_added.points);
                        //$('#bonus').val(data.b_point.bonus_point);
                        //$('#bonus').val() != '' ? '0' : $('#bonus').val(data.b_point.bonus_point);
                        //console.log(data.b_point)
						//$('#close_bal').val(padata.registrartion-data.prhistory+data.point+data.bonuspoint);
				},
                
              });
          } else {
              alert('Both field required');
          }
      });

});
  </script>
@endsection
@extends('admin.admin_master')
@section('admin')
@php
//$status = "SELECT points.status AS status FROM `points` WHERE month(created_at) = month(now()) AND year(created_at) = year(now())";
//$pointstatus = DB::select($status); 
//$statusvalue = $pointstatus[0]->status;

// $year = DB::table('points')
// ->select('points.year')
// ->get();
//$years = $year[0]->year;


// $month = "SELECT DATE_FORMAT(`created_at`, '%M') AS NAME from points";
// $months = DB::select($month);
//$get_months = $months[0]->NAME;

//  $getmonthdata = DB::table('points')
//  ->whereYear('created_at', $years)
//  ->where('points.months', $get_months)
//  ->get('points.status');

//$get_status = $getmonthdata[0]->status;

//dd($get_status);
@endphp



<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Points</h1>
    <a href="{{asset('upload/sample_excel/monthlypoints.csv')}}" style="float: right;">
      <h4><span class="badge badge-dark"> Download Sample CSV</span></h4>
       </a> 
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
<li class="breadcrumb-item" aria-current="page">Points</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <div class="row justify-content-between">
				
				<div class="col-md-4">    
    <div class="form-group float-right"> 
        <form method="POST" enctype="multipart/form-data" action="{{ route('excel.pointstore')}}" id="excelupdate" style="display: -webkit-inline-box;">
            @csrf
            <input type="file" name="file" class="form-control">&nbsp;
          
        <button type="submit" class="ladda-button btn btn-primary btn-square btn-ladda" id="upload"> <i class="glyphicon glyphicon-plus-sign"></i> Upload File
          <span class="ladda-label"></span> 
          <span class="ladda-spinner"></span>
        </button>
        </form>
		   <br>
        @error('file')
        <b><span class="text-danger">{{$message}}</span></b>
    @enderror
    </div>  
</div> 

		<div class="col-md-3"> 

	<a href="{{ route('points.clear.data')}}" id="clear"><button type="button" class="btn btn-danger form-control">Clear Data</button></a>
		   
		</div>


                   

<div class="col-md-1">

<button type="submit" class="ladda-button btn btn-success btn-square btn-ladda" form="pointupdate" id="delete" data-style="contract-overlay" style="width: 150px;">Points Update
<span class="ladda-label"></span> 
<span class="ladda-spinner"></span></button>


</div> 

                    


                </div>
                    </div>
            </div>
			
					
            <div class="card-body">
			
			
			 <div class="category-filter">
		 <div class="col-md-4">
<label>Country Filter</label>		 
      <select id="categoryFilter" class="form-control">
        <option value="">Show All</option>
        @foreach($country as $item)
        <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>
			@endforeach
      </select>
	  </div>
    </div></br>
                <form method="POST" action="{{ route('points.plus')}}" id="pointupdate">
                    @csrf
                <table  id="filterTable" class="table table-striped table-bordered" style="width:100%">
                    
					
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Country</th>
                            <th>Sign On</th>
                            <th>PCC</th>
                            <th>Points</th>
                             {{-- <th>Closing Balance</th> 
                             <th>Total</th> --}}
                            <th>Userid</th>
                            <th>Date</th>
                        </tr>
                    </thead>

    

                    <tbody>
                            @php
                                $sno = 1;
                               // dd($total); 
                               $id = 1;
                            @endphp
                          
						  @if(isset($points))
						  
                        @foreach ($points as $item)
                       
                        <tr>
                
                            <td>{{ $sno++ }}</td>
							<td>{{ $item->country_name ?? '' }}</td>
                            <td>{{ $item->sign_on ?? '' }}</td>
                            <td>{{ $item->pcc ?? '' }}</td>
                            <td>{{ $item->points ?? '' }}</td>
                             {{-- <td>{{ $item->closing_bal ?? '' }}</td>  --}}
                            @php
                            $total =  $item->points  +  $item->closing_bal ;
                            @endphp
                            {{-- <td>{{$total}}  --}}
                            <input type="hidden" name={{ "points[". $item->guserid ."][closing_bal]" }} value="{{ $total }}">
                             {{-- </td>  --}}
                            <td>
                            {{ $item->guserid ?? '' }}
                            <input type="hidden" name={{ "points[".  $item->guserid ."][guserid]" }} value="{{ $item->guserid }}">
                            </td>
                            <td>{{ $item->point_date ?? '' }}
                            <input type="hidden" name={{ "points[".  $item->guserid ."][month_year]" }} value="{{ $item->point_date }}">
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                     @else
						 
					 @endif
                </table>
            </form>
                {{-- <input type="text" name={{ $test }} value="{{ $points }}"> --}}

            
            </div>
        </div>
    </div>
</div>
						
</div>
<div id="loader"></div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function() {
   var table =  $('#filterTable').DataTable();
    
     $('#categoryFilter').on('change', function () {
                    table.columns(1).search( this.value ).draw();
                } );
                
});



</script>






<script type="text/javascript">
$(function(){
	var spinner = $('#loader')
$(document).on('click','#delete',function(e){
e.preventDefault();
//var link = $(this).parents('form');

Swal.fire({
  title: 'Are you sure?',
  text: " You Want To Update Points!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Update it!'
}).then((result) => {
  if (result.isConfirmed) {
	   spinner.show();
    $("#pointupdate").submit();
    // Swal.fire(
      // 'Update!',
      // 'points has been Updated.',
      // 'success'
    // )
  }
})
});
});
</script>
{{-- ----------------------------------------------clear Data ------------------------------------------ --}}
<script type="text/javascript">
	var spinner = $('#loader')
    $(function(){
    $(document).on('click','#clear',function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    
    Swal.fire({
      title: 'Are you sure?',
      text: "You Want To Clear Points!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Clear it!'
    }).then((result) => {
      if (result.isConfirmed) {
		  spinner.show();
        window.location.href = link;
        // Swal.fire(
          // 'Update!',
          // ' Data has been Cleared.',
          // 'success'
        // )
      }
    })
    });
    });
    </script>

{{-- ----------------------------------------------Upload File ------------------------------------------ --}}
<script type="text/javascript">
	var spinner = $('#loader')
    $(function(){
    $(document).on('click','#upload',function(e){
    e.preventDefault();
    //var link = $(this).parents("href");
   
    Swal.fire({
      title: 'Are you sure?',
      text: " You Want To Upload Points CSV!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Upload it!'
    }).then((result) => {
      if (result.isConfirmed) {
		   spinner.show();
        $("#excelupdate").submit();
        //Swal.fire(
          //'Update!',
          //'Your file has been Uploaded.',
          //'success'
        //)
      }
    })
    });
    });
    </script>

{{-- <script>
  var spinner = $('#upload');
  $(function() {
    $('#test').on('click', function(e) {
      e.preventDefault();
      spinner.show();
    });
  });
  </script> --}}

@endsection
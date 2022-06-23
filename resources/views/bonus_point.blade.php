@extends('admin.admin_master')
@section('admin')

<div class="content">
<div class="breadcrumb-wrapper">
    <h1>User Bonus Point</h1>
<a href="{{asset('upload/sample_excel/bonuspoints.csv')}}" style="float: right;">
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
<li class="breadcrumb-item" aria-current="page">User Bonus-Point</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <div class="row justify-content-between">
				

				<div class="col-md-1"> 

				<button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm">
							Add Bonus Point <i class="mdi mdi-library-plus"></i></button>

				</div>
				
				
				<div class="col-md-3">    
					<div class="form-group float-right"> 
						<form method="POST" enctype="multipart/form-data" action="{{ route('bonusexcel.store')}}" id="uploadexcelform" style="display: -webkit-inline-box;">
							@csrf
							<input type="file" name="file" class="form-control">&nbsp;

						<button type="submit" class="btn btn-primary button1" id="upload_file" > <i class="glyphicon glyphicon-plus-sign"></i> Upload File</button>
						</form>
						  <br>
                        @error('file')
							<b><span class="text-danger">{{$message}}</span></b>
						@enderror
					</div>  
				</div>
				
				<div class="col-md-2"> 

						<a href="{{ route('bonuspoint.clear.data')}}" id="clear"><button type="button" class="btn btn-danger form-control">Clear Data</button></a>
                           
				</div> 

    
				<div class="col-md-2">

					<button type="submit" class="btn btn-success form-control update-all" form="pointupdate" >Points Update</button>


				</div> 

                    


                </div>
                    </div>
            </div>  
            <div class="card-body">
            @php
                $id =  1;
            @endphp
			
			
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
			
			
			
            <form method="POST" id="pointupdate" class="update_bonus_point">
                @csrf  
                    <table id="filterTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" onClick="" id="check_all" /></th>
                            <th>S.No.</th>
                            <th>Country</th>
                            <th>user id</th>
                            <th>Bonus Point</th>
                            {{-- <th>Closing Balance</th>
                            <th>Total</th> --}}
                            <th>Bonus Reason</th>
                            <th>Date</th>
                            <th>Source</th> 
                            {{-- <th>Status</th>
                            <th>Options</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                                $id = 1;
                            @endphp
                          
                        @foreach ($bouns as $item)
                        @php
                            $total = $item->bonus_point + $item->closing_bal;
                        @endphp
                        <tr>
                        <td>
                        @if ($item->update_status == 0)
                        <input type="checkbox" name="checkbox[]" class="checkbox" id="chk_{{ $id++ }}" value="{{$item->guserid}}__{{ $total }}__{{$item->bonus_point}}__{{$item->bonus_reason}}">   
                        @endif
                        
                        </td>
                            <td>{{ $sno++ }}</td>
                             <td>{{ $item->country_name ?? ''}}</td>
                            <td>{{ $item->guserid ?? '' }} </td>
                            <td>{{ $item->bonus_point ?? '' }}</td>
                            {{-- <td>{{ $item->closing_bal ?? '' }}</td> --}}
                            
                             {{-- <td>{{$total}} --}}
                                
                                <input type="hidden" name="points[]" id="point_{{ $id++ }}" value="{{ $total }}" class="closing_bal">
                            {{-- </td> --}}
                            <td>{{ $item->bonus_reason ?? '' }}</td>
                            <td>{{ $item->bonus_date ?? '' }}</td>
                            <td>
                                @if ($item->source == 0)
                                    <span>Manually</span>
                                @else
                                <span>Excel Upload</span>
                                @endif
                            </td>
                            {{-- <td>
                            @if ($item->bonus_status == 1)
                            <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>
                            @endif
                            </td>
                            <td>
                            @if ($item->bonus_status == 1)
                            <a href="" class="btn btn-danger" title="inactive now">
                            <i class="fa fa-arrow-down"></i></a>
                            @else
                            <a href="" class="btn btn-success" title="active now">
                            <i class="fa fa-arrow-up"></i></a>
                            @endif
                            </td> --}}
                        </tr>
                
                        @endforeach
                
                        </tbody>
                </table>
            </form>
            </div>
        
    </div>
    </div>

    </div>


{{-- add model --}}

<div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Add Bonus Points&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span class="text-danger">*</span> Fields Required)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form method="POST" action="{{ route('add.bonus') }}" name="submitform" id="submitform">
                    @csrf
					
					
					
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"><span class="text-danger">* &nbsp</span>Select UserID</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="user_email" required>
                            <option selected="" disabled="" >Select UserID</option>
                            @foreach($email as $item)
                        <option value="{{$item->guserid}}">{{$item->guserid}}</option>
                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Bonus Point :</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Bonus Points" name="bonus_point" required>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Point Reason :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Bonus Reason" name="bonus_reason" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>
<div id="loader"></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function() {
   var table =  $('#filterTable').DataTable();
    
     $('#categoryFilter').on('change', function () {
                    table.columns(2).search( this.value ).draw();
                } );
                
});



</script>



<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var spinner = $('#loader');
    $(document).ready(function () {
        $('#check_all').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".checkbox").prop('checked', true);  
         } else {  
            $(".checkbox").prop('checked',false);  
         }  
        });
         $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
         });
        $(document).on('submit', '.update_bonus_point', function(e) {
            e.preventDefault();
           
            var idsArr = [];
            var closing_bal = [];
             
            $(".checkbox:checked").each(function() {  
                idsArr.push($(this).val());
                // closing_bal.push($('.closing_bal').val()); 
            });  
            if(idsArr.length <=0)  
            {  
                alert("Please select atleast one record to Update.");  
            }  else {  
                if(confirm("Are you sure, you want to Update the selected records?")){  
                     spinner.show();
                    var strIds = idsArr.join(","); 
                    //var balance = closing_bal.join(",");
                    console.log(idsArr);
                    $.ajax({
                        url: "{{ route('bonuspoints.plus') }}",
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        // data: 'points='+balance,
                        success: function (data) {
                            //console.log(data.email);
                             if (data.status == 200) {
                                 $(".checkbox:checked").each(function() {  
                                 $(this).hide();
                                 });
								 spinner.hide();
                                 alert(data.bonus_point+' Bonus Points Successfully Added');
                             } else {
                                 alert('Whoops Something went wrong!!');
                             }
                        },
                        // error: function (data) {
                        //     alert(data.responseText);
                        // }
                    });
                }  
            }  
        });
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
var spinner = $('#loader')
    $(function(){
    $(document).on('click','#upload_file',function(e){
    e.preventDefault();
    //var link = $(this).parents("href");
    
    Swal.fire({
      title: 'Are you sure?',
      text: "You Want To Upload This File!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Upload it!'
    }).then((result) => {
      if (result.isConfirmed) {
		  spinner.show();
        $("#uploadexcelform").submit();
        //Swal.fire(
          //'Update!',
          //'Your File has been Uploaded.',
          //'success'
        //)
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

@endsection
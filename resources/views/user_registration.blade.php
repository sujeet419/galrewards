@extends('admin.admin_master')
@section('admin')

<div class="content">
<div class="breadcrumb-wrapper">
    <h1>User Registration</h1>
      <a href="{{asset('upload/sample_excel/userregistration.csv')}}" style="float: right;">
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
<li class="breadcrumb-item" aria-current="page">User Registration</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            <div class="row justify-content-between">
            <div class="col-2">
                <h2>
                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">
                      Add User <i class="mdi mdi-library-plus"></i></button>
                </h2>
            </div>
            <div class="col-1">
                <form method="POST" enctype="multipart/form-data" action="{{ route('excel.store')}}" style="display: -webkit-inline-box;" id="uploadexcelform">
                    @csrf
                    {{-- <label for="file">Choose CSV</label> --}}
                    <input type="file" name="file" class="form-control">&nbsp;&nbsp;                   
                <button type="submit" class="btn btn-primary button1" id="uploadfile"> <i class="glyphicon glyphicon-plus-sign"></i> Upload File</button>
                @error('file')
                    <br><b><span class="text-danger">{{$message}}</span></b>
                @enderror
				</form>
            </div>
            </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered table-responsive display" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            {{-- <th>Admin ID</th> --}}
                            <th>Name</th>
                            {{-- <th>Last Name</th> --}}
                            <th>Email</th>
                            <th>Country</th>
                            {{-- <th>Date Of Birth</th> --}}
                            <th>Contact</th>
                            <th>Closing Balance</th>
                            {{-- <th>Closing Balance</th> --}}
                            <th>PCC</th>
                            <th>Sign On</th>
							<th>End Date</th>
                            <th>Source</th> 
                            {{-- <th>Date</th> --}}
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                            @endphp
                          
                        @foreach ($reg as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            {{-- <td>{{ $item->admin_id ?? ''}}</td> --}}
                            <td>{{ $item->FullName ?? '' }}</td>
                            {{-- <td>{{ $item->last_name ?? '' }}</td> --}}
                            <td>{{ $item->email ?? '' }}</td>
                            <td>{{ $item->country_name ?? '' }}</td>
                            {{-- <td>{{ $item->date_of_birth	 ?? '' }}</td> --}}
                            <td>{{ $item->contact ?? '' }}</td>
                            <td>{{ $item->closing_bal ?? '' }}</td>
                            {{-- <td>{{ $item->closing_bal ?? '' }}</td> --}}
                            <td>{{ $item->pcc ?? '' }}</td>
                            <td>{{ $item->sign_on ?? '' }}</td>
								{{--<td>
                                @if ($item->status == 1)
                                    <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>
                                @endif
								</td> --}}
								<td> {{ $item->end_date ?? '' }} </td>
                            <td>
                                @if ($item->source == 0)
                                    <span>Excel Upload</span>
                                @else
                                <span>Manually</span>
                                @endif
                            </td>
                            {{-- <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y/m/d')}}</td> --}}
                            <td> <button class="btn btn-danger edituser" value="{{ $item->id }}" title="Edit User" data-toggle="modal" data-target="#exampleModalFormedit">
                                <i class="fa fa-pencil"></i></button></td>
                        </tr>
                
                        @endforeach
                
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
						
</div>

{{-- add model --}}

<div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Add User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span class="text-danger">*</span> Fields Required)</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form method="POST" action="{{ route('store.reg') }}" name="submitform" id="submitform">
                    @csrf
                    <div class="content">
                        <div class="row">
                        <div class="col-md-6">       
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>User First Name :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="First Name" name="first_name" required>
                    </div>
                        </div>
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>User Last Name :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Last Name" name="last_name" required>
                    </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>User Email :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email" required>
                    </div>
                    </div>
                   
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Country :</label>
                             <select class="form-control" id="exampleFormControlSelect1" name="country_name" required>
                                <option selected="" disabled="" >Select Country</option>
                                @foreach($con as $item)
                         <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>
								@endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>User Contact :</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Contact" name="contact" required>
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>User DOB :</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Date Of Birth" max="<?php echo date("Y-m-d"); ?>" name="date_of_birth" required>
                    </div>
                    </div>
                    </div>
                    <input type="hidden" class="form-control" id="exampleInputPassword1" placeholder="Points" name="points">
                    <div class="row">
					
					
					
					  <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="agency_group"><span class="text-danger">* &nbsp</span> Agency group :</label>
						
						  <select class="form-control" id="agency_group" name="agency_group" required>
                                <option selected="" disabled="" >Select Agency</option>
                                @foreach($pcc as $item)
                         <option value="{{$item->agency_name}}">{{$item->agency_name}}</option>
								@endforeach
                            </select>	
						
                        
                    </div>
                    </div>
					
                    <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>User PCC Number :</label>
                        
						
					      <select class="form-control" id="pcc" name="pcc" required>
                                <option selected="" disabled="" >Select PCC</option>
								
                               
                            </select>	
						
		
					
					</div>
                    </div>
                    <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>User Sign_On Number :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Sign_on Number" name="sign_on" required>
                    </div>
                    </div>
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="user_submit" >Submit</button>
        </form>
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>

{{-- edit model --}}

<div class="modal fade" id="exampleModalFormedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormedit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormedit">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form method="POST" action="{{ route('update.reg') }}" name="submitform" id="submitform">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="content">
                        <div class="row">
                        <div class="col-md-6">       
                    <div class="form-group">
                        <label for="exampleInputPassword1">User First Name :</label>
                        <input type="test" class="form-control" id="first_name" placeholder="First Name" name="first_name">
                    </div>
                        </div>
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Last Name :</label>
                        <input type="test" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
                    </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Email :</label>
                        <input type="test" class="form-control" id="email" placeholder="Email" name="email" readonly>
                    </div>
                    </div>
                    {{-- <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Password :</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    </div> --}}
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Country :</label>
							
							   <select class="form-control" id="country_name" name="country_name" required>
                                <option selected="" disabled="" >Select Country</option>
                                @foreach($con as $item)
                            <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>
								@endforeach
                            </select>
							
            
                        </div>
                        </div>
				
                    </div>
                    <div class="row">
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Contact :</label>
                        <input type="number" class="form-control" id="contact" placeholder="Contact" name="contact" >
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">User DOB :</label>
                        <input type="text" class="form-control" id="date_of_birth" placeholder="Date Of Birth" name="date_of_birth" readonly>
                    </div>
                    </div>
                    </div>
                    <input type="hidden" class="form-control" id="points" placeholder="Points" name="points">
                    <div class="row">
					
					   <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Agency group:</label>
                        <input type="text" class="form-control" id="agencygroup" placeholder="Agency group" name="agency_group" readonly>
                    </div>
                    </div>
					
					
                    <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">User PCC Number :</label>
                        <input type="test" class="form-control" id="pccnnn" placeholder="PCC Number" name="pcc" readonly>
                    </div>
                    </div>
                    <div class="col-md-4"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">User Sign_On Number :</label>
                        <input type="test" class="form-control" id="sign_on" placeholder="Sign_on Number" name="sign_on" readonly>
                    </div>
                    </div>
                    </div>
					<div class="row">
                    <div class="col-md-12"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">End Date :</label>
                        <input type="date" class="form-control" id="date" placeholder="End_date" name="end_date" min="<?php echo date("Y-m-d"); ?>">
                    </div>
                    </div>
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Update</button>
        </form>
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>
<div id="loader"></div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="agency_group"]').on('change', function(){
          var agency_name = $(this).val();
          if(agency_name) {
              $.ajax({
                  url: "{{  url('/getpcc/ajax') }}/"+agency_name,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
					  
                    $('select[name="pcc"]').html('');
                     var d =$('select[name="pcc"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="pcc"]').append('<option value="'+ value.pcc_number +'">' + value.pcc_number + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

});
  </script>


{{-- ----------------------------------------------Upload File ------------------------------------------ --}}


<script type="text/javascript">
var spinner = $('#loader')
    $(function(){
    $(document).on('click','#uploadfile',function(e){
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

<script type="text/javascript">
    $.ajaxSetup({ 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).ready(function () {
    $(document).on('click', '.edituser', function(e){
        e.preventDefault();
      var userid = $(this).val();
      //console.log(brandidname);
        $.ajax({
        type: "GET",
        url: "edit/user"+userid,
        dataType: "json",
        success: function (response) {
           // console.log(response);
          $("#user_id").val(userid);
          $("#first_name").val(response.user.first_name);
          $("#last_name").val(response.user.last_name);
          $("#email").val(response.user.email);
         // $("#password").val(response.user.password);
          $("#country_name").val(response.user.country_name);
          $("#date_of_birth").val(response.user.date_of_birth);
          $("#contact").val(response.user.contact);
          $("#points").val(response.user.points);
		  $("#agencygroup").val(response.user.agency_group);
          $("#pccnnn").val(response.user.pcc);
          $("#sign_on").val(response.user.sign_on);
		  $("#date").val(response.user.end_date);
        }
      });
      });
    });
    </script>
	
	// <script>
    // var spinner = $('#loader');
    // $(function() {
      // $('#user_submit').on('click', function(e) {
        // e.preventDefault();
        // spinner.show();
        // $.ajax({
          // url: 'reg/store',
          // data: $(this).serialize(),
          // method: 'post',
          // dataType: 'JSON'
        // }).done(function(resp) {
          // spinner.hide();
          // alert(resp.status);
        // });
      // });
    // });
    // </script>

@endsection
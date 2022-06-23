@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Manage Admin</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Add Admin</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">
                      Add Admin <i class="mdi mdi-library-plus"></i></button>
                </h2>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Admin Name</th>
                            <th>Admin Email</th>
							<th>End Date</th>
							<th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                            @endphp
                          
                        @foreach ($admin as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            
                            <td>{{ $item->name ?? '' }}</td>
                            <td>{{ $item->email ?? '' }}</td>
							<td>{{ $item->end_date ?? '' }}</td>
							<td>
							<button class="btn btn-danger editcategory" value="{{ $item->id }}" title="Edit Category" data-toggle="modal" data-target="#exampleModalFormedit">
                            <i class="fa fa-pencil"></i></button>
							</td>
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputPassword1">Admin Name :</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Admin Name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Email :</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Admin Email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password :</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password :</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirmation">
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

{{-- edit model --}}

<div class="modal fade" id="exampleModalFormedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormedit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update.admin') }}">
                    @csrf
					 <input type="hidden" name="id" id="cat_id"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Admin Name :</label>
                        <input type="text" class="form-control" id="name" placeholder="Admin Name" name="name" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Email :</label>
                        <input type="email" class="form-control" id="email" placeholder="Admin Email" name="email" readonly>
                    </div>
					
					 <div class="form-group">
                        <label for="exampleInputPassword1">End Date :</label>
                        <input type="date" value="" class="form-control" placeholder="End_date" name="end_date" min="<?php echo date("Y-m-d"); ?>">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({ 
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
$(document).on('click', '.editcategory', function(e){
    e.preventDefault();
  var brandidname = $(this).val();
  //console.log(brandidname);
    $.ajax({
    type: "GET",
    url: "{{ url('edit/admin') }}"+brandidname,
    dataType: "json",
    success: function (response) {
      $("#cat_id").val(brandidname);
      $("#name").val(response.picbrand.name);
      $("#email").val(response.picbrand.email);
    }
  });
  });
});
</script>
@endsection
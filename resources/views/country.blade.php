@extends('admin.admin_master')

@section('admin')



<div class="content">							<div class="breadcrumb-wrapper">

    <h1>Country</h1>

    

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

<li class="breadcrumb-item" aria-current="page">Country</li>

</ol>

</nav>



</div>



<div class="row">

    <div class="col-lg-12">

        <div class="card card-default">

            <div class="card-header card-header-border-bottom">

                <h2>

                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">

                      Add Country <i class="mdi mdi-library-plus"></i></button>

                </h2>

            </div>

            <div class="card-body">

                <table id="example" class="table table-striped table-bordered" style="width:100%">

                    <thead>

                        <tr>

                            <th>S.No.</th>

                            <th>Country Name English</th>

                            <th>Country Name French</th>

                            <th>Status</th>

                            <th style="width:15%;">Options</th>

                        </tr>

                    </thead>

                    <tbody>

                            @php

                                $sno = 1;

                $con = App\Models\country::latest()->get();  

                            @endphp

                          

                        @foreach ($con as $item)

                

                        <tr>

                

                            <td>{{ $sno++ }}</td>

                            

                            <td>{{ $item->country_name_en ?? '' }}</td>

                            <td>{{ $item->country_name_fr ?? '' }}</td>

                

                

                            <td>

                            @if ($item->country_status == 1)

                                <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>

                            @else

                            <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>

                            @endif

                

                            </td>

                            <td>

                            @if ($item->country_status == 1)

                            <a href="{{ route('con.inactive',$item->id) }}" class="btn btn-danger" title="inactive now">

                                <i class="fa fa-arrow-down"></i></a>

                        @else

                        <a href="{{ route('con.active',$item->id) }}" class="btn btn-success" title="active now">

                            <i class="fa fa-arrow-up"></i></a>

                        @endif

                        <button class="btn btn-danger editcountry" value="{{ $item->id }}" title="Edit Country" data-toggle="modal" data-target="#exampleModalFormedit">

                            <i class="fa fa-pencil"></i></button>

                            {{-- <a href="{{ route('con.delete',$item->id) }}" class="btn btn-danger" title="inactive now" data-toggle="modal" data-target="#exampleModalFormedit">

                            <i class="fa fa-trash"></i></a> --}}

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

                <h5 class="modal-title" id="exampleModalFormTitle">Add Country</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

        <form method="POST" action="{{ route('store.place') }}" name="submitform" id="submitform">

                    @csrf



                    <div class="form-group">

                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Country Name English :</label>

                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="country_name_en" required>

                    </div>



                    <div class="form-group">

                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Country Name French :</label>

                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="country_name_fr" required>

                    </div>

        

        <div class="form-group">

<label for="address_en"><span class="text-danger">* &nbsp</span>Address English :</label>

<input type="text" class="form-control" id="address_en1" placeholder="Address English" name="address_en" >

</div>

<div class="form-group">

<label for="address_fr"><span class="text-danger">* &nbsp</span>Address French :</label>

<input type="text" class="form-control" id="address_fr1" placeholder="Address French" name="address_fr" >

</div>
<div class="form-group">

<label for="contact_no"><span class="text-danger">* &nbsp</span>Contact Number :</label>

<input type="text" class="form-control" id="contact_no1" placeholder="Contact Number" name="contact_no" >

</div>
<div class="form-group">

<label for="email_address"><span class="text-danger">* &nbsp</span>Email Address :</label>

<input type="text" class="form-control" id="email_address1" placeholder="Email" name="email_address" >

</div>



            </div>

            <div class="modal-footer">

			<div class="modal-title" style="margin-left: 0; width: 294px;"><span class="text-danger">*</span> indicates mandatory fields</div>

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

                <h5 class="modal-title" id="exampleModalFormedit">Edit Country</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('update.country') }}" name="submitform" id="submit_edit_form">

                    @csrf

                    <input type="hidden" name="id" id="cat_id">  

                    <div class="form-group">

                        <label for="exampleInputPassword1">Country Name English :</label>

                        <input type="test" class="form-control" id="country_name_en" placeholder="Category Name" name="country_name_en">

                    </div>



                    <div class="form-group">

                        <label for="exampleInputPassword1">Country Name French :</label>

                        <input type="test" class="form-control" id="country_name_fr" placeholder="Category Name" name="country_name_fr">

                    </div>


                    <div class="form-group">

<label for="address_en"><span class="text-danger">* &nbsp</span>Address English :</label>

<input type="text" class="form-control" id="address_en" placeholder="Address English" name="address_en" >

</div>

<div class="form-group">

<label for="address_fr"><span class="text-danger">* &nbsp</span>Address French :</label>

<input type="text" class="form-control" id="address_fr" placeholder="Address French" name="address_fr" >

</div>
<div class="form-group">

<label for="contact_no"><span class="text-danger">* &nbsp</span>Contact Number :</label>

<input type="text" class="form-control" id="contact_no" placeholder="Contact Number" name="contact_no" >

</div>
<div class="form-group">

<label for="email_address"><span class="text-danger">* &nbsp</span>Email Address :</label>

<input type="text" class="form-control" id="email_address" placeholder="Email" name="email_address" >

</div>



            </div>

            <div class="modal-footer">

                <button type="submit" class="btn btn-primary">Update</button>

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

$(document).on('click', '.editcountry', function(e){

    e.preventDefault();

  var brandidname = $(this).val();

  //console.log(brandidname);

    $.ajax({

    type: "GET",

    url: "edit/con"+brandidname,

    dataType: "json",

    success: function (response) {

      $("#cat_id").val(brandidname);

      $("#country_name_en").val(response.picbrand.country_name_en);

      $("#country_name_fr").val(response.picbrand.country_name_fr);

      $("#address_en").val(response.picbrand.address_en);
      $("#address_fr").val(response.picbrand.address_fr);
      $("#contact_no").val(response.picbrand.contact_no);
      $("#email_address").val(response.picbrand.email_address);

    }

  });

  });

});

</script>

@endsection
@extends('admin.admin_master')

@section('admin')





<div class="content">

<div class="breadcrumb-wrapper">

    <h1>Sub Category</h1>

    

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

<li class="breadcrumb-item" aria-current="page">Sub Category</li>

</ol>

</nav>



</div>





<div class="row">

    <div class="col-lg-12">

        <div class="card card-default">

            <div class="card-header card-header-border-bottom">

                <h2>

                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">

                      Add Sub Category <i class="mdi mdi-library-plus"></i></button>

                </h2>

            </div>

            <div class="card-body">

              

                <table id="example" class="display nowrap dataTable dtr-inline" style="width: 100%; position: relative;" aria-describedby="example_info">

                    <thead>

                        <tr>

                            <th>S.No.</th>

                            <th>Category Name English</th>

                            <th>Category Name French</th>

                            <th>Sub Category Name English</th>

                            <th>Sub Category Name French</th>
                            <th>Country</th>

                            <th>Status</th>

                            <th>Options</th>

                        </tr>

                    </thead>

                    <tbody>

                            @php

                                $sno = 1;

                            @endphp

                          

                        @foreach ($subcat as $item)

                

                        <tr>

                

                            <td>{{ $sno++ }}</td>

                            <td>{{ $item['category']['categories_name_en'] }}</td>

                            <td>{{ $item['category']['categories_name_fr'] }}</td>

                            <td>{{ $item->subcategories_name_en ?? '' }}</td>

                            <td>{{ $item->subcategories_name_fr ?? '' }}</td>

                            <td>{{ $item->country_id ?? '' }}</td>

                

                            <td>

                            @if ($item->subcategories_status == 1)

                                <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>

                            @else

                            <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>

                            @endif

                

                            </td>

                            <td>

                            @if ($item->subcategories_status == 1)

                            <a href="{{ route('subcat.inactive',$item->id) }}" class="btn btn-danger" title="inactive now">

                                <i class="fa fa-arrow-down"></i></a>

                        @else

                        <a href="{{ route('subcat.active',$item->id) }}" class="btn btn-success" title="active now">

                            <i class="fa fa-arrow-up"></i></a>

                        @endif

                        <button class="btn btn-danger editsubcategory" value="{{ $item->id }}" title="Edit Subcategory" data-toggle="modal" data-target="#exampleModalFormedit">

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

                <h5 class="modal-title" id="exampleModalFormTitle">Add Sub Category</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

        <form method="POST" action="{{ route('store.subcat') }}" name="submitform" id="submitform">

                    @csrf

                    <div class="form-group">

                        <label for="exampleFormControlSelect1"><span class="text-danger">* &nbsp</span>Select Category Name</label>

                        <select class="form-control" id="exampleFormControlSelect1" name="category_id"  required>

                            <option selected="" disabled="" >Select Category Name</option>

                            @foreach($categories as $category)

                        <option value="{{$category->id}}">{{$category->categories_name_en}}</option>

                @endforeach

                        </select>

                    </div>

                    <div class="form-group">

                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Sub Category Name English :</label>

                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="subcategories_name_en" required>

                    </div>



                    <div class="form-group">

                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Sub Category Name French :</label>

                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="subcategories_name_fr" required>

                    </div>

            

            <div class="form-group">
                            <label for="exampleFormControlSelect1"><span class="text-danger">* &nbsp</span>Select Country Name</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="country_id[]"  multiple="" required>
                                <option selected="" disabled="" >Select Country Name</option>
                                @foreach($country as $item)
                           <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>
                    @endforeach
                            </select>
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

                <h5 class="modal-title" id="exampleModalFormedit">Edit Sub Category</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('update.subcat') }}" name="submitform" id="submit_edit_form">

                    @csrf

                    <input type="hidden" name="id" id="subcat_id">  



                    <div class="form-group">

                        <label for="exampleInputPassword1">Sub Category Name English :</label>

                        <input type="test" class="form-control" id="subcategories_name_en" placeholder="Category Name" name="subcategories_name_en">

                    </div>



                    <div class="form-group">

                        <label for="exampleInputPassword1">Sub Category Name French :</label>

                        <input type="test" class="form-control" id="subcategories_name_fr" placeholder="Category Name" name="subcategories_name_fr">

                    </div>

                    <div class="form-group">
                            <label for="exampleFormControlSelect1"><span class="text-danger">* &nbsp</span>Select Country Name</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="country_id[]"  multiple="" required>
                                <option selected="" disabled="" >Select Country Name</option>
                                @foreach($country as $item)
                           <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>
                    @endforeach
                            </select>
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

$(document).on('click', '.editsubcategory', function(e){

    e.preventDefault();

  var id = $(this).val();

    $.ajax({

    type: "GET",

    url: "edit/subcat"+id,

    dataType: "json",

    success: function (response) {

    //console.log(response.category);

      $("#subcat_id").val(id);

      $("#subcategories_name_en").val(response.subcat.subcategories_name_en);

      $("#subcategories_name_fr").val(response.subcat.subcategories_name_fr);

    }

  });

  });

});

</script>



@endsection
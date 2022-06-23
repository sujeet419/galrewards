@extends('admin.admin_master')
@section('admin')

<div class="content">
<div class="breadcrumb-wrapper">
    <h1>Product Definition</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Products</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            <div class="row justify-content-between">
            <div class="col-12">
                <h2>
                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">
                      Add Product <i class="mdi mdi-library-plus"></i></button>
                </h2>
            </div>
            <div class="col-1">
            </div>
            </div>
            </div>
            <div class="card-body">
                <table id="example" class="display nowrap dataTable dtr-inline" style="width: 100%; position: relative;" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Product Image</th>
                            <th>Product Name English</th>
							 <th>Product Country</th>
                            <th>Points</th>
							<th>Product End Date</th>
							{{-- <th>Product Status</th> --}}
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                            @endphp
                          
                        @foreach ($product as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            <td><img src="{{ asset($item->product_thambnail) }}" style=" width:60px; height:50px;"></td>
                            <td>{{ $item->product_name_en ?? '' }}</td>
							<td>{{ $item->country_id	 ?? '' }}</td> 
                            <td>{{ $item->points ?? '' }}</td>
							
							<td>
							@if ($item->product_end_date >= $item->product_start_date)
							<span class="badge badge-pill badge-success" style="background-color: green;">{{ $item->product_end_date }}</span>
                            @else
							<span class="badge badge-pill badge-danger" style="background-color: red;">{{ $item->product_end_date }}</span>
							@endif
							</td>
							{{-- <td>
                                @if ($item->product_active == 1)
                                    <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
                                @else
                                <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>
                                @endif
                    
							</td> --}}
                                <td>
								{{--  @if ($item->product_active == 1)
                                    <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="inactive now">
                                        <i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="active now">
                                    <i class="fa fa-arrow-up"></i></a>
                                @endif --}}
                                <a href="{{ route('product.view',$item->id )}}">
                                <button class="btn btn-danger editcategory" value="{{ $item->id }}" title="Product View" data-toggle="modal" data-target="#exampleModalFormedit">
                                    <i class="fa fa-eye"></i></button></a>

                                <a href="{{ route('product.edit',$item->id )}}">
                                    <button class="btn btn-danger editcategory" value="{{ $item->id }}" title="Product Edit" data-toggle="modal" data-target="#exampleModalFormedit">
                                        <i class="fa fa-pencil"></i></button></a>
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
        <div class="modal-content" style="width: 180%; margin-left: -130px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Add Product&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<span class="text-danger">*</span> indicates mandatory fields)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form method="POST" action="{{ route('store.product') }}" name="submitform" id="submitform" enctype="multipart/form-data"> 
                    @csrf
                    <div class="content">
                        <div class="row">
                        <div class="col-md-6">       
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"><span class="text-danger">* &nbsp</span>Select Category Name</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option selected="" disabled="" >Select Category Name</option>
                                @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->categories_name_en}}</option>
                    @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"><span class="text-danger">* &nbsp</span>Select Sub Category Name</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="subcategory_id" required>
                                <option selected="" disabled="" >Select Sub Category Name</option>
                               
                            </select>
                        </div>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-md-6"> 
						  <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Product Name English :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Product Name English" name="product_name_en" required>
                    </div>
					 
					
                    </div>
                    <div class="col-md-6"> 
                   <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Product Name French :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Product Name French" name="product_name_fr" required>
                    </div>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-6"> 
					
						
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Product Points :</label>
                        <input type="number" class="form-control" id="points" placeholder="Product Points" name="points" required autocomplete="off">
                    </div>
                  
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label class="control control-checkbox">Special Deal
                                <input type="checkbox" name="special_deals" value="1" >
                                <div class="control-indicator"></div>
                            </label>
                        </div>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-6"> 
					
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
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Product Image :</label>
                        <img src="" id="mainthmb">	
                        <input type="file" class="form-control" onChange="mainThamUrl(this)" id="exampleInputPassword1" name="product_thambnail" required>
                        @error('product_thambnail')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label><span class="text-danger">* &nbsp;</span>Multiple Image</label>
                        <div class="controls">
                            <input type="file" name="image_name[]" class="form-control trigger" multiple="" id="multiimg" required>
                            @error('image_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row" id="preview_img"></div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Start Date :</label>
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="exampleInputPassword1" placeholder="Product Points" name="product_start_date" readonly>
                        </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product End Date :</label>
                            <input type="date" id="txtDate" class="form-control" id="exampleInputPassword1" name="product_end_date" min="<?php echo date("Y-m-d"); ?>" >
                        </div>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                            {{-- <div class="col-md-12"> 
                            <div class="form-group">
                                <label class="control control-checkbox">Special Deal
                                    <input type="checkbox" name="special_deals" value="1" >
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                            </div> --}}
                            </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
  $("#submitform").validate({
      rules: {
        points: {
            number: true,
          },
      }
  });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    $('select[name="subsubcategory_id"]').html('');
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategories_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

});
  </script>


 <script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainthmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
<script>
 
    $(document).ready(function(){
     $('#multiimg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
     
    </script>
@endsection
@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Category</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Category</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-md-0" data-toggle="modal" data-target="#exampleModalForm" style="float: right;">
                      Add Category <i class="mdi mdi-library-plus"></i></button>
                </h2>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Category Name English</th>
                            <th>Category Name French</th>
                            <th>Country</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                $cat = App\Models\category::latest()->get();  
                            @endphp
                          
                        @foreach ($cat as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                            
                            <td>{{ $item->categories_name_en ?? '' }}</td>
                            <td>{{ $item->categories_name_fr ?? '' }}</td>
                            <td>{{ $item->country_id ?? '' }}</td>
                            <td><img src="{{ asset($item->image) }}" style=" width:60px; height:50px;"></td>
                
                            <td>
                            @if ($item->categories_status == 1)
                                <span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span>
                            @endif
                
                            </td>
                            <td>
                            @if ($item->categories_status == 1)
                            <a href="{{ route('cat.inactive',$item->id) }}" class="btn btn-danger" title="inactive now">
                                <i class="fa fa-arrow-down"></i></a>
                        @else
                        <a href="{{ route('cat.active',$item->id) }}" class="btn btn-success" title="active now">
                            <i class="fa fa-arrow-up"></i></a>
                        @endif
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
                <h5 class="modal-title" id="exampleModalFormTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form method="POST" action="{{ route('store.cat') }}" name="submitform" id="addcategoryform" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Category Name English :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="categories_name_en" required>
                    
                    @error('categories_name_en')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1"><span class="text-danger">* &nbsp</span>Category Name French :</label>
                        <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Category Name" name="categories_name_fr" required>
                        
						
                    @error('categories_name_en')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
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


                    <div class="form-group">
                        <label for="image"><span class="text-danger">* &nbsp</span>Category Image :</label><br>
                        <img src="" class="mainthmb">
                        <input type="file" class="form-control" onChange="mainThamUrl(this)" id="image" placeholder="Category Image" name="image" required>
                        
						
                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
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
                <h5 class="modal-title" id="exampleModalFormedit">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update.cat') }}" name="submitform" id="submit_edit_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="cat_id">  
                    <input type="hidden" id="old_image" name="old_image">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category Name English :</label>
                        <input type="test" class="form-control" id="categories_name_en" placeholder="Category Name" name="categories_name_en">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Category Name French :</label>
                        <input type="test" class="form-control" id="categories_name_fr" placeholder="Category Name" name="categories_name_fr">
                    </div>


                    <div class="form-group">

<label for="exampleFormControlSelect1">Select Country Name</label>

<select class="form-control" id="exampleFormControlSelect1" name="country_id[]" multiple="multiple">

@foreach($country as  $item)

<option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>




@endforeach

        
</select>

</div>


                    <div class="form-group">
                        <label for="image"><span class="text-danger">* &nbsp</span>Category Image :</label><br>
                        <img src="" class="mainthmb">
                        <input type="file" class="form-control" onChange="mainThamUrl(this)" id="image" placeholder="Category Image" name="image" required>
                        <img id="store_image" src="" alt="preview" height="80" width="80">
						
                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
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
$(document).on('click', '.editcategory', function(e){
    e.preventDefault();
  var brandidname = $(this).val();
  //console.log(brandidname);
    $.ajax({
    type: "GET",
    url: "edit/cat"+brandidname,
    dataType: "json",
    success: function (response) {
      $("#cat_id").val(brandidname);
      $("#categories_name_en").val(response.picbrand.categories_name_en);
      $("#categories_name_fr").val(response.picbrand.categories_name_fr);
      $("#old_image").val(response.picbrand.image);
      $("#store_image").attr('src', "{{ url('/') }}"+"/"+response.picbrand.image);
    }
  });
  });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#addcategoryform").validate({
            rules: {
                categories_name_en: "required",
                categories_name_fr: "required",

            }
            console.log("submit");
        });
    });
</script>
<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('.mainthmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>

@endsection
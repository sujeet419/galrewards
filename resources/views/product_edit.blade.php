@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Product Edit</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Products Edit</li>
</ol>
</nav>

</div>
    

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            
                <div class="row">
                <h3>Update</h3>
                <div> 
                <a href="{{ route('view_product')}}" class="btn btn-primary" > Back</a>
                </div>
            </div>
            </div>
            <div class="card-body">
        <div class="content">
            <div class="row">
            <div class="col-md-6"> 
            <form method="POST" action="{{ route('update.product') }}" name="submitform" id="submitform" enctype="multipart/form-data"> 
            @csrf  
            <input type="hidden" name="id" value="{{ $product->id }}">  
            <input type="hidden" name="old_img" value="{{$product->product_thambnail}}">  
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category Name</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    <option selected="" disabled="" >Select Category Name</option>
                    @foreach($categories as $item)
                <option value="{{$item->id}}" {{ $item->id == $product->category_id  ? 
                    'selected' : ''}}>{{$item->categories_name_en}}</option>
        @endforeach
                </select>
            </div>
            </div>
            <div class="col-md-6"> 
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Sub Category Name</label>
                <select class="form-control" id="exampleFormControlSelect1" name="subcategory_id">
                    <option selected="" disabled="" >Select Sub Category Name</option>
                    @foreach($subcategory as $item)
                <option value="{{$item->id}}"{{ $item->id == $product->subcategory_id  ? 
                    'selected' : ''}}>{{$item->subcategories_name_en}}</option>
        @endforeach
                </select>
            </div>
            </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-md-6"> 
			    <div class="form-group">
            <label for="exampleInputPassword1">Product Name English :</label>
            <input type="test" class="form-control" value="{{$product->product_name_en}}" placeholder="Product Name English" name="product_name_en">
        </div>
          
			
        </div>
        <div class="col-md-6"> 
         <div class="form-group">
            <label for="exampleInputPassword1">Product Name French :</label>
            <input type="test" class="form-control" value="{{$product->product_name_fr}}" placeholder="Product Name French" name="product_name_fr">
        </div>
	
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-6"> 
		
		 <div class="form-group">
            <label for="exampleInputPassword1">Product Points :</label>
            <input type="test" class="form-control" value="{{$product->points}}" placeholder="Product Points" name="points">
        </div>
     
        </div>
        <div class="col-md-6"> 
            <div class="form-group">
                <label class="control control-checkbox">Special Deal
                    <input type="checkbox" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked' : ''}}>
                    <div class="control-indicator"></div>
                </label>
            </div>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-6"> 
		    <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Country Name</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="country_id[]" multiple="multiple">
                  
						
						   <?php
        //$rsmex = explode(",",$Selectedcountry[0]->country);
		
		
		//dd( $rsmex);
    ?>
						
						
				<!-- @foreach($Selectedcountry as $rsmsl)
				 
                /@foreach($country as $rsms)
                    <option value="{{$rsms->country_name_en}}" @if ( $rsmsl == $rsms->country_name_en ) {{"selected"}} @endif }}>{{$rsms->country_name_en}}</option>
                @endforeach
				
				
				
        @endforeach -->
	
		
		 @foreach($country as  $item)
                <option value="{{ $item->country_name_en }}"   @foreach($Selectedcountry as $items){{ $items == $item->country_name_en  ? 'selected' : ''}}   @endforeach> {{ $item->country_name_en }}</option>
              @endforeach
							
						
						
                   
						
						
                    </select>
                </div>
		
       
        </div>
        <div class="col-md-6"> 
        <div class="form-group">
            <img src="{{asset($product->product_thambnail)}}" height="50px" width="50px">
            <label for="exampleInputPassword1">Product Image :</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="product_thambnail">
            @error('product_thambnail')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6"> 
            <div class="form-group">
                <label for="exampleInputPassword1">Product Start Date :</label>
                <input type="date" class="form-control" value="{{$product->product_start_date}}"  placeholder="Product Points" name="product_start_date" readonly>
            </div>
            </div>
            <div class="col-md-6"> 
            <div class="form-group">
                <label for="exampleInputPassword1">Product End Date :</label>
                <input type="date" class="form-control" value="{{$product->product_end_date}}" min="<?php echo date("Y-m-d"); ?>" name="product_end_date">
            </div>
            </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12"> 
                {{-- <div class="form-group">
                    <label class="control control-checkbox">Special Deal
                        <input type="checkbox" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked' : ''}}>
                        <div class="control-indicator"></div>
                    </label>
                </div> --}}
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
                </div>
                </div>
        </div>


            </div>
        </div>
    </div>
</div>





<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            
                <div class="row">
                <h3>Update Multiple Image</h3>

            </div>
            </div>
            <div class="card-body">
        <div class="content">
            <div class="row">
        
                <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                    <h4 class="box-title"><strong>Product Multiple Image Update</strong></h4>
                    </div>
                
                 
                <div class="row row-sm">
                    @foreach ($multi_image as $img)
                    <div class="col-md-3">
                
                <div class="card">
                <img class="card-img-top" src="{{asset($img->image_name)}}" style="height: 130px; width: 200px;">
                <div class="card-body">
                <h5 class="card-title">
                <a class="btn btn-sm btn-danger" href="{{ route('delete.multiimage',$img->id) }}"><i class="fa fa-trash"></i></a>
            
             
                </h5>
              
                </div>
                </div>
                    
                
                    </div>
                    @endforeach
                </div>
                <div class="text-xs-right">
                  <form action="{{route('update.multiimage')}}" method="post" enctype="multipart/form-data">   
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="col-md-6">
                  <p class="card-text">
                <div class="form-group">
                    <label class="form-control-label">Add Image <span class="tx-danger">*</span>
                    </label>
                    <input class="form-control" name="multi_imag[ {{ $img->id ?? ''}} ]" multiple id="multiple" type="file">
                </div>
                </p>
                </div>
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Image">
                 </div>
                    </form>
                <div class="form-layout-footer">
                </div>
                </div>
                </div>
                </div>
        </div>


            </div>
        </div>
    </div>
</div>






					
</div>

{{-- add model --}}
@endsection


        
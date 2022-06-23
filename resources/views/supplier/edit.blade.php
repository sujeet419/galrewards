@extends('admin.admin_master')
@section('admin')
 
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('supplier') }}">Home</a></li>
              <li class="breadcrumb-item active">Supplier Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
          @if(Session::has('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{Session::get('success')}}
            </div>
        @endif   


              <!-- form start -->
				  
            <form action="{{ route('supplier.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Supplier Name">Supplier Name</label>
                    <input type="text" value="{{ $supplier->supplier_name}}" name="supplier_name" class="form-control" id="supplier_name" placeholder="Supplier Name">
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Supplier Code">Supplier Code</label>
                    <input  type="text" value="{{ $supplier->supplier_code}}" name="supplier_code" class="form-control" id="supplier_code" placeholder="Supplier Code" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Contact Number">Contact Number</label>
                    <input type="text"value="{{ $supplier->contact_no}}" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number">
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Category Name</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="category_id[]" multiple="multiple">
  
  
      
       @foreach($category as  $item)
                  <option value="{{ $item->categories_name_en }}"   @foreach($selectedcategory as $items){{ $items == $item->categories_name_en  ? 'selected' : ''}}   @endforeach> {{ $item->categories_name_en }}</option>
                @endforeach

              
              
                     
              
              
                      </select>
                  </div>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Tax ID">Tax ID</label>
                    <input type="text" value="{{ $supplier->tax_id}}" name="tax_id" class="form-control" id="tax_id" placeholder="Tax ID">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Refernce By">Refernce By</label>
                    <input type="text" value="{{ $supplier->refernce_by}}" name="refernce_by" class="form-control" id="refernce_by" placeholder="Refernce By">
                  </div>

      </div>
      <div class="form-row">


        <div class="form-group col-md-4">
          <label for="Email">Email</label>
          <input type="text"value="{{ $supplier->email}}" name="email" class="form-control" id="email" placeholder="Email">
        </div>

          <div class="form-group col-md-4">
                    <label for="country">Country</label>
					
					 <select class="form-control" id="country" name="country" >
					<option selected="" disabled="" >Select Country </option>
                                @foreach($country as $itemval)
								
						 <option value="{{$itemval->country_name_en}}"{{ $supplier->country == $itemval->country_name_en ? 'selected' : ''}}>{{$itemval->country_name_en}}</option>		
								
                    
                    @endforeach
                            </select>
					
                    
                  </div>



<div class="form-group col-md-4">
                    <label for="Address">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ $supplier->address}}</textarea>
                   
                  </div>
</div>


                
				</div>	</div>
				
				
	
				
				
                <!-- /.card-body -->

                <input type="submit" class="btn btn-rounded btn-info" value="Update">
            
              </form>
 
 
 </div></div></div>
 </section>
 
 </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
    $(document).ready(function(){
  
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});



    })
</script>
  
@endsection

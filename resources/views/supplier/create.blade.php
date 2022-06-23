@extends('admin.admin_master')
@section('admin')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @php
    $counter = 1;
for($i=0; $i<=999; $i++) {
 
 $counter++;
}
$warehousecode= 'SUP'.$counter;

$chars = "0123456789";
$code = "";
for ($i = 0; $i < 4; $i++) {
    $code .= $chars[mt_rand(0, strlen($chars)-1)];
    $suppliercode='SUP-'.$code;
}



    @endphp
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
          @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif   


              <!-- form start -->
				  
            <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Supplier Name">Supplier Name</label>
                    <input type="text" name="supplier_name" class="form-control" id="supplier_name" placeholder="Supplier Name">
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Supplier Code">Supplier Code</label>
                    <input  type="text" value="{{$suppliercode}}" name="supplier_code" class="form-control" id="supplier_code" placeholder="Supplier Code" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Contact Number">Contact Number</label>
                    <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number">
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="Tax ID">Tax ID</label>
                    <input type="text" name="tax_id" class="form-control" id="tax_id" placeholder="Tax ID">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Refernce By">Refernce By</label>
                    <input type="text" name="refernce_by" class="form-control" id="refernce_by" placeholder="Refernce By">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                  </div>


    
                

</div>
<div class="form-row">


                    <div class="form-group col-md-4">
                    <label for="country">Country</label>
					
					          <select class="form-control" id="country" name="country" >
					          <option selected="" disabled="" >Select Country </option>
                                @foreach($country as $item)
                           <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>
                    @endforeach
                            </select>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Category Name</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="category_id[]"  multiple="" required>
                          <option selected="" disabled="" >Select Country Name</option>
                          @foreach($category as $item)
                     <option value="{{$item->categories_name_en}}">{{$item->categories_name_en}}</option>
              @endforeach
                      </select>
                  </div> 
                  </div>



<div class="form-group col-md-4">
                    <label for="Address">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                   
                  </div>
</div>


                
				</div>	</div>
				
				
	
				
				
                <!-- /.card-body -->

                <input type="submit" class="btn btn-rounded btn-info" value="Submit">
            
              </form>
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
  
    })
</script>


  
@endsection

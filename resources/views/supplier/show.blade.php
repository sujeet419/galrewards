@extends('admin.admin_master')
@section('admin')
 
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Supplier Details</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('supplier') }}">Home</a></li>
              <li class="breadcrumb-item active">Supplier Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 


        
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Supplier Name">Supplier Name : </label> {{ $supplier->supplier_name}}
                  
                 
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Supplier Code">Supplier Code : </label> {{ $supplier->supplier_code}}
                   
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Contact Number">Contact Number : </label> {{ $supplier->contact_no}}
                    
                  </div>

                 </div>

                 
            


                  <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="Tax ID">Tax ID : </label> {{ $supplier->tax_id}}
                   
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Refernce By">Refernce By : </label> {{ $supplier->refernce_by}}
                   
                  </div>

                  <div class="form-group col-md-4">
                    <label for="Email">Email : </label> {{ $supplier->email}}
                 
                  </div>


    
                

</div>
<div class="form-row">

<div class="form-group col-md-4">
                    <label for="Country">Country : </label>{{ $supplier->country}}
                   
                   
                  </div>


<div class="form-group col-md-4">
                    <label for="Address">Address : </label>{{ $supplier->address}}
                   
                   
                  </div>
</div>


                
				</div>	</div>
				
				
	
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
  
    })
</script>
   
@endsection

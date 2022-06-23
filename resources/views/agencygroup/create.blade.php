@extends('admin.admin_master')
@section('admin')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Agency Group</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('agencygroup')}}">Home</a></li>
              <li class="breadcrumb-item active">Agency Group</li>
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
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif   


              <!-- form start -->
				  
            <form action="{{ route('agencygroup.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                
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
                    <label for="Agency Name">Agency Group</label>
                    <input  type="text"  name="agency_name" class="form-control" id="agency_name" placeholder="Agency name">
                  </div>
				  
				   <div class="form-group col-md-4">
                    <label for="contact_no">Contact Number</label>
                    <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number">
                 
                  </div>
				  
				  


				   
				  

                 </div>

                 
            
				<div class="form-row">
                 
        <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                 
                  </div>
             
				    <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <input  type="text"  name="address" class="form-control" id="address" placeholder="Address">
                  </div>
				  
				 
				  
				
				  

                 </div>
			



                
				</div>	</div>
				
				
	
				
				
                <!-- /.card-body -->

                <input type="submit" class="btn btn-rounded btn-info float-right" value="Submit">
            
              </form>
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
  
    })
</script>


  
@endsection
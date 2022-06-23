@extends('admin.admin_master')

@section('admin')


   <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h2>PCC Edit</h2>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="{{ route('pcc') }}">Home</a></li>

              <li class="breadcrumb-item active">PCC Edit</li>

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

				  

            <form action="{{ route('pcc.update',$pcc->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

			 <div class="col-12">

         

                <div class="card-body">

                <div class="form-row">

				

   <div class="form-group col-md-4">

                    <label for="country">Country</label>

					

					 <select class="form-control" id="country" name="country" >

					<option selected="" disabled="" >Select Country </option>

                                @foreach($country as $itemval)

								

						 <option value="{{$itemval->country_name_en}}"{{ $pcc->country == $itemval->country_name_en ? 'selected' : ''}}>{{$itemval->country_name_en}}</option>		

								

                    

                    @endforeach

                            </select>

					

                    

                  </div>

				  

				  

				    <div class="form-group col-md-4">

                    <label for="Agency name">Agency Group</label>

                    <select class="form-control" id="agency_name" name="agency_name" >

            <option selected="" disabled="" >Select Agency group </option>

                      @foreach($agencygroup as $itemval)

      

   <option value="{{$itemval->agency_name}}"{{ $pcc->agency_name == $itemval->agency_name ? 'selected' : ''}}>{{$itemval->agency_name}}</option>		

      

          

          @endforeach

                  </select>




    

                  </div>

				  

				   <div class="form-group col-md-4">

                    <label for="PCC Number">PCC Number</label>

                    <input type="text" value="{{ $pcc->pcc_number}}" name="pcc_number" class="form-control" id="pcc_number">

                 

                  </div>



                 </div>



                 

            



                

				</div>	</div>

				

				

	

				

				

                <!-- /.card-body -->



                <input type="submit" class="btn btn-rounded btn-info float-right" value="Update">

            

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


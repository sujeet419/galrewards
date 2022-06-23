@extends('admin.admin_master')

@section('admin')

 

 

   <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h2>PCC</h2>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="{{route('pcc')}}">Home</a></li>

              <li class="breadcrumb-item active">PCC</li>

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

				  

            <form action="{{ route('pcc.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

			 <div class="col-12">

         

                <div class="card-body">

                

				<div class="form-row">

                 <div class="form-group col-md-4"><label for="country">Country</label>
                   
                 <select class="form-control" id="country" name="country" >
                   <option selected="" disabled="" >Select Country </option>

                                @foreach($country as $item)

                           <option value="{{$item->country_name_en}}">{{$item->country_name_en}}</option>

                    @endforeach

                            </select>

                  </div>

  

				    <div class="form-group col-md-4">

                    <label for="Agency Name">Agency Group</label>

                    <select class="form-control" id="agency_name" name="agency_name" >
                   <option selected="" disabled="" >Select Agency Group </option>

                               

                            </select>


                  

                  </div>

				  

				   <div class="form-group col-md-4">

                    <label for="pcc_number">PCC Number</label>

                    <input type="text" name="pcc_number" class="form-control" id="pcc_number" placeholder="PCC Number">

                 

                  </div>



                 </div>

          

				</div>	</div>

				

                <!-- /.card-body -->



                <input type="submit" class="btn btn-rounded btn-info float-right" value="Submit">

            

              </form>

 

 

 </div></div></div>

 </section>

 

 </div>

   
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">

$(document).ready(function() {

  $('select[name="country"]').on('change', function(){

      var country = $(this).val();

      if(country) {

          $.ajax({

              url: "{{  url('/getagencygroup/ajax') }}/"+country,

              type:"GET",

              dataType:"json",

              success:function(data) {

        

                $('select[name="agency_name"]').html('');

                 var d =$('select[name="agency_name"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="agency_name"]').append('<option value="'+ value.agency_name +'">' + value.agency_name + '</option>');

                    });

              },

          });

      } else {

          alert('danger');

      }

  });



});

</script>



 <script>

    $(document).ready(function(){

  

    })

</script>
 

@endsection
@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="page-title">Components</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">Master</li>
                  <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">


          <div class="col-md-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">{{$title}} - {{$from_date}} - {{$to_date}}</h3>
                <a href="{{ route('report')}}" style="float: right;" class="btn btn-outline btn-warning mb-5">Back</a>
               
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <div id="example5_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                  <div class="row">
                  <div class="col-sm-12">
					<table id="example1"  class="table table-bordered table-striped">
                  
                  <thead>
                  <tr role="row">
                <th>Ticket related to</th>
                <th>Raised by (Consultant Name)</th>
                <th>Agency Group Name</th>
               <th>Status</th>
               <th>Resolve Time</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($ticketstatus as $item)
                  <tr role="row" class="odd">
                  
                        
                  <td>{{$item->elaborate_problems}}</td>
                  <td>{{$item->first_name}}</td>
                  <td>{{$item->agency_group}}</td>
                  <td>

                  @php
                        if ($item->status ?? '' == 0) {
                            echo $value = "open";
                        }
                         elseif($item->status ?? '' == 1)
                        {
                            echo $value = "Work In Progress";
                        }
                        else {
                            echo $value = "Closed";
                        }
                            
                        @endphp



                  </td>
                  <td>{{$item->days ?? ''}}</td>
                   
                    </tr>
                    @endforeach
                 
                  </tbody>
				  

             
                </table>
              </div>
            </div>
            </div>
                </div>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->          
          </div>
          <!-- /.col -->




        </div>
    <!-- /.col -->



        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

  
	 
	 


  

	   

@endsection


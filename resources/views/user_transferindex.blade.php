@extends('admin.admin_master')
@section('admin')
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Point Transfer</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Point Transfer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Point Transfer List</h3>
				
				<div class=""> <a class="btn bg-primary text-white btn-pill mb-3 mb-md-0 " href="{{ route('usertransferview') }}"><i class="fa fa-plus"></i> Point Transfer </a></div>
				
                
         <div class="card-body">

         @if(Session::has('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{Session::get('success')}}
            </div>
        @endif 

                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no</th>
                    <th>From User</th>
                    <th>TO User</th>
                    <th>From User Point</th>
                    <th>TO User Point</th>
                    <th>Transfer Reason</th>
                     <th>Transfer Type</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
					$sno = 1;	
				@endphp
			@foreach ($pointtransfers as $item)

                  <tr>

                  <td>{{ $sno++ }}</td>
				  <td>{{$item->from_user}}</td>
                    <td>{{$item->touser}}</td>
                    <td>{{$item->fuser_point}}</td>
                    <td>{{$item->tuser_point}}</td>
                    <td>{{$item->transfer_reason}}</td>
                    
					<td>

                    @if ($item->transfer_type == 1)
					<span class="badge badge-pill badge-success" style="background-color: green;">Point Cash on</span>
				@else
				<span class="badge badge-pill badge-danger" style="background-color: green;">Point Transfer</span> 
				@endif



                    </td>
               
                  </tr>
                
                  @endforeach
                
                  
                  
                  
                
                  </tbody>
                 <!--  <tfoot>
                  <tr>
                  <th>Sr.no</th>
                    <th>Supplier Name</th>
                    <th>Supplier Code</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
  
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});



    })
</script>
 
@endsection

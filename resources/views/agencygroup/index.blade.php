@extends('admin.admin_master')
@section('admin')
 
  

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Agencygroup</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Agencygroup List</li>
</ol>
</nav>

</div>




  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
  <div class="card">
              <div class="card-header">
              
					  
                <div class=""> <a class="btn bg-primary text-white btn-pill mb-3 mb-md-0 " href="{{ route('agencygroup.create') }}"><i class="fa fa-plus"></i> Add Agency Group </a></div>
              </div>
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
                  <th>Agency Group</th>
					<th>Contact Number</th>
					<th>Email</th>
					<th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  @php
					$sno = 1;	
				@endphp
			@foreach ($agencygroup as $item)

                  <tr>

                  <td>{{ $sno++ }}</td>
				  <td>{{$item->agency_name}}</td>
				    <td>{{$item->contact_no}}</td>
                    <td>{{$item->email}}</td>
                     <td>{{$item->address}}</td>
                  
                    <td>

                    @if ($item->status == 1)
					<span class="badge badge-pill badge-success" style="background-color: green;">Active</span>
				@else
				<span class="badge badge-pill badge-danger" style="background-color: red;">Inactive</span> 
				@endif



                    </td>
                    <td class="project-actions text-right">

                    @if ($item->status == 1)
				<a href="{{ route('agencygroup.inactive', $item->id) }}" class="btn btn-danger" title="inactive now">
					<i class="fa fa-arrow-down"></i></a>
			@else
			<a href="{{ route('agencygroup.active', $item->id) }}" class="btn btn-success" title="active now">
				<i class="fa fa-arrow-up"></i></a>
			@endif


                        
                          <a class="btn btn-danger" href="{{ route('agencygroup.edit', $item->id) }}">
                              <i class="fa fa-pencil">
                              </i>
                              
                          </a>
                        <!--   <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a> -->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
   
  
 <script>
    $(document).ready(function(){
  
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});



    })
</script>
 
@endsection
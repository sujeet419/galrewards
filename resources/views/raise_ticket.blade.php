@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Tickets</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Tickets</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                   
                </h2>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
							 <th>Ticket No</th>
                            <th>User Email</th>
                            <th>Assistance Detail</th>
                            <th>Comment</th>
                            <th>Ticket Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                            @endphp
                          
                        @foreach ($ticket as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
							 <td>{{ $item->ticket_number ?? '' }}</td>
                            <td>{{ $item['user']['email'] ?? '' }}</td>
                            <td>{{ $item->need_assistance ?? '' }}</td>
                            <td>{{ $item->comment ?? '' }}</td>
                            <td>{{ $item->ticket_date	 ?? '' }}</td>
                            <td>
                            @if ($item->status == 0)
                            <span class="badge badge-pill badge-success" style="background-color: red;">Open</span>
                            @elseif($item->status == 1)
                            <span class="badge badge-pill badge-success" style="background-color: rgb(209, 209, 22);">WIP</span>
                            @else
                            <span class="badge badge-pill badge-success" style="background-color: green;">Close</span>  
                            @endif
                            </td>
                            <td style="width: 12%"> 
							
							
                                @if ($item->status == 0)
									
								<a href="{{ route('ticket.show',$item->id)}}" class="btn btn-danger">
                                <i class="fa fa-pencil"></i></a>
									
								@elseif ($item->status == 2)
								
								<a href="{{ route('show.full.ticket',$item->id)}}" class="btn btn-danger">
                                    <i class="fa fa-eye"></i></a>

							    @else

									<a href="{{ route('ticket.show',$item->id)}}" class="btn btn-danger">
                                <i class="fa fa-pencil"></i></a>
								
								<a href="{{ route('show.full.ticket',$item->id)}}" class="btn btn-danger">
                                    <i class="fa fa-eye"></i></a>
									@endif
                            </td>
                        </tr>
                
                        @endforeach
                
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
						
</div>

{{-- add model --}}
@endsection
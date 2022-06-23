@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Tickets Summary</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Tickets Summary</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                    
					<div class="row">
              
                <div class="col-md-3"> 
                <div class="form-group">
                    <label for="email">Ticket From</label>
                    <input type="text" class="form-control" value="{{$ticket[0]->email}}"  id="email" name="email" readonly>
                </div>
                </div>
				
				     <div class="col-md-3"> 
                <div class="form-group">
                    <label for="need_assistance">Need Assistance </label>
                    <input type="text" class="form-control"value="{{$ticket[0]->need_assistance}}"  id="need_assistance" name="need_assistance" readonly>
                </div>
                </div>
				
				    <div class="col-md-3"> 
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" class="form-control"value="{{$ticket[0]->comment}}"  id="comment" name="comment" readonly>
                </div>
                </div>
				
				  <div class="col-md-3"> 
                <div class="form-group">
                    <label for="ticket_date">Ticket date</label>
                    <input type="text" class="form-control"value="{{$ticket[0]->ticket_date}}"  id="ticket_date" name="ticket_date" readonly>
                </div>
                </div>
				
                </div>
				
				  <a href="{{ route('view.ticket')}}" class="btn btn-primary" style="margin-left: 10px;"> Back</a>
				
				
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                           <th>Date</th>
                            <th>Conclusion</th>
                            <th>Note</th>
                           
                            <th>Status</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                            @php
                                $sno = 1;
                            @endphp
                          
                        @foreach ($ticket_summary as $item)
                
                        <tr>
                
                            <td>{{ $sno++ }}</td>
                          <td>{{ $item->created_at	 ?? '' }}</td>
                            <td>{{ $item->final_resolution ?? '' }}</td>
                            <td>{{ $item->note ?? '' }}</td>
                           
                            <td>
                            @if ($item->status == 0)
                            <span class="badge badge-pill badge-success" style="background-color: red;">Open</span>
                            @elseif($item->status == 1)
                            <span class="badge badge-pill badge-success" style="background-color: rgb(209, 209, 22);">Work In Progress</span>
                            @else
                            <span class="badge badge-pill badge-success" style="background-color: green;">Close</span>  
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


@endsection
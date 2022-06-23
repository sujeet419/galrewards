@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Ticket View</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Ticket View</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Ticket View</h2>

                    <a href="{{ route('view.ticket')}}" class="btn btn-primary" style="margin-left: 10px;"> Back</a>

            </div>
            <div class="card-body">
			<b>Ticket Number :  {{$ticket[0]->ticket_number ?? ''}} </b> 
                    <div class="content">
                        <div class="row">
                        <div class="col-md-6">       
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ticket Date :</label>
                        <input type="text" class="form-control" value="{{$ticket[0]->ticket_date ?? ''}}" readonly>
                    </div>
                        </div>
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ticket Status :</label>
                        @php
                        if ($ticket[0]->status ?? '' == 0) {
                            $value = "open";
                        }
                         elseif($ticket[0]->status ?? '' == 1)
                        {
                            $value = "Work In Progress";
                        }
                        else {
                            $value = "Closed";
                        }
                            
                        @endphp
                        <input type="text" class="form-control" value="{{$value}}" readonly>
                    </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email :</label>
                                <input type="test" class="form-control" value="{{$ticket[0]->email}}"  readonly>
                            </div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number :</label>
                                <input type="test" class="form-control" value="{{$ticket[0]->contact}}" readonly>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">SIGN ON ID :</label>
                                    <input type="test" class="form-control" value="{{$ticket[0]->sign_on}}" readonly>
                                </div>
                                </div>
                                <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PCC :</label>
                                    <input type="texts" class="form-control" value="{{$ticket[0]->pcc}}" readonly>
                                </div>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Assistance Form :</label>
                                        <input type="test" class="form-control" value="{{$ticket[0]->need_assistance}}" readonly>
                                    </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Comment :</label>
                                            <input type="test" class="form-control" value="{{$ticket[0]->comment}}" readonly>
                                        </div>
                                        </div>
                                    </div>
                    <hr>
                    <h3>Ticket Redressal  </h3>
					   
					 
                   <a href="{{ route('show.full.ticketsummary',$ticket[0]->id)}}" class="btn btn-primary pull-right" >Ticket Work Summary</a>
					
</br></br>
				   <hr>

                    {{-- <form method="POST" action="{{ route('store.ticket.status') }}" name="submitform" id="submitform"> --}}
                        {{-- @csrf
                        <input type="text" class="form-control" value="{{$ticket->id}}" name="ticket_id">
                        <input type="hidden" class="form-control" value="{{$ticket->user_id}}" name="user_id"> --}}
                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant First Name :</label>
                        <input type="test" class="form-control" value="{{$ticket_view->consultant_first_name}}" placeholder="Consultant First Name" name="consultant_first_name" readonly>
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Last Name :</label>
                        <input type="text" class="form-control" value="{{$ticket_view->consultant_last_name}}" placeholder="Consultant Last Name" name="consultant_last_name" readonly>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Email :</label>
                        <input type="test" class="form-control" value="{{$ticket_view->consultant_email}}" placeholder="Consultant Email" name="email" readonly>
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Contact :</label>
                        <input type="text" class="form-control" value="{{$ticket_view->contact}}" placeholder="Consultant Contact" name="contact" readonly>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ticket Status :</label>
                           @if ($ticket_view->status == 0)
                           <input type="text" class="form-control" value="Open" name="status" readonly>  
                           @elseif($ticket_view->status == 1)
                           <input type="text" class="form-control" value="Work In Process" name="status" readonly>
                           @else
                           <input type="text" class="form-control" value="Close" name="status" readonly>
                           @endif
                        </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Please Elaborate Your Problems :</label>
                            <input type="test" class="form-control" value="{{$ticket_view->elaborate_problems}}" placeholder=" Elaborate Your Problems" name="elaborate_problems" readonly>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Support Actions :</label>
                                <input type="test" class="form-control" value="{{$ticket_view->support_actions}}" placeholder="Support Actions" name="support_actions" readonly>
                            </div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Conclusion :</label>
                                <input type="test" class="form-control" value="{{$ticket_view->final_resolution}}" placeholder="Final Resolution" name="final_resolution" readonly>
                            </div>
                            </div>
                            </div>
                            <div class="row">
							
							 <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Remark:</label>
                                <input type="text" class="form-control" value="{{$ticket_view->note}}" placeholder="Note" name="note" readonly>
                            </div>
                            </div>
							
							
							
                                <div class="col-md-6"> 
								@if($ticket_view->date_Of_closure == NULL)
									
								@else
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date Of Closure :</label>
                                    <input type="text" class="form-control" value="{{$ticket_view->date_Of_closure}}" placeholder="Support Actions" name="date_Of_closure" readonly>
                                </div>
								@endif
                                </div>
                                </div>
                    </div>
                    
            </div>
            <div class="modal-footer">
                {{-- <button type="submit" class="btn btn-primary">Submit</button>
        </form> --}}
            </div>
        </div>
    </div>
</div>
						
</div>

{{-- add model --}}
@endsection
@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Manage Ticket</h1>
    
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
<li class="breadcrumb-item" aria-current="page">Raise Ticket</li>
</ol>
</nav>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Ticket Raise</h2>
                <div> 
            <a href="{{ route('view.ticket')}}" class="btn btn-primary" style="margin-left: 10px;"> Back</a>
                    </div>
            </div>
            <div class="card-body">
			<b>Ticket Number :  {{$ticket->ticket_number ?? ''}} </b> 
                    <div class="content">
                        <div class="row">
                        <div class="col-md-6">       
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ticket Date :</label>
                        <input type="text" class="form-control" value="{{$ticket->ticket_date}}" readonly>
                    </div>
                        </div>
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ticket Status :</label>
                        @php
                        if ($ticket->status == 0) {
                            $value = "open";
                        }
                         elseif($ticket->status == 1)
                        {
                            $value = "WIP";
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
                                <input type="test" class="form-control" value="{{$ticket['user']['email'] ?? ''}}"  readonly>
                            </div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number :</label>
                                <input type="test" class="form-control" value="{{$ticket['user']['contact'] ?? ''}}" readonly>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">SIGN ON ID :</label>
                                    <input type="test" class="form-control" value="{{$ticket['user']['sign_on'] ?? ''}}" readonly>
                                </div>
                                </div>
                                <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">PCC :</label>
                                    <input type="texts" class="form-control" value="{{$ticket['user']['pcc'] ?? ''}}" readonly>
                                </div>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Assistance Form :</label>
                                        <input type="test" class="form-control" value="{{$ticket->need_assistance ?? ''}}" readonly>
                                    </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Comment :</label>
                                            <input type="test" class="form-control" value="{{$ticket->comment ?? ''}}" readonly>
                                        </div>
                                        </div>
                                    </div>
                    <hr>
                    <h3>Ticket Redressal</h3>   
                    <hr>

                    <form method="POST" action="{{ route('store.ticket.status') }}" name="submitform" id="submitform">
                        @csrf
                        <input type="hidden" class="form-control" value="{{$ticket->id}}" name="ticket_id">
                        <input type="hidden" class="form-control" value="{{$ticket->user_id}}" name="user_id">
						 <input type="hidden" class="form-control" value="{{$ticket['user']['email'] ?? ''}} " name="useremail">
                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant First Name :</label>
                        <input type="test" value="{{ Auth::user()->name }}" class="form-control" placeholder="Consultant First Name"  name="consultant_first_name" readonly>
                    @error('consultant_first_name')
                        <b><span class="text-danger">{{$message}}</span></b>
                    @enderror
					</div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Last Name :</label>
                        <input type="text" class="form-control" placeholder="Consultant Last Name" name="consultant_last_name">
                     @error('consultant_last_name')
                        <b><span class="text-danger">{{$message}}</span></b>
                    @enderror
					</div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Email :</label>
                        <input type="test" value="{{ Auth::user()->email }}" class="form-control" placeholder="Consultant Email" name="consultant_email" readonly>
                    @error('consultant_email')
                        <b><span class="text-danger">{{$message}}</span></b>
                    @enderror
					</div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Contact :</label>
                        <input type="text" class="form-control" placeholder="Consultant Contact" name="contact">
                      @error('contact')
                        <b><span class="text-danger">{{$message}}</span></b>
                    @enderror
					</div>
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ticket Status :</label>
                            <select class="form-control" id="status" name="status">
							
                                <option value="0">Open</option>
                                <option value="1">Work In Progress</option>
                                <option value="2">Close</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Please Elaborate Your Problems :</label>
                            <input type="test" class="form-control" placeholder=" Elaborate Your Problems" name="elaborate_problems">
                         @error('elaborate_problems')
                        <b><span class="text-danger">{{$message}}</span></b>
						@enderror
						</div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Support Actions :</label>
                                <input type="test" class="form-control" placeholder="Support Actions" name="support_actions">
                            @error('support_actions')
							<b><span class="text-danger">{{$message}}</span></b>
							@enderror
							</div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Conclusion :</label>
                                <input type="test" class="form-control" placeholder="Conclusion" name="final_resolution">
                            @error('final_resolution')
							<b><span class="text-danger">{{$message}}</span></b>
							@enderror
							</div>
                            </div>
                            </div>
							
							<div class="row">
                                <div class="col-md-6"> 
                                <div class="form-group" id="note">
                                    <label for="note">Remark :</label>
                                    <input type="text" class="form-control" placeholder="Remark" name="note">
                                
								</div>
                                </div>
								
								
								  <div class="col-md-6"> 
                                <div class="form-group" id="closure">
                                    <label for="exampleInputPassword1">Date Of Closure :</label>
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="Date Of Closure" name="date_Of_closure" readonly>
                                
								</div>
                                </div>
								
								
								
                                </div>
							
							
							
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            </div>
        </div>
    </div>
</div>
						
</div>

{{-- add model --}}



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$.ajaxSetup({ 
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
	$('#closure').hide();
	$('#status').on('change', function(){
            var id = $(this).val();

			//alert(id);
			
			if(id == 2){
				
				$('#closure').show();	
			}else{
				
			$('#closure').hide();	
			}

    
    });
});
</script>


@endsection
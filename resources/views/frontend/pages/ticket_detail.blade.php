@extends('frontend.master')
@section('indexhome')

<?php if(session()->get('language') == 'fr') { ?>

<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('frontend') }}" class="link">domicile</a></li>
					<li class="item-link"><span>Détails du billet</span></li>
				</ul>
				
			<a href="{{ route('ticket_status') }}" class="btn btn-primary" >Arrière</a>  
				
			</div>
			<div class=" main-content-area">
			
					<h3 class="box-title">Détails du billet</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
          
        @endif   


              <!-- form start -->
				  
              <div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              

            </div>
            <div class="card-body">
                    <div class="content">
                        <div class="row">
                        <div class="col-md-6">       
                    <div class="form-group">
                        <label for="exampleInputPassword1">Date du billet :</label>
                        <input type="text" class="form-control" value="{{$ticket[0]->ticket_date ?? ''}}" readonly>
                    </div>
                        </div>
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Statut du ticket :</label>
                        @php
                        if ($ticket[0]->status == 0) {
                            $value = "Open";
                        }
                         elseif($ticket[0]->status == 1)
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

                      <!--  <div class="row">
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">E-mail :</label>
                                <input type="test" class="form-control" value="{{$ticket[0]->email}}"  readonly>
                            </div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Numéro de téléphone :</label>
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

                    -->

                                <div class="row">
                                    <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Formulaire d'aide:</label>
                                        <input type="test" class="form-control" value="{{$ticket[0]->need_assistance}}" readonly>
                                    </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Commenter :</label>
                                            <input type="test" class="form-control" value="{{$ticket[0]->comment}}" readonly>
                                        </div>
                                        </div>
                                    </div>
		
	

<?php 
if(isset($ticketview)){?>
						
									
									
                    <hr>
                    <h3>Réparation de billets</h3>
                    <hr>


                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Prénom du consultant :</label>
                        <input type="test" class="form-control" value="{{ $ticketview->consultant_first_name ?? '' }}" placeholder="Consultant First Name" name="consultant_first_name" readonly>
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nom de famille du consultant :</label>
                        <input type="text" class="form-control" value="{{$ticketview->consultant_last_name ?? ''}}" placeholder="Consultant Last Name" name="consultant_last_name" readonly>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Courriel du consultant :</label>
                        <input type="test" class="form-control" value="{{$ticketview->consultant_email ?? ''}}" placeholder="Consultant Email" name="email" readonly>
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Contact :</label>
                        <input type="text" class="form-control" value="{{$ticketview->contact ?? ''}}" placeholder="Consultant Contact" name="contact" readonly>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Statut du ticket :</label>
                           @if ($ticketview->status == 0)
                           <input type="text" class="form-control" value="Open" name="status" readonly>  
                           @elseif($ticketview->status == 1)
                           <input type="text" class="form-control" value="Work In Process" name="status" readonly>
                           @else
                           <input type="text" class="form-control" value="Closed" name="status" readonly>
                           @endif
                        </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Action prise :</label>
                            <input type="test" class="form-control" value="{{$ticketview->elaborate_problems ?? ''}}" placeholder=" Action prise" name="elaborate_problems" readonly>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Actions de soutien :</label>
                                <input type="test" class="form-control" value="{{$ticketview->support_actions ?? ''}}" placeholder="Support Actions" name="support_actions" readonly>
                            </div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Réparation finale :</label>
                                <input type="test" class="form-control" value="{{$ticketview->final_resolution ?? ''}}" placeholder="Final Resolution" name="final_resolution" readonly>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date de fermeture :</label>
                                    <input type="text" class="form-control" value="{{$ticketview->date_Of_closure ?? ''}}" placeholder="Date Of Closure" name="date_Of_closure" readonly>
                                </div>
                                </div>
                                </div>
                    </div>
					
					
					
					
				<?php } ?>

            	
                    
            </div>
           
        </div>
    </div>
</div>
						
</div>
					
				</div>
			
				
			

	</main>
	<!--main area-->
<?php }else{ ?>


<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Ticket Details</span></li>
				</ul>
				
			<a href="{{ route('ticket_status') }}" class="btn btn-primary" >Back</a>  
				
			</div>
			<div class=" main-content-area">
			
					<h3 class="box-title">Ticket Details</h3>
					
					  @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
          
        @endif   


              <!-- form start -->
				  
              <div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              

            </div>
            <div class="card-body">
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
                        if ($ticket[0]->status == 0) {
                            $value = "Open";
                        }
                         elseif($ticket[0]->status == 1)
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

                       <!-- <div class="row">
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
                                </div> -->

                                <div class="row">
                                    <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Assistance For :</label>
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
		
	

<?php 
if(isset($ticketview)){?>
						
									
									
                    <hr>
                    <h3>Ticket Redressal</h3>
                    <hr>


                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant First Name :</label>
                        <input type="test" class="form-control" value="{{ $ticketview->consultant_first_name ?? '' }}" placeholder="Consultant First Name" name="consultant_first_name" readonly>
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Last Name :</label>
                        <input type="text" class="form-control" value="{{$ticketview->consultant_last_name ?? ''}}" placeholder="Consultant Last Name" name="consultant_last_name" readonly>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Email :</label>
                        <input type="test" class="form-control" value="{{$ticketview->consultant_email ?? ''}}" placeholder="Consultant Email" name="email" readonly>
                    </div>
                    </div>
                    <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Consultant Contact :</label>
                        <input type="text" class="form-control" value="{{$ticketview->contact ?? ''}}" placeholder="Consultant Contact" name="contact" readonly>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ticket Status : </label>
                           @if ($ticketview->status == 0)
                           <input type="text" class="form-control" value="Open" name="status" readonly>  
					   
					   
                           @elseif($ticketview->status == 2)
                           <input type="text" class="form-control" value="Closed" name="status" readonly>
                           
					   
					       @elseif($ticketview->status == 1)
                           <input type="text" class="form-control" value="Work In Process" name="status" readonly>
					   @else
                           <input type="text" class="form-control" value="Not work" name="status" readonly>
                           @endif
                        </div>
                        </div>
                        <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Action Taken :</label>
                            <input type="test" class="form-control" value="{{$ticketview->elaborate_problems ?? ''}}" placeholder=" Action Taken" name="elaborate_problems" readonly>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Support Actions :</label>
                                <input type="test" class="form-control" value="{{$ticketview->support_actions ?? ''}}" placeholder="Support Actions" name="support_actions" readonly>
                            </div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="exampleInputPassword1">Final Redressal :</label>
                                <input type="test" class="form-control" value="{{$ticketview->final_resolution ?? ''}}" placeholder="Final Resolution" name="final_resolution" readonly>
                            </div>
                            </div>
                            </div>


                     
                        <?php if($ticket[0]->status == 2){?>
                        

                            <div class="row">
                                <div class="col-md-12"> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date Of Closure :</label>
                                    <input type="text" class="form-control" value="{{$ticketview->date_Of_closure ?? ''}}" placeholder="Date Of Closure" name="date_Of_closure" readonly>
                                </div>
                                </div>
                                </div>  
                        

                        <?php }else{ ?>

                            <div class="row">
                                <div class="col-md-12"> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date Of Action :</label>
                                    <input type="text" class="form-control" value="{{$ticketview->created_at ?? ''}}" placeholder="Date Of Closure" name="date_Of_closure" readonly>
                                </div>
                                </div>
                                </div> 

                         <?php } ?> 
                    </div>
					
				
				<?php } ?>

            	
                    
            </div>
           
        </div>
    </div>
</div>
						
</div>
					
				</div>
			
				
			

	</main>


<?php } ?>
	
	
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\ticket_status;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function ticket_view(){
        $ticket = ticket::latest()->get();
        return view('raise_ticket', compact('ticket'));
    }


    public function ticket_full_view($id){

        $ticket = DB::table('tickets')
        ->join('registers', 'tickets.user_id', '=', 'registers.id')
        ->where('tickets.id' , $id)
        ->select('tickets.*','registers.email','registers.contact','registers.sign_on','registers.pcc')
		->get();
		
		
		
		 $ticket_view = DB::table('ticket_statuses')
        ->where('ticket_statuses.ticket_id' , $id)
		->select('ticket_statuses.*')->latest()->first();

        return view('ticket_full_view', compact('ticket_view', 'ticket'));

    }
	
	
	    public function ticket_full_summary($id){

        $ticket = DB::table('tickets')
        ->join('registers', 'tickets.user_id', '=', 'registers.id')
        ->where('tickets.id' , $id)
        ->select('tickets.*','registers.email','registers.contact','registers.sign_on','registers.pcc')
		->get();
		
		
		 $ticket_summary = DB::table('ticket_statuses')
        ->where('ticket_statuses.ticket_id' , $id)
		->select('ticket_statuses.*')->get();

        return view('ticket_full_summary', compact('ticket_summary', 'ticket'));

    }
	
	

    public function ticket_store(Request $req){
		
        ticket::insert([

            'user_id' => $req->user_id,
            'need_assistance' => $req->need_assistance,
            'comment' => $req->comment,
            'ticket_date' => Carbon::now(),
            'created_at' => Carbon::now(),
    
        ]);
    
    
        return response()->json([
            'success' => 'Ticket Added Successfully',
            'status' => 201
        ]);
    }

    public function ticket_status(Request $request, $user_id, $headers = 201){
        $user = $request->user_id;
       $ticket_status = DB::table('ticket_statuses')
	   ->where('ticket_statuses.user_id', '=', $user)
       ->select('ticket_statuses.*')->latest()->get();

        return response()->json($ticket_status, $headers);

    }
	
	
	// ticket view api
	
	
	
	
	public function ticket_detail(Request $request, $id, $headers = 201){
    $id = $request->id;
	
    if(isset($id)){
        $ticketdetail = DB::table('ticket_statuses')
          ->where('ticket_statuses.ticket_id', '=', $id)
		  ->select('ticket_statuses.id','ticket_statuses.user_id','ticket_statuses.ticket_id',
		  'ticket_statuses.consultant_first_name','ticket_statuses.consultant_last_name',
		  'ticket_statuses.consultant_email','ticket_statuses.contact',
		  'ticket_statuses.support_actions','ticket_statuses.final_resolution','ticket_statuses.elaborate_problems',
		  'ticket_statuses.note','ticket_statuses.date_Of_closure','ticket_statuses.created_at',
		  \DB::raw('(CASE 
                    WHEN ticket_statuses.status = "0" THEN "Open" 
                        ELSE "WIP" 
                        END) AS status'))->latest()->first();
		 

   
   } else{
		
		$ticketdetail = ['error', 400];
	}
	
	return response()->json($ticketdetail, $headers);

}
	
	
	
	

    public function ticket_show($id){
        $ticket = ticket::findOrFail($id);
        return view('ticket_view', compact('ticket'));
    }

    public function ticket_update(Request $req){

        $req->validate([
            //'user_id' => 'required',
            //'ticket_id' => 'required',
            'consultant_first_name' => 'required',
            'consultant_last_name' => 'required',
            'consultant_email' => 'required',
            'contact' => 'required',
            'support_actions' => 'required',
            'final_resolution' => 'required',
            //'status' => 'required',
            'elaborate_problems' => 'required',
        ]);


        $ticket_id = $req->ticket_id;


        ticket_status::insert([

            'admin_id' => Auth::user()->email,
            'user_id' => $req->user_id,
            'ticket_id' => $req->ticket_id,
            'consultant_first_name' => $req->consultant_first_name,
            'consultant_last_name' => $req->consultant_last_name,
            'consultant_email' => $req->consultant_email,
            'contact' => $req->contact,
            'support_actions' => $req->support_actions,
            'final_resolution' => $req->final_resolution,
            'status' => $req->status,
            'elaborate_problems' => $req->elaborate_problems,
			'note' => $req->note,
            'date_Of_closure' => $req->date_Of_closure,
            'created_at' => Carbon::now(),
    
        ]);
    
	 
			// for mail
			
		//dd($useremail);	
			\Mail::send('ticketstatus_mail', array(
        
        'final_resolution' => $req->get('final_resolution'),
        'note' => $req->get('note'),
  
       
    ), function($message) use ($req){
		
	    $useremail= $req->useremail;
        $message->from('system.engineer@gmail.com','Galrewards');
        $message->to($useremail)->subject('Galrewards Ticket Status');
		
 });
			
			
			
			
			//end mail
	
        

        if ($ticket_id) {

            ticket::findOrFail($ticket_id)->update([

                'status' => $req->status,
        
            ]);
			
	
	
            
            $notification = array(
                'message' => 'Ticket Status Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('view.ticket')->with($notification);

        } else {

            $notification = array(
                'message' => 'error',
                'alert-type' => 'error'
            );
        }
        
    }
 
}

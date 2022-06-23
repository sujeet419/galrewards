<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\country;
use App\Models\PCC;
use Carbon\Carbon;
use Excel;
use Auth;
use PDF;
use App\Imports\RegisterImport;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
// User Registration View //

public function regview(){

    $reg = register::latest()->get();
	$con = DB::table('countries')
		->select('countries.country_name_en')
		->get();
		
$pcc = PCC::where('status', 1)->orderBy('agency_name', 'ASC')->get(); 
		
    return view('user_registration', compact('reg','con','pcc'));

}

// user registration store //

public function regstore(Request $req){

     $req->validate([
         'first_name' => 'required',
         'last_name' => 'required',
         'email' => 'required',
       
         'date_of_birth' => 'required',
         'contact' => 'required',
         'pcc' => 'required',
         'sign_on' => 'required',

     ]);
	 
	
	  $val7= $req->pcc.'-'.$req->sign_on;
	 
	  $users = DB::table('registers')->where('guserid', $val7)->first();
  
		if ($users === null) {
		
		   register::insert([

        'admin_id' => Auth::user()->email,
        'first_name' => $req->first_name,
        'last_name' => $req->last_name,
        'email' => $req->email,
        'password' => $req->first_name.'@123',
        'country_name' => $req->country_name,
        'date_of_birth' => $req->date_of_birth,
        'contact' => $req->contact,
        'points' => 0,
        'closing_bal' => 0,
		'agency_group' => $req->agency_group,
        'pcc' => $req->pcc,
        'sign_on' => $req->sign_on,
		'guserid' =>$req->pcc.'-'.$req->sign_on,
        'source' => 1,
        'created_at' => Carbon::now(),

    ]);
    $mail = $req->email;
    $name = $req->first_name;

    \Mail::send('email_register', array(
        
        'name' => $req->get('first_name'),
        'email' => $req->get('email'),
        'password' => $req->first_name.'@123',
       
    ), function($message) use ($req){
        //$message->$req->get('first_name');
        //$message->from($req->first_name);
        $message->from('system.engineer@gmail.com','Galrewards');
        $message->to( $req->email, $req->first_name)->subject('Galrewards Registration ');
    });





    $notification = array(
        'message' => 'User Added Successfully',
        'alert-type' => 'success'
    );

        return redirect()->back()->with($notification);
		
		} else {
		
		$notification = array(
        'message' => 'User already exist',
        'alert-type' => 'error'
    );

        return redirect()->back()->with($notification);
		
		}


}

// import user registration excel //

public function import(Request $req)
{
    $req->validate([
        'file' => 'required|mimes:csv,txt'
    ]);
		
	
	 $rows = Excel::toArray(new RegisterImport, $req->file('file'));
	 
	 $email_id = array_column($rows[0], 'email');
	 $pcc = array_column($rows[0], 'pcc');
	 $sign_on = array_column($rows[0], 'sign_on');
	 
	
	 
	 $users = register::where('sign_on', '=', $sign_on)->orwhere('sign_on', '=', $sign_on)->first();
	 //dd($users);
	 
	 if(count(array_unique($sign_on, SORT_REGULAR)) < count($sign_on)) {
		
			$notification = array(
                'message' => 'Duplicate entry found',
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
			
	 }
	 
	 else if ($users != null) {
			
			$notification = array(
                'message' => 'Duplicate entry found',
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
			
		}
	 
	 else {
		 
		 
		     Excel::import(new RegisterImport, $req->file);
//  ------------------------------------------------- Send Email With Excel Upload -------------------------//
    $email = DB::table('registers')
    ->whereDate('registers.created_at', Carbon::now())
    ->select('registers.email', 'registers.points as point', 'registers.first_name', 'registers.password')
    ->get();

        //dd($email);

        foreach ($email as $key => $value) {

            $input['email'] = $value->email;
            $input['first_name'] = $value->first_name;
            $input['point'] = $value->point;
            $input['password'] = $value->password;

            \Mail::send('email_register', array(

                   'name' => $input['first_name'],
                   'email' => $input['email'],
                   'password' => $input['password'],
    
               
            ), function($message) use ($input){
                //$message->$req->get('first_name');
                //$message->from($req->first_name);
                $message->from('system.engineer@gmail.com','Galrewards');
                $message->to($input['email'], $input['first_name'])->subject('Galrewards Registration');
            });
           
        }
//----------------------------------------------------------End ----------------------------------------------//


    $notification = array(
        'message' => 'Excel Import Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('view.reg')->with($notification);
		 
		 
		 
		 
	 }
    
}

public function user_edit($id){

    $user = register::find($id);
        if($user){
        return response()->json([
            'user' => $user,
        ]);
    }
        else{
            return response()->json([
                'error' => 'User not found',
            ]); 
        
    }
}

public function regupdate(Request $req){

    // $req->validate([
    //     'first_name' => 'required',
    //     'last_name' => 'required',
    //     'email' => 'required',
    //     'password' => 'required',
    //     'date_of_birth' => 'required',
    //     'contact' => 'required',
    //     'pcc' => 'required',
    //     'sign_on' => 'required',

    // ]);
    $id = $req->user_id;
    register::findOrFail($id)->update([

        'admin_id' => Auth::user()->email,
        'first_name' => $req->first_name,
        'last_name' => $req->last_name,
        'country_name' => $req->country_name,
        'contact' => $req->contact,
		'end_date' => $req->end_date,
    ]);

    $notification = array(
        'message' => 'User Details Updated Successfully',
        'alert-type' => 'success'
    );

        return redirect()->back()->with($notification);
}

//

// User Point Transfer	



public function usertransfer(){

   $pointtransfers = DB::table('point_transfers')->orderBy('id', 'ASC')->get();
		
    return view('user_transferindex', compact('pointtransfers'));
}

	
public function usertransferview(){

    $myString = '0';
    $myArray = explode(',', $myString);
	
   $guserid = register:: whereNotIn('closing_bal', $myArray)->orderBy('guserid', 'ASC')->get();
   $guseridall = register::orderBy('guserid', 'ASC')->get();
		
    return view('user_transferpoint', compact('guserid','guseridall'));
}


public function getpointfromuser($guserid){

$guserid = $guserid;

$user_data = DB::table('registers')
    ->where('registers.guserid', $guserid)
    ->select('registers.first_name','registers.email','registers.country_name','registers.closing_bal' )
    ->get();

$user_name = $user_data[0]->first_name;
$email = $user_data[0]->email;
$country = $user_data[0]->country_name;
$closing_bal = $user_data[0]->closing_bal;
	
	
        return response()->json([
	        'email' => $email,
		   'country' => $country,
	      'closing_bal' => $closing_bal
		]);

    

}

//userpointtransfer





 public function userpointtransfer(Request $request){
	 
  
  $transfer_type = $request->transfer_type;
  $from_user = $request->from_user;
  $touser = $request->touser;
   $point_added1 = $request->point_added1;
   $point_added2 = $request->point_added2;
    $update_reason = $request->update_reason; 
	

 
	  //dd($insertid);
	  if($transfer_type == 1){
		  
		
		 $insertid=  DB::table('point_transfers')->insert(
	 
	 array('transfer_type' => $transfer_type,'from_user' => $from_user,'fuser_point' => $point_added1,'transfer_reason' => $update_reason)   
	   
	  );
		
         $takepreviouspoint= 0;
		 
			DB::table('registers')
                 ->where('guserid', $from_user)
                 ->update(array('closing_bal' => $takepreviouspoint));	 
		  
	  }else{
		  
		  
		 $insertid=  DB::table('point_transfers')->insert(
	 
	 array('transfer_type' => $transfer_type,'from_user' => $from_user,'touser' => $touser,'fuser_point' => $point_added1,'tuser_point' => $point_added2,'transfer_reason' => $update_reason)   
	   
	  );  
		  
	 $takepreviouspoint= 0;
		 
			DB::table('registers')
                 ->where('guserid', $from_user)
                 ->update(array('closing_bal' => $takepreviouspoint));		  
		

		
		 $transferpoint= $point_added1 + $point_added2;
		 
			DB::table('registers')
                 ->where('guserid', $touser)
                 ->update(array('closing_bal' => $transferpoint));	
		  
		  
	  }
	  
	  
 
 $notification = array(
            'message' => 'Point Transfer Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('usertransfer')->with($notification);
 
 
 }


// for account summay

public function account_summary(Request $request)
{
    $title="Account Summary";
	$email = register::orderBy('email', 'ASC')->get();
    return view('account_summary', compact('title','email'));

}


public function getaccount_summary(Request $request)
{
 $title="Account Summary";
 

    $from_date =$request->from_date;
	$to_date=$request->to_date;
	
	$from_date1= date('d-m-Y', strtotime($from_date));
    $to_date1= date('d-m-Y', strtotime($to_date));
	
$get_date1 = Carbon::createFromFormat('d-m-Y', $from_date1)->format('M-y');
$get_date2 = Carbon::createFromFormat('d-m-Y', $to_date1)->format('M-y');
   
    $email= $request->guserid; 

    $newdate1= date('Y-m-d H:i:s', strtotime($from_date));
    $newdate2= date('Y-m-d H:i:s', strtotime($to_date));

    $dataval = register::select('closing_bal','guserid','email')
    ->where('guserid','=', $email)
    ->first();

     $closingbal = $dataval->closing_bal;
	 $guserid = $dataval->guserid;
	 $useremail = $dataval->email;
	 
	 //dd($newdate1);

    //SELECT * FROM `bonus_points` WHERE (created_at BETWEEN '2022-11-15 00:00:00' AND '2022-10-15 00:00:00');
    //2022-11-15 00:00:00
  if(isset($from_date)){

    $pointsummary = DB::select("SELECT  * FROM points WHERE created_at >= '$newdate1' and created_at <= '$newdate2' and guserid = '$guserid' ");  

	$bonuspointssummary = DB::select("SELECT  * FROM bonus_points WHERE bonus_date >= '$get_date1' and bonus_date <= '$get_date2' and guserid = '$guserid' "); 

    $pointusedsummary = DB::select("SELECT  * FROM orders WHERE date >= '$from_date1' and date <= '$to_date' and email = '$useremail' ");
	
	
	//dd($pointusedsummary);
	

  return view('getaccountsummary', compact('pointsummary','bonuspointssummary','pointusedsummary','from_date','to_date','title','closingbal','guserid'));

  }else{

    $accountsummary[]="";
    return view('accountsummary',compact('accountsummary','title'));

  }

    

}

 public function accountgeneratePDF(Request $request)
    {
     
	    $data = [
            'title' => 'Account Summary',
			 'date' => date('m/d/Y')
            
        ];
	 
	 
	 $title="Account Summary";

    $from_date =$request->from_date;
	$to_date=$request->to_date;
	
	$from_date1= date('d-m-Y', strtotime($from_date));
    $to_date1= date('d-m-Y', strtotime($to_date));
	
	$get_date1 = Carbon::createFromFormat('d-m-Y', $from_date1)->format('M-y');
$get_date2 = Carbon::createFromFormat('d-m-Y', $to_date1)->format('M-y');
	
    $email= $request->guserid; 

    $newdate1= date('Y-m-d H:i:s', strtotime($from_date));
    $newdate2= date('Y-m-d H:i:s', strtotime($to_date));

    $dataval = register::select('closing_bal','guserid','email')
    ->where('guserid','=', $email)
    ->first();

     $closingbal = $dataval->closing_bal;
	 $guserid = $dataval->guserid;
	 $useremail = $dataval->email;
	 
		
	 $pointsummary = DB::select("SELECT  * FROM points WHERE created_at >= '$newdate1' and created_at <= '$newdate2' and guserid = '$guserid' ");  

	$bonuspointssummary = DB::select("SELECT  * FROM bonus_points WHERE bonus_date >= '$get_date1' and bonus_date <= '$get_date2' and guserid = '$guserid' "); 

    $pointusedsummary = DB::select("SELECT  * FROM orders WHERE date >= '$from_date1' and date <= '$to_date1' and email = '$useremail' ");
	
		//$pdf = PDF::loadView('frontend.pages.accountsummary', $data);
         $pdf = PDF::loadView('myaccountPDF', compact('pointsummary','bonuspointssummary','pointusedsummary','from_date','to_date','closingbal','data','email'));
        return $pdf->download('accountsummary.pdf');
    }






}

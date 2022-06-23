<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bonus_point;
use App\Models\register;
use App\Models\Agencygroup;
use Carbon\Carbon;
use Excel;
use App\Imports\BonusPointImport;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;

class Bonus_Point_Controller extends Controller
{
// bonus point view //

    public function bonusview(){
        //$bouns = bonus_point::latest()->get();

        $bouns = DB::table('bonus_points')
            ->join('registers', 'bonus_points.guserid', '=', 'registers.guserid')
            ->select('bonus_points.*','registers.closing_bal','registers.country_name')
            ->get();

        $email = register::orderBy('email','ASC')->get();
		//dd($email);
		
		
		$country = DB::table('countries')
		->select('countries.country_name_en')
		->get();
		
        return view('bonus_point', compact('bouns','email','country'));
    }

    public function bonus_store(Request $req){
		
		$req->validate([
        'user_email' => 'required',
        'bonus_point' => 'required',
        'bonus_reason' => 'required',
      ]);

		$date = carbon::now();
        $get_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M-y');
	  
	  
        bonus_point::insert([

            'guserid' => $req->user_email,
            'admin_id' => Auth::user()->email,
            'bonus_point' => $req->bonus_point,
            'bonus_reason' => $req->bonus_reason,
			'bonus_date' => $get_date,
            'source' => 0,
            'bonus_status' => 1,
            'update_status' => 0,
            'created_at' => Carbon::now(),

        ]);


// for transaction histroy

/* $trans_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');

$getdata = register::where('guserid', $req->user_email)->first();
$getcurrentcl= $getdata->closing_bal + $req->bonus_point ;


DB::table('transaction_histories')->insert([
    'guserid' => $req->user_email, 
    'bonus_points' => $req->bonus_point,
    'transaction_date' => $trans_date,
    'closing_balance' => $getcurrentcl,
    'created_at' => Carbon::now()
  ]); */


        $notification = array(
            'message' => 'User Bonus Point Added Successfully',
            'alert-type' => 'success'
        );

            return redirect()->back()->with($notification);
    }


    public function import(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
		
		
		$rows = Excel::toArray(new BonusPointImport, $req->file('file'));
		
		
		$data = DB::table('bonus_points')->get()->groupBy('bonus_date')->toArray();
		$response = array_keys($data);
		
		 $months = array_column($rows[0], 'bonus_date');
	 
		 $email_id = array_column($rows[0], 'user_email');
		 
		 $pcc = array_column($rows[0], 'pcc');
		 $sign_on = array_column($rows[0], 'sign_on');
		 
		 if(count(array_unique($sign_on, SORT_REGULAR)) < count($sign_on)) {
			
				$notification = array(
					'message' => 'Duplicate entry found',
					'alert-type' => 'error'
				);
				
				return redirect()->back()->with($notification);
				
		 }
		 else {
			 
			 $array3 = [];
        foreach ($response as $value) {
            if (in_array($value, $months)) {
                $array3[] = $value;
            }
        }
		
		if( sizeof($array3) == 0 ){

            Excel::import(new BonusPointImport, $req->file);

            $notification = array(
                'message' => 'Excel Import Successfully',
                'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
        }else{

            $notification = array(
                'message' => 'Data Already Exists',
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
        }
			 
    }
	
	}



    public function bonuspointblanceupdate(Request $request){

       
		
		//dd($request->strIds);
        $success_count = 0;
        $error_count = 0;
        $data = explode(',',$request->ids);
      //  dd($data);
        if(is_array($data) && !empty($data)){
            foreach($data as $val){
                $guserid = explode('__',$val)[0];
                $point = explode('__',$val)[1];
                $bonus_point = explode('__',$val)[2];
                $bonus_reason = explode('__',$val)[3];
                $update = register::where('guserid', $guserid)->first();
                $update->closing_bal = $point;
                $update->save();
                if($update->save()){

//  ------------------------------------------------- Send Email With Excel Upload -------------------------//

    $user_data = DB::table('registers')
    ->join('bonus_points', 'registers.guserid', '=', 'bonus_points.guserid')
    ->where('bonus_points.guserid', $guserid)
    ->select('registers.first_name','registers.email', 'bonus_points.bonus_point', 'bonus_points.bonus_reason')
    ->get();

    $user_name = $user_data[0]->first_name;
   // $points = $user_data[0]->bonus_point;
    //$reason = $user_data[0]->bonus_reason;
     $email = $user_data[0]->email;
	

   // dd($email);

        $input['user_email'] = $email;
        $input['first_name'] = $user_name;
        $input['bonus'] = $bonus_point;
        $input['bonus_reason'] = $bonus_reason;

        \Mail::send('bonus_mail', array(

               'user_name' => $input['first_name'],
               'bonus_point' => $input['bonus'],
               'bonus_reason' => $input['bonus_reason'],

           
        ), function($message) use ($input){
            $message->from('system.engineer@gmail.com','Galrewards');
            $message->to($input['user_email'], $input['first_name'])->subject('Galrewards Bonus Points');
        });
       
//----------------------------------------------------------End ----------------------------------------------//
            DB::table('bonus_points')
            ->where('guserid', $guserid)
            ->update(array('update_status' => 1));


// for transaction histroy
$date = carbon::now();
$trans_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');

$getdata = register::where('guserid', $guserid)->first();
$getcurrentcl= $getdata->closing_bal ;


DB::table('transaction_histories')->insert([
    'guserid' => $guserid, 
    'bonus_points' => $input['bonus'],
    'transaction_date' => $trans_date,
    'closing_balance' => $getcurrentcl,
    'created_at' => Carbon::now()
  ]);





            $success_count++;

                }
                else{
                    $error_count++;
                }
            }
        }
        if($success_count == count($data)){
            response()->json(array('status'=>'true','msg'=>''));
        }
        elseif($error_count == count($data)){

        }
        elseif($success_count > 0 && $success_count < count($data)){

        }
        //dd($request->all());

        return response()->json(['status' => '200', 'email' => $email, 'bonus_point' => $bonus_point]);

    }
	
	
	
	
	    public function clear_bonuspoints(){

        $getmonthdata = DB::table('bonus_points')
        ->where('bonus_points.update_status', 0)
        ->get();

        if ( sizeof($getmonthdata) == 0 ) {

    $notification = array(
        'message' => ' You cannot clear the record as the record is updated',
        'alert-type' => 'error'
    );

    return redirect()->back()->with($notification);

        } else {


    $getmonthdata = DB::table('bonus_points')
    ->where('bonus_points.update_status', 0)
    ->delete();

    $notification = array(
        'message' => 'Data Clear Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
        }

    
}


// ----------------------ajax-----------------------------------------------------------------

public function get_email_balance(){

    $bouns = DB::table('bonus_points')
    ->join('registers', 'bonus_points.guserid', '=', 'registers.guserid')
    ->select('bonus_points.guserid','registers.closing_bal')
    ->get();

    return response()->json([
        'bouns' => $bouns,
    ]);
}


// User Bonus Point Update	
	
public function userbonuspointview(){

   $guserid = register::orderBy('guserid', 'ASC')->get();
   $agency = Agencygroup::get();
		
    return view('user_bonuspointupdate', compact('guserid','agency'));
}
	

public function getbonuspoint($guserid, $ac_date){

$guserid = $guserid;

$date = $ac_date;
$get_date = Carbon::createFromFormat('Y-m', $ac_date)->format('M-y');

$year = Carbon::createFromFormat('Y-m', $date)->format('Y');
$month = Carbon::createFromFormat('Y-m', $date)->format('m');



$user_data = DB::table('registers')
    ->where('registers.guserid', $guserid)
    ->select('registers.first_name','registers.email','registers.country_name' )
    ->get();

 $user_name = $user_data[0]->first_name;
$email = $user_data[0]->email;
$country = $user_data[0]->country_name;

	$points = DB::table('bonus_points')
	->where('bonus_points.guserid', $guserid)
	->where('bonus_points.bonus_date', '=', $get_date)
    ->select('bonus_points.bonus_point','bonus_points.guserid')
	->get();
	
	
	 $closing_bal = DB::table('registers')
	->where('registers.guserid', $guserid)
    ->select('registers.closing_bal')
	->get();
	
	
        return response()->json([
	      'points' => $points,
		   'email' => $email,
		   'country' => $country,
	      'closing_bal' => $closing_bal
		]);

    

}

 public function userbonuspointupdate(Request $request){

  $guserid = $request->guserid;
  $old_point = $request->point_added;
  $update_point = $request->update_point;
   $update_reason = $request->update_reason;
   $closing_bal = $request->closing_bal;
   
   
      if($old_point==0){
	   
	 $notification = array(
            'message' => 'This user have not any bonus point in this month.you can not update',
            'alert-type' => 'error'
        );   
   }else{
   
   
     
	 $insertid=  DB::table('user_bonuspointupdates')->insert(
	 
	 array('guserid' => $guserid,'old_point' => $old_point,'update_point' => $update_point,'update_reason' => $update_reason)   
	   
	  );
	  
	  //dd($insertid);
	  if($insertid == true){
		  
		DB::table('bonus_points')
                 ->where('guserid', $guserid)
                 ->update(array('bonus_point' => $update_point)); 
				 

         $takepreviouspoint= $closing_bal - $old_point;
		 
		 $givenewpoint= $takepreviouspoint + $update_point;
		
		 
			DB::table('registers')
                 ->where('guserid', $guserid)
                 ->update(array('closing_bal' => $givenewpoint));	 
		  
	  
	   $notification = array(
            'message' => 'Point Update Successfully',
            'alert-type' => 'info'
        );
	  
	  }
	  
   }

 

   return redirect()->route('userbonuspointview')->with($notification);
 
 
 }




}

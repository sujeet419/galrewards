<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\point;
use App\Models\register;
use App\Models\Agencygroup;
use App\Models\country;
use Carbon\Carbon;
use Excel;
use App\Imports\PointsImports;
use Illuminate\Support\Facades\DB;


class PointController extends Controller
{
// view points //

public function pointview(){

    $data = DB::table('points')->get()->groupBy('created_at')->toArray();
    $response = array_keys($data);

    $timemanage = [];

    foreach ($response as $value) {

        $timemanage[] = Carbon::parse($value)->toTimeString(); 

    }


    foreach ($timemanage as $value) {
    $points = DB::table('points')
        ->join('registers', 'points.guserid', '=', 'registers.guserid')
            ->whereTime('points.created_at', '>=',  $value)
            ->select('points.*','registers.closing_bal','registers.country_name')
            ->get();
    }
	
	$country = DB::table('countries')
		->select('countries.country_name_en')
		->get();
	
	
	if(isset($points)){
	 return view('point',compact('points','country'));	
	}
	else{
	return view('point');	
	}

   

}
// import excel file //
    public function importpoints(Request $req)
    {
        $req->validate([
             'file' => 'required|mimes:csv,txt'
        ]);

        $rows = Excel::toArray(new PointsImports, $req->file('file'));
		
		

        $data = DB::table('points')->get()->groupBy('point_date')->toArray();
        $response = array_keys($data);

        $months = array_column($rows[0], 'point_date');
        $years = array_column($rows[0], 'year');
		
		//$email_id = array_column($rows[0], 'email');
		
		 $pcc = array_column($rows[0], 'pcc');
		 $sign_on = array_column($rows[0], 'sign_on');
		 
		
		
		if(count(array_unique($sign_on, SORT_REGULAR)) < count($sign_on)) {
    
		$notification = array(
                'message' => 'Excel has Duplicate entry found',
                'alert-type' => 'error'
            );
            
            return redirect()->back()->with($notification);
			} else {
		        
		$array3 = [];
        foreach ($response as $value) {
            if (in_array($value, $months)) {
                $array3[] = $value;
            }
        }
        
        if( sizeof($array3) == 0 ){

            Excel::import(new PointsImports, $req->file);

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


    public function clear_points(){

        $getmonthdata = DB::table('points')
        ->where('points.status', 0)
        ->get();

        if ( sizeof($getmonthdata) == 0 ) {

    $notification = array(
        'message' => ' Data Not Clear Because User Points Already Updated',
        'alert-type' => 'error'
    );

    return redirect()->back()->with($notification);

        } else {


    $getmonthdata = DB::table('points')
    ->where('points.status', 0)
    ->delete();

    $notification = array(
        'message' => 'Data Clear Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
        }

    
}

    public function pointblanceupdate(Request $request){
        $success_count = 0;
        $error_count = 0;
        $data = request('points');
        if(is_array($data) && !empty($data)){
            foreach($data as $key => $item) {

           // $item = 0;


                 $status = DB::table('points')
                             ->where('guserid', $item['guserid'])
                             ->where('point_date', $item['month_year'])
                             ->get('points.status');
                 $get_status = $status[0]->status;
 
                //dd($get_status);
                if($get_status == 0){

                            
                 DB::table('points')
                 ->where('guserid', $item['guserid'])
                 ->update(array('status' => 1));


                 DB::table('registers')
                 ->where('guserid', $item['guserid'])
                 ->update(array('closing_bal' => $item['closing_bal']));


 // for transaction histroy
 $date = carbon::now();
 $trans_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
 
 $getdata = register::where('guserid', $item['guserid'])->first();
 $getcurrentcl= $getdata->closing_bal ;


 $getpointd = DB::table('points')
 ->where('guserid', $item['guserid'])
 ->where('point_date', $item['month_year'])
 ->get('points.points');
$get_points = $getpointd[0]->points;

 
 
 DB::table('transaction_histories')->insert([
     'guserid' => $item['guserid'], 
     'points' => $get_points,
     'transaction_date' => $trans_date,
     'closing_balance' => $getcurrentcl,
     'created_at' => Carbon::now()
   ]); 


//------------------------------------------------------Send Email With Excel Upload -----------------------//
     $user_data = DB::table('points')
     ->join('registers', 'points.guserid', '=', 'registers.guserid')
     ->where('points.point_date', $item['month_year'])
     ->select('points.guserid', 'points.points as point', 'registers.first_name','registers.email')
     ->get();

     $user_name = $user_data[0]->first_name;
     $points = $user_data[0]->point;
    $email = $user_data[0]->email;
 
             $input['email'] = $email;
             $input['first_name'] = $user_name;
             $input['point'] = $points;
 
             \Mail::send('points_mail', array(
 
                    'first_name' => $input['first_name'],
                    'point' =>  $input['point'],
     
                
             ), function($message) use ($input){
                 $message->from('system.engineer@gmail.com','Galrewards');
                 $message->to($input['email'], $input['first_name'])->subject('Galrewards Points');
             });

 
 //------------------------------------------------------------------End -----------------------------------//

                $success_count++;
            
                }
                
                
                else{

                   $error_count++;

                }
           
            }
        }
		
			 if($data == NULL) {
            $notification = array(
                'message' => 'No Record Found',
                'alert-type' => 'error'
            );
        
            return redirect()->back()->with($notification);
        }
		
        if ($success_count == count($data)) {
            $notification = array(
                'message' => 'Points Updated Successfully',
                'alert-type' => 'success'
            );
        
            return redirect()->back()->with($notification);
			
        } else if($error_count == count($data)) {
            $notification = array(
                'message' => 'Points Already Updated',
                'alert-type' => 'error'
            );
        
            return redirect()->back()->with($notification);
        }
        


    }
	
	
// User Point Update	
	
public function userpointview(){

   $guserid = register::orderBy('guserid', 'ASC')->get();
   $agency = Agencygroup::get();
   $country = country::get();
		
    return view('user_pointupdate', compact('guserid','agency','country'));
}

public function get_agency($agency){

    $agency_name = register::where('agency_group', $agency)->get();

    return response()->json($agency_name);

}
	

public function getpoint($guserid, $ac_date){

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

	$points = DB::table('points')
	->where('points.guserid', $guserid)
	->where('points.point_date', '=', $get_date)
    ->select('points.points','points.guserid')
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

 public function userpointupdate(Request $request){


   $validatedData = $request->validate( [
                'update_reason.required' => 'Update Reason is required',
                'update_point.required' => 'Update Point is required'
            ]);
  
  
  $guserid = $request->guserid;
  $old_point = $request->point_added;
  $update_point = $request->update_point;
   $update_reason = $request->update_reason;
   $closing_bal = $request->closing_bal;
   
  
   
   if($old_point==0){
	   
	 $notification = array(
            'message' => 'This user have not any point in this month.you can not update',
            'alert-type' => 'error'
        );   
   }else{
   
   
 
	 $insertid=  DB::table('user_pointupdates')->insert(
	 
	 array('guserid' => $guserid,'old_point' => $old_point,'update_point' => $update_point,'update_reason' => $update_reason)   
	   
	  );
	  
	  //dd($insertid);
	  if($insertid == true){
		  
		DB::table('points')
                 ->where('guserid', $guserid)
                 ->update(array('points' => $update_point)); 
				 

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
	  
	  

        return redirect()->route('userpointview')->with($notification);
 
 
 }

	
	
	
}

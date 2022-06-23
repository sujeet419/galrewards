<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\register;
use App\Models\acbalance;
use App\Models\product_history;
use App\Models\point;
use App\Models\bonus_point;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;

use Auth;

class ac_balancecontroller extends Controller
{
// acount balance view //

public function acview(){

        $email = register::orderBy('email', 'ASC')->get();
		
    return view('account_balance', compact('email'));
}


public function getpoint($email, $ac_date){

$email = $email;
//$date = date_format($ac_date,"M-y");
//$date = DB::raw("(DATE_FORMAT($ac_date,'M-y'))");
$date = $ac_date;
$get_date = Carbon::createFromFormat('Y-m', $ac_date)->format('M-y');

$year = Carbon::createFromFormat('Y-m', $date)->format('Y');
$month = Carbon::createFromFormat('Y-m', $date)->format('m');



$user_data = DB::table('registers')
    ->where('registers.guserid', $email)
    ->select('registers.first_name','registers.email', )
    ->get();

    $user_email = $user_data[0]->email;




    //$subcat = register::with('achistory_point','points_added','b_point')->where('id',$email_id)->first();
    // $registrartion = register::where('email' , $email_id)->value('points');
    // $prhistory = product_history::where('email' , $email_id)->value('points');
    // $point = point::where('email' , $email_id)->value('points');
    // $bonuspoint = bonus_point::where('user_email' , $email_id)->value('bonus_point');

    // $points = DB::table('points')
    // ->leftJoin('registers', 'registers.email', '=', 'points.email')
    // ->leftJoin('product_histories', 'product_histories.email', '=', 'points.email')
    // ->leftJoin('bonus_points', 'bonus_points.user_email', '=', 'points.email')
    // ->where('points.email', $email_id)
    // ->select('points.points as point','product_histories.points','bonus_points.bonus_point','registers.closing_bal','registers.points as opening_bal')
    // ->get();

    // $points = DB::table('points')
    // ->leftJoin('registers', 'registers.email', '=', 'points.email')
    // ->leftJoin('product_histories', 'product_histories.email', '=', 'points.email')
    // ->leftJoin('bonus_points', 'bonus_points.user_email', '=', 'points.email')
    // ->where('points.email', $email)
    // ->whereMonth('points.created_at', '=', date($month))
    // ->whereYear('points.created_at', '=', date($year))
    // ->select('points.points as point','product_histories.points','bonus_points.bonus_point','registers.closing_bal','registers.points as opening_bal')
    // ->get();
	
	  // $points = DB::table('registers')
    // ->leftJoin('points', 'points.email', '=', 'registers.email')
    // ->leftJoin('product_histories', 'product_histories.email', '=', 'registers.email')
    // ->leftJoin('bonus_points', 'bonus_points.user_email', '=', 'registers.email')
	// ->where('registers.email', $email)
    // ->whereMonth('points.created_at', '=', date($month))
    // ->whereYear('points.created_at', '=', date($year))
    // ->select('points.points as point','product_histories.points','bonus_points.bonus_point','registers.closing_bal','registers.points as opening_bal')
    // ->get();
	
	$opening_balance = DB::table('registers')
	->where('registers.guserid', $email)
	->select('registers.closing_bal')
	->get();
	
	$bonus_point = DB::table('bonus_points')
	->where('bonus_points.guserid', $email)
	->where('bonus_points.bonus_date', '=', $get_date)
	->select(DB::raw("SUM(bonus_points.bonus_point) as bonus_point") )
    //->select('bonus_points.bonus_point')
	->get();
	
	$points = DB::table('points')
	->where('points.guserid', $email)
	->where('points.point_date', '=', $get_date)
    ->select('points.points')
	->get();
	
	$Order_point = DB::table('product_histories')
	->where('product_histories.email', $user_email)
	->whereMonth('product_histories.created_at', '=', date($month))
	->whereYear('product_histories.created_at', '=', date($year))
	->sum('product_histories.subtotal');
	
	$closing_bal = DB::table('registers')
	->where('registers.guserid', $email)
    ->select('registers.closing_bal')
	->get();
	
	
	
    // if( sizeof($points) == 0 ){

        // return response()->json([
            // // 'registrartion' => $registrartion,
            // // 'prhistory' => $prhistory,
            // // 'point' => $point,
            // // 'bonuspoint' => $bonuspoint
            // //'email' => $email,
            // //'date' => $ac_date
            // 'error' => 0
        // ]);

   // }else{
        return response()->json([
		'opening_balance' => $opening_balance,
		'bonus_point' => $bonus_point,
		'points' => $points,
		'Order_point' => $Order_point,
		'closing_bal' => $closing_bal
		]);

    //}

}

public function points_get(){

    $total_points = register::orderBy('email', 'ASC')->get();
}

    public function view_point(){


        $email = register::orderBy('email', 'ASC')->get();

        return view('view_point',compact('email'));
    }

    public function view_user_point(Request $request){

        $date = $request->ac_date;
        $email = $request->email;

        $year = Carbon::createFromFormat('Y-m', $date)->format('Y');
        $month = Carbon::createFromFormat('Y-m', $date)->format('m');
       

     //return $month;   

    $points = DB::table('points')
    ->leftJoin('registers', 'registers.email', '=', 'points.email')
    ->leftJoin('product_histories', 'product_histories.email', '=', 'points.email')
    ->leftJoin('bonus_points', 'bonus_points.user_email', '=', 'points.email')
    ->where('points.email', $email)
    ->whereMonth('points.created_at', '=', date($month))
    ->whereYear('points.created_at', '=', date($year))
    ->select('points.points as point','product_histories.points','bonus_points.bonus_point','registers.closing_bal','registers.points as opening_bal')
    ->get();
    
    Session::put('userpoint' , $points);
     //echo $points[0]->point;
     return redirect()->back();

    }
}

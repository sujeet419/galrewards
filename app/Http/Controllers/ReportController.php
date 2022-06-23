<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\country;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country=country::where('country_status','1')->orderBy('id','DESC')->get();
        
        return view('report.index', compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getreport(Request $request)
    {
        
        switch ($request->get('report_type')) {

            case 'Points Redeem':
		
                $title="Points Redeem";
         
                $from_date =$request->from_date;
                $to_date=$request->to_date;
                $country_id=$request->country_id;
    
        $newdate1= date('Y-m-d', strtotime($from_date));
        $newdate2= date('Y-m-d', strtotime($to_date));

     
        $pointredeem = DB::table('transaction_histories')
        ->leftJoin('registers','registers.guserid','=','transaction_histories.guserid')
        ->selectRaw('registers.agency_group,registers.pcc,registers.first_name, sum(transaction_histories.points)+sum(transaction_histories.bonus_points) totalcreditpoint, sum(transaction_histories.order_points) redeemedpoint')
        ->where('transaction_histories.transaction_date', '>=', $newdate1)
        ->where('transaction_histories.transaction_date', '<=', $newdate2)
        ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
        //->orderBy('total','desc')
         ->groupBy('transaction_histories.guserid')
        ->get();



     
        
        return view('report.pointredeem', compact('pointredeem','from_date','to_date','title'));			   
                   
                 
            break;	



            case 'Product Wise Point':
		
                $title="Product Wise Point";
         
                $from_date =$request->from_date;
                $to_date=$request->to_date;
                $country_id=$request->country_id;
    
        $newdate1= date('Y-m-d', strtotime($from_date));
        $newdate2= date('Y-m-d', strtotime($to_date));

     
        $productwisepoint = DB::table('product_histories')
        ->leftJoin('products','products.id','=','product_histories.product_id')
        ->leftJoin('categories','categories.id','=','products.category_id')
        ->selectRaw('products.product_name_en,product_histories.subtotal,categories.categories_name_en ')
        ->where('product_histories.created_at', '>=', $newdate1)
        ->where('product_histories.created_at', '<=', $newdate2)
        ->whereRaw('find_in_set("'.$country_id.'",products.country_id)')
        //->orderBy('total','desc')
         ->groupBy('product_histories.product_id')
        ->get();

        return view('report.productwisepoint', compact('productwisepoint','from_date','to_date','title'));	
break;


//Ticket Status

case 'Ticket Status':
		
    $title="Ticket Status";

    $from_date =$request->from_date;
    $to_date=$request->to_date;
    $country_id=$request->country_id;

$newdate1= date('Y-m-d', strtotime($from_date));
$newdate2= date('Y-m-d', strtotime($to_date));


$ticketstatus = DB::table('ticket_statuses')
->leftJoin('registers','registers.id','=','ticket_statuses.user_id')
->selectRaw('ticket_statuses.*,registers.first_name,registers.agency_group, DATEDIFF(ticket_statuses.date_Of_closure , ticket_statuses.created_at) AS days')
->where('ticket_statuses.created_at', '>=', $newdate1)
->where('ticket_statuses.created_at', '<=', $newdate2)
->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
//->orderBy('total','desc')
->groupBy('ticket_statuses.id')
->get();

return view('report.ticketstatus', compact('ticketstatus','from_date','to_date','title'));	
break;

//Suppliers

case 'Suppliers':
		
    $title="Suppliers";

    $from_date =$request->from_date;
    $to_date=$request->to_date;
    $country_id=$request->country_id;

$newdate1= date('Y-m-d', strtotime($from_date));
$newdate2= date('Y-m-d', strtotime($to_date));


$suppliers = DB::table('product_histories')
->leftJoin('products','products.id','=','product_histories.product_id')
->leftJoin('categories','categories.id','=','products.category_id')
->selectRaw('product_histories.vender_info,products.product_name_en,product_histories.subtotal,categories.categories_name_en ')
->where('product_histories.created_at', '>=', $newdate1)
->where('product_histories.created_at', '<=', $newdate2)
->whereRaw('find_in_set("'.$country_id.'",products.country_id)')
//->orderBy('total','desc')
->groupBy('product_histories.product_id')
->get();

return view('report.suppliers', compact('suppliers','from_date','to_date','title'));	
break;


//Points Credited

case 'Points Credited':
		
    $title="Points Credited";

    $from_date =$request->from_date;
    $to_date=$request->to_date;
    $country_id=$request->country_id;

$newdate1= date('Y-m-d', strtotime($from_date));
$newdate2= date('Y-m-d', strtotime($to_date));


$pointscredit = DB::table('transaction_histories')
->leftJoin('registers','registers.guserid','=','transaction_histories.guserid')
->selectRaw('registers.agency_group,registers.pcc,registers.first_name, sum(transaction_histories.points)+sum(transaction_histories.bonus_points) totalcreditpoint, sum(transaction_histories.order_points) redeemedpoint')
->where('transaction_histories.transaction_date', '>=', $newdate1)
->where('transaction_histories.transaction_date', '<=', $newdate2)
->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
//->orderBy('total','desc')
 ->groupBy('transaction_histories.guserid')
 ->get();

return view('report.pointscredit', compact('pointscredit','from_date','to_date','title'));	
break;


//Agency wise Consultant Balance Point

case 'Agency wise Consultant Balance Point':
		
    $title="Agency wise Consultant Balance Point";

    $from_date =$request->from_date;
    $to_date=$request->to_date;
    $country_id=$request->country_id;

$newdate1= date('Y-m-d', strtotime($from_date));
$newdate2= date('Y-m-d', strtotime($to_date));


$agencywisebalncepoint = DB::table('registers')
->selectRaw('registers.first_name,registers.agency_group,registers.pcc,registers.closing_bal ')
->where('registers.created_at', '>=', $newdate1)
->where('registers.created_at', '<=', $newdate2)
->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
//->orderBy('total','desc')
->groupBy('registers.id')
->get();

return view('report.agencywisebalncepoint', compact('agencywisebalncepoint','from_date','to_date','title'));	
break;


		
			
			default:
                $msg = 'Something went wrong.';
				dd($msg);
    }


    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

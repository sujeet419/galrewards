<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_history;
use App\Models\register;
use App\Models\category;
use App\Models\order;
use App\Models\supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductHistoryController extends Controller
{
    public function viewproducthistory(){
        //$prhistory = product_history::latest()->get();
        $prhistory = order::latest()->get();
        return view('product_history', compact('prhistory'));
    }

    public function vieworder($invoice_no){

        $order = DB::table('product_histories')
            ->leftjoin('registers', 'product_histories.email', '=', 'registers.email')
			->leftjoin('products', 'product_histories.product_id', '=', 'products.id')
            ->select('product_histories.*','registers.closing_bal', 'products.product_name_en', 'products.category_id')
            ->where('product_histories.invoice_no', $invoice_no)
            ->latest()->get();

        $category_name = category::where('id', $order[0]->category_id)->value('categories_name_en');
			
		$supplier = DB::table('suppliers')
            ->select('suppliers.*')
            ->where('suppliers.status', 1)
            ->whereRaw('find_in_set("'.$category_name.'",suppliers.category_id)')
            //->where('suppliers.category_id', $category_name)
            ->latest()->get();	
			
        return view('order_view', compact('order','supplier'));
    }
	
    public function invoiceNumber()
    {
        $orders = order::all();
    
        if($orders->isEmpty())
        {
            $invoice = 'ORD0001';
            return $invoice;
        }
    
        foreach($orders as $order)
        {
            $latest = order::latest()->first();
    
            if($latest->id == true)
            {
                
            $val1=1;
            $val2= $latest->id;
            $val3=$val1 + $val2;
          
            $invoice = 'ORD000'.$val3;
                
                return $invoice;
            }
        }
    }

    public function store(Request $request){


        $invoice_number = self::invoiceNumber();

		$subtotal = 0;
		$array = $request->all();
		foreach($array["order"] as $row)
		{
			$product_id   =  $row["product_id"];
            $product_qty   = $row["product_qty"];
            $points   = $row["points"];
            $email   = $row["email"];
			$subtotal  += $row['subtotal'];
			
	
		}

		
		$totalorderval = $subtotal;

        $getval = "SELECT closing_bal  FROM `registers` WHERE email= '$email'";
        $getclosing_bal = DB::select($getval);
        $val = $getclosing_bal[0]->closing_bal;
		

      /*   $closing_bal111 = DB::table('registers')
        ->where('email', $req->email)
        ->select('closing_bal')
        ->get(); */

		
		if($val > 0 && $totalorderval <= $val)
		{

            order::create([

                'invoice_no' => $invoice_number,
                'points' => $subtotal,
                'email' => $email,
				'date' => carbon::now()->format('d-m-Y'),
            
            ]);
        
		$array = $request->all();
    foreach($array["order"] as $row)
    {


        product_history::create(['product_id'      => $row["product_id"],
            
            'invoice_no' => $invoice_number,
            'product_qty'   => $row["product_qty"],
            'points'   => $row["points"],
            'email'   => $row["email"],
			'subtotal'   => $row["subtotal"],
            'status' => 1,
            'created_at' => Carbon::now(),

                           
        ]);
		
		$point = $row["points"];
        $email = $row["email"];
        $quentity = $row["product_qty"];
        $product_name = $row["product_id"];
		
		
	}
	
		$getval = "SELECT closing_bal  FROM `registers` WHERE email= '$email'";
        $getclosing_bal = DB::select($getval);
        $val = $getclosing_bal[0]->closing_bal;
		
		$balance = $val - $totalorderval;


        DB::table('registers')
        ->where('email', $row["email"])
        ->update(array('closing_bal' => $balance));
	
	
			// \Mail::send('order_mail', array(
		
			
			// $message = 'product_name' => $input['product_name'],
			// $message = 'quentity' => $input['quentity'],
			// $message = 'point' => $input['point'],

    
		 // ),
		 // function($message) use ($input){
				// $message->from('system.engineer@gmail.com','Galrewards');
				// $message->to($input['email'], 'user')->subject('Galrewards Order Place');
			// });
	
	
		return response()->json([
				'success' => 'Order Placed Successfully ',
				'status' => 201
			]);
		}
		
	else{
		
		return response()->json([
            'success' => 'You cannot place order as you have insufficient point balance ',
            'status' => 201
        ]);	
		
	}
	
	 
        
    }
//------------------------------------------------------------------------------------------------------------
    public function order_view(Request $request ,$email=null){

        $email_id = $request->email;
        
        // $data = DB::table('product_histories')
        //     ->join('products', 'product_histories.product_id', '=', 'products.id')
        //     ->where('product_histories.email', $email_id)
        //     ->select('products.product_thambnail', 'products.points', 'products.product_name_en', 'product_histories.cencel_reason', 'product_histories.product_qty', 
        //     \DB::raw('(CASE 
        //                 WHEN product_histories.status = "0" THEN "Cancel" 
        //                     ELSE "Confirm" 
        //                     END) AS status'))
        //     ->latest()->get();

        $data = DB::table('orders')
            ->where('orders.email', $email_id)
            ->select('orders.invoice_no', 'orders.points', 'orders.created_at',
			\DB::raw('(CASE 
						 WHEN orders.status = "1" THEN "Pending" 
						 WHEN orders.status = "2" THEN "Confirmed" 
						 WHEN orders.status = "3" THEN "Cancel" 
                             ELSE "Delevered" 
                             END) AS status'))
			
            ->latest()->get();


		
        return response()->json($data);
    }
//-------------------------------------------------------------------------------------------------------------


public function view_order(Request $request ,$id=null){

    $invoice = $request->id;

    $prefix="http://mygalrewards.com/galrewards/";
    
    $data = DB::table('product_histories')
        ->join('products', 'product_histories.product_id', '=', 'products.id')
        ->where('product_histories.invoice_no', $invoice)
        ->select('products.product_thambnail', 
        DB::raw("CONCAT('$prefix','',products.product_thambnail) as product_thambnailnew"),
        
        'products.points', 'products.product_name_en','product_histories.invoice_no', 'product_histories.subtotal', 'product_histories.product_qty','product_histories.created_at', 
        \DB::raw('(CASE 
                    WHEN product_histories.status = "0" THEN "Cancel" 
					WHEN product_histories.status = "1" THEN "Pending" 
					WHEN product_histories.status = "2" THEN "Confirmed" 
					WHEN product_histories.status = "4" THEN "Delivered" 
                        ELSE "Canceled" 
                        END) AS status'))
        ->latest()->get();

        //dd($data);

    return response()->json($data);
}

//---------------------------------------------------------------------------------------------------------------
    public function editorder($id){

        $order = DB::table('product_histories')
        ->leftjoin('registers', 'product_histories.email', '=', 'registers.email')
        ->leftjoin('products', 'product_histories.product_id', '=', 'products.id')
        ->select('product_histories.*','registers.closing_bal', 'products.product_name_en')
        ->where('product_histories.id', $id)
        ->latest()->get();

        if($order){
        return response()->json([
            'order' => $order,
        ]);
    }
        else{
            return response()->json([
                'error' => 'Order id not found',
            ]); 
        
    }

    }

//--------------------------------------------------------------------------------------------------------------
    public function cencel_order(Request $req){

$changestatus=  $req->change_status;
$invoiceno=  $req->invoice_no;
        
		if($changestatus == 2){
		
		DB::table('product_histories')
                        ->where('id', $req->orer_id)
                        ->update([
									'status' => $req->change_status,
									'vender_info' => $req->vender_info,
								]);
								


        $notification = array(
            'message' => 'Order Item confirm Successfully',
            'alert-type' => 'success'
        );
		
		}else{
			
			
			DB::table('product_histories')
                        ->where('id', $req->orer_id)
                        ->update([
									'status' => $req->change_status,
									'cencel_reason' => $req->cencel_reason,
								]);


		DB::table('registers')
            ->where('email', $req->email)
            ->update(array('closing_bal' => $req->closing_bal));


            $user_data = DB::table('registers')
            ->where('email', $req->email)
            ->select('registers.first_name','registers.guserid')
            ->get();
			
            $name = $user_data[0]->first_name;
            $guserid = $user_data[0]->guserid;


            $product = DB::table('products')
            ->leftjoin('product_histories', 'products.id', '=', 'product_histories.product_id')
            ->where('products.id', '=', $req->producy_id)
            ->select('products.product_name_en')
            ->get();
            $product_name = $product[0]->product_name_en;

           
            $input['user_email'] = $req->email;
            $input['name'] = $name;
            $input['points'] = $req->mail_points;
            $input['product_name'] = $product_name;

// for transaction histroy
$date = carbon::now();
$trans_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');

$getdata = register::where('guserid', $guserid)->first();
$getcurrentcl= $getdata->closing_bal ;


DB::table('transaction_histories')->insert([
    'guserid' => $guserid, 
    'return_points' => $req->mail_points,
    'transaction_date' => $trans_date,
    'closing_balance' => $getcurrentcl,
    'created_at' => Carbon::now()
  ]);


    

            \Mail::send('return_order_mail', array(
        
                'name' => $name,
                'email' => $req->email,
                'points' => $req->mail_point,
				'cencel_reason' => $req->cencel_reason,
                'product_name' => $product_name,
               
            ), function($message) use ($input){
                //$message->$req->get('first_name');
                //$message->from($req->first_name);
                $message->from('system.engineer@gmail.com','Galrewards');
                $message->to($input['user_email'], $input['name'])->subject('Galrewards Order ');
            });




        $notification = array(
            'message' => 'Order Cancelled Successfully',
            'alert-type' => 'success'
        );	
			
			
			
			
			
			
		}
		
		
    
            return redirect()->back()->with($notification);
    }
	
	
	//order status
	
	
	  public function changeorder($id){

        $order = DB::table('orders')
        ->leftjoin('registers', 'orders.email', '=', 'registers.email')
        ->select('orders.*','registers.closing_bal')
        ->where('orders.id', $id)
        ->latest()->get();

        if($order){
        return response()->json([
            'order' => $order,
        ]);
    }
        else{
            return response()->json([
                'error' => 'Order id not found',
            ]); 
        
    }

    }
	
	
	
	
	
public function order_status(Request $req){


$changestatus=  $req->change_status;
$invoiceno=  $req->invoice_no;

if($changestatus == 2){


        DB::table('orders')
                        ->where('id', $req->orer_id)
                        ->update([
									'status' => $req->change_status,
									'narration' => $req->narration,
								]);
								
								
			 DB::table('product_histories')
                        ->where('invoice_no', $invoiceno)
                        ->update([
									'status' => $req->change_status,
									'cencel_reason' => $req->narration,
								]);					
															
							
            $user_data = DB::table('registers')
            ->where('email', $req->email)
            ->select('registers.first_name')
            ->get();
			
            $name = $user_data[0]->first_name;
	   
            $input['user_email'] = $req->email;
            $input['name'] = $name;
            $input['points'] = $req->mail_points;
           
    

            \Mail::send('confirm_order_mail', array(
        
                'name' => $name,
                'email' => $req->email,
                'points' => $req->mail_point,
				'narration' => $req->narration,
              
               
            ), function($message) use ($input){
                //$message->$req->get('first_name');
                //$message->from($req->first_name);
                $message->from('system.engineer@gmail.com','Galrewards');
                $message->to($input['user_email'], $input['name'])->subject('Galrewards Order Confirm ');
            });



        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );
		
}elseif($changestatus == 4){	


                    DB::table('orders')
                        ->where('id', $req->orer_id)
                        ->update([
									'status' => $req->change_status,
									'narration' => $req->narration,
								]);
								
								
			 DB::table('product_histories')
                        ->where('invoice_no', $invoiceno)
                        ->update([
									'status' => $req->change_status,
									'cencel_reason' => $req->narration,
								]);					
															
							
            $user_data = DB::table('registers')
            ->where('email', $req->email)
            ->select('registers.first_name')
            ->get();
			
            $name = $user_data[0]->first_name;
	   
            $input['user_email'] = $req->email;
            $input['name'] = $name;
            $input['points'] = $req->mail_points;
           
    

            \Mail::send('delivered_order_mail', array(
        
                'name' => $name,
                'email' => $req->email,
                'points' => $req->mail_point,
				'narration' => $req->narration,
              
               
            ), function($message) use ($input){
                //$message->$req->get('first_name');
                //$message->from($req->first_name);
                $message->from('system.engineer@gmail.com','Galrewards');
                $message->to($input['user_email'], $input['name'])->subject('Galrewards Order Delivered ');
            });



        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );





		
}else{
	

        DB::table('orders')
                        ->where('id', $req->orer_id)
                        ->update([
									'status' => $req->change_status,
									'narration' => $req->narration,
								]);


           DB::table('product_histories')
                        ->where('invoice_no', $invoiceno)
                        ->update([
									'status' => $req->change_status,
									'cencel_reason' => $req->narration,
								]);


		DB::table('registers')
            ->where('email', $req->email)
            ->update(array('closing_bal' => $req->closing_bal));


            $user_data = DB::table('registers')
            ->where('email', $req->email)
            ->select('registers.first_name','registers.guserid')
            ->get();
			
            $name = $user_data[0]->first_name;
            $guserid = $user_data[0]->guserid;
		
            $input['user_email'] = $req->email;
            $input['name'] = $name;
            $input['points'] = $req->mail_points;
       
    

// for transaction histroy
$date = carbon::now();
$trans_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');

$getdata = register::where('guserid', $guserid)->first();
$getcurrentcl= $getdata->closing_bal ;


DB::table('transaction_histories')->insert([
    'guserid' => $guserid, 
    'return_points' => $req->mail_point,
    'transaction_date' => $trans_date,
    'closing_balance' => $getcurrentcl,
    'created_at' => Carbon::now()
  ]);





            \Mail::send('decline_order_mail', array(
        
                'name' => $name,
                'email' => $req->email,
                'points' => $req->mail_point,
				'narration' => $req->narration,
             
               
            ), function($message) use ($input){
                //$message->$req->get('first_name');
                //$message->from($req->first_name);
                $message->from('system.engineer@gmail.com','Galrewards');
                $message->to($input['user_email'], $input['name'])->subject('Galrewards Order Decline ');
            });




        $notification = array(
            'message' => 'Order Decline Successfully',
            'alert-type' => 'success'
        );
	
	
	
	
	
}
		
		
    
            return redirect()->back()->with($notification);
    }
	
	
	
	

}

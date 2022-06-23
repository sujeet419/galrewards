<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\ticket_status;
use Carbon\Carbon;
use Auth;
use App\Http\Requests; 

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    
 

    public function dashboard_view(){

       
        $country_id= $_GET['country_id'];
        
        $filter_month= $_GET['filter_month'] ?? '';
        
        if($filter_month == ''){
           
            $getmonth=''  ;
       
        }else{

            $getval=  explode("-", $filter_month);
        
            $getyear= $getval[0];
            $getmonth= $getval[1];

        }


        $pointreddem = DB::table('transaction_histories')
        ->leftJoin('registers','registers.guserid','=','transaction_histories.guserid')
        ->selectRaw('registers.country_name, sum(transaction_histories.points)+sum(transaction_histories.bonus_points) totalcreditpoint, sum(transaction_histories.order_points) redeemedpoint')
        ->whereRaw('MONTH(transaction_histories.created_at) = ?',[$getmonth])
        ->whereYear('transaction_histories.created_at', date('Y'))
         //->orderBy('total','desc')
         ->groupBy('registers.country_name')
        ->get();

        //dd($top_sales);
      

        $consultantadd= DB::table('registers')
        ->selectRaw('count(registers.id) total ,registers.country_name')
        ->whereRaw('MONTH(created_at) = ?',[$getmonth])
        ->whereYear('created_at', date('Y'))
        ->orderBy('total','desc')
        ->groupBy('registers.country_name')
        ->get();

		
    return view('admin/dashboard_view', compact('consultantadd','pointreddem'));

    }

	
    public function top_sellproduct($country_id){

       $country_id= $country_id;
     
        $top_sales = DB::table('product_histories')
        ->leftJoin('products','products.id','=','product_histories.product_id')
        ->selectRaw('products.*, sum(product_histories.product_qty) total')
        ->whereRaw('find_in_set("'.$country_id.'",products.country_id)')
        ->groupBy('product_histories.product_id')
        ->orderBy('total','desc')
        ->take(10)
        ->get();

        //dd($top_sales);
            
            return view('admin/top_sellproduct', compact('top_sales'));
    
        }
	

	
        public function top_agent($country_id){

            $country_id= $country_id;
          
             $top_agent = DB::table('orders')
             ->leftJoin('registers','registers.email','=','orders.email')
             ->selectRaw('registers.*, sum(orders.points) total')
             ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
             ->whereMonth('orders.created_at', date('m'))
             ->groupBy('orders.email')
             ->orderBy('total','desc')
             ->take(10)
             ->get();
     
         
                 
                 return view('admin/top_agent', compact('top_agent'));
         
             }
         
	

             public function top_supplier($country_id){

                $country_id= $country_id;
              
                $top_supplier = DB::table('product_histories')
                ->leftJoin('suppliers','suppliers.supplier_name','=','product_histories.vender_info')
                ->selectRaw('suppliers.*, sum(product_histories.product_qty) total')
                ->whereRaw('find_in_set("'.$country_id.'",suppliers.country)')
                ->groupBy('product_histories.vender_info')
                ->orderBy('total','desc')
                ->take(10)
                ->get();
         
             
                     return view('admin/top_supplier', compact('top_supplier'));
             
                 }
 

                 //Orders Pending for delivery

                 public function order_pendingdelivery($country_id){

                    $country_id= $country_id;
                  
                    $order_pendingdelivery = DB::table('product_histories')
                    ->leftJoin('registers','registers.email','=','product_histories.email')
                    ->selectRaw('product_histories.*, sum(product_histories.subtotal) total')
                    ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
                    ->where('product_histories.status', '2')
                    ->groupBy('product_histories.email')
                    ->orderBy('total','desc')
                   // ->take(10)
                    ->get();
             
               
                         return view('admin/order_pendingdelivery', compact('order_pendingdelivery'));
                 
                     }   
	

	// pending ticket


    public function pending_ticket($country_id){

        $country_id= $country_id;
      
        $pending_ticket = DB::table('tickets')
        ->leftJoin('registers','registers.id','=','tickets.user_id')
        ->selectRaw('tickets.*')
        ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
        ->where('tickets.status', '0')
      
        //->groupBy('product_histories.email')
        ->orderBy('tickets.id','desc')
       // ->take(10)
        ->get();
 
 
             return view('admin/pending_ticket', compact('pending_ticket'));
     
         }  

	
	
	

    public function order_pendingapproval($country_id){

        $country_id= $country_id;
      
        $order_pendingapproval = DB::table('product_histories')
        ->leftJoin('registers','registers.email','=','product_histories.email')
        ->selectRaw('product_histories.*, sum(product_histories.subtotal) total')
        ->whereRaw('find_in_set("'.$country_id.'",registers.country_name)')
        ->where('product_histories.status', '1')
        ->groupBy('product_histories.email')
        ->orderBy('total','desc')
       // ->take(10)
        ->get();
 
   
             return view('admin/order_pendingapproval', compact('order_pendingapproval'));
     
         }   

	
	
	



 
}

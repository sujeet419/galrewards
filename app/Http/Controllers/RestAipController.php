<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\category;
use App\Models\register;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RestAipController extends Controller
{
//--------------------------------------Login--------------------------------

public function logindetail(Request $request){

    $register = register::where('email',$request->email)->first();
    if ($request->password == $register->password AND $request->email == $register->email) {

        return response()->json([
            'id' => $register->id,
            'email' => $register->email,
			'guserid' => $register->guserid,
            'country' => $register->country_name,
            'success' => 'Login Successfully',
            'status' => 201
        ]);
      
    } else {
        
        return response([
            'error' => 'User Not Authorized',
        ]);
    }
    

}

//------------------------------------User Profile-----------------

public function user_profile(Request $request, $id=null) {
	$user = $request->id;	
	$data = register::find($user);
	if($user == '' AND $data == ''){
		
		return response()->json(404);
		
	}else{
		
		return response()->json([$data]);
		
	}
    }

//------------------------------------User Profile edit-----------------

public function user_profile_edit(Request $request, $id=null) {
	$user = $request->id;	
	//$data = register::find($user);

    $update = register::findOrFail($user)->update([

        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'contact' => $request->contact,


    ]);

    return response()->json(['success' => 'Profile Update Successfully'], 404);
    }

//-------------------------------------Category EN FR ------------------

public function category_en(Request $request, $id, $country=NULL){
    $cat = $request->id;
    $country = $request->country;
    $prefix="http://mygalrewards.com/galrewards/";
    if($cat == 'en'){
        $category = DB::table('categories')
        ->select('categories.id','categories.categories_name_en',
        DB::raw("CONCAT('$prefix','',categories.image) as image"),
        'categories.categories_status')
        ->whereRaw('find_in_set("'.$country.'",categories.country_id)')
		->where('categories.categories_status', 1)->orderBy('categories.id','desc')
        ->get();

       
    }
    else if($cat == 'fr'){
        $category = DB::table('categories')
        ->select('categories.id','categories.categories_name_fr',
        DB::raw("CONCAT('$prefix','',categories.image) as image"),
        'categories.categories_status')
        ->whereRaw('find_in_set("'.$country.'",categories.country_id)')
		->where('categories.categories_status', 1)->orderBy('categories.id','desc')
        ->get();
		
	}else{
		
		$category = ['error', 400];
	}

        return response()->json($category);

    }




//-------------------------------------Sub Category EN FR ------------------

public function subcategory_en(Request $request, $id, $headers = 201){
    $subcat = $request->id;
    if($subcat == 'en'){
        $subcategory = DB::table('subcategories')
        ->select('subcategories.id','subcategories.subcategories_name_en','subcategories.subcategories_status')
		->where('subcategories.subcategories_status', 1)->orderBy('subcategories.updated_at','desc')
        ->get();

    }
    else if ($subcat == 'fr'){
        $subcategory = DB::table('subcategories')
        ->select('subcategories.id','subcategories.subcategories_name_fr','subcategories.subcategories_status')
		->where('subcategories.subcategories_status', 1)->orderBy('subcategories.updated_at','desc')
        ->get();

    }
	else{
		
		$subcategory = ['error', 400];
		
	}
	
	return response()->json($subcategory, $headers);

}

//-------------------------------------Country EN FR ------------------

public function country_en(Request $request, $id, $headers = 201){
    $con = $request->id;
    if($con == 'en'){
        $country = DB::table('countries')
        ->select('countries.id','countries.country_name_en','countries.country_status')
		->where('countries.country_status', 1)
        ->get();

    }
    else if($con == 'fr'){
        $country = DB::table('countries')
        ->select('countries.id','countries.country_name_fr','countries.country_status')
		->where('countries.country_status', 1)
        ->get();

    }else{
		
		$country = ['error', 400];
		
	}
	
	return response()->json($country, $headers);

}

//-------------------------------------Product EN FR ------------------


public function product_en(Request $request, $id, $country=NULL){
    $pro = $request->id;
    $country = $request->country;


    $prefix="http://mygalrewards.com/galrewards/";
    if($pro == 'en'){
        $product = DB::table('products')
		->join('categories', 'categories.id', '=', 'products.category_id')
		->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
		//->join('countries', 'countries.id', '=', 'products.country_id')
        ->select('products.id','products.product_name_en',
        DB::raw("CONCAT('$prefix','',products.product_thambnail) as product_thambnailnew"),
        
        'products.product_thambnail','products.points','products.special_deals',
		'categories.categories_name_en','subcategories.subcategories_name_en','products.country_id')
		//->select('products.*')
        ->whereRaw('find_in_set("'.$country.'",products.country_id)')
		->where('products.product_active', 1)->orderBy('products.id','desc')
        ->get();

    }
    else if($pro == 'fr'){
        $product = DB::table('products')
		->join('categories', 'categories.id', '=', 'products.category_id')
		->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
		//->join('countries', 'countries.id', '=', 'products.country_id')
        ->select('products.id','products.product_name_fr','products.product_thambnail','products.points','products.special_deals',
		'categories.categories_name_fr','subcategories.subcategories_name_fr','products.country_id')
        //->select('products.id','products.product_name_fr','products.product_thambnail','products.points','products.special_deals')
		//->select('products.*')
		->where('products.product_active', 1)->orderBy('products.id','desc')
        ->get();


    }else{
		$product = ['error', 400];
	}
	
	return response()->json($product);

}

// product fetch categogroy wise


public function product_catwise(Request $request, $catid, $headers = 201){
    $catid = $request->catid;
	$lang = $request->lang;
    
	//dd(catid);
    $prefix="http://mygalrewards.com/galrewards/";

	 $product = DB::table('products')
		->join('categories', 'categories.id', '=', 'products.category_id')
		->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
		//->join('countries', 'countries.id', '=', 'products.country_id')
        ->select('products.id','products.product_name_en',
        DB::raw("CONCAT('$prefix','',products.product_thambnail) as product_thambnailnew"),
        'products.points','products.special_deals',
		'categories.categories_name_en','subcategories.subcategories_name_en')
		//->select('products.*')
		->where('products.category_id', $catid)->orderBy('products.id','desc')
        ->get();
	

	
	return response()->json($product, $headers);

}

//special deal product

//$special_deal = Product::where('special_deals', 1)->limit(8)->get();

public function productspecial(Request $request, $id, $country=NULL){
    $pro = $request->id;
    $country = $request->country;
    $prefix="http://mygalrewards.com/galrewards/";
    if($pro == 'en'){
        $productspecial = DB::table('products')
		->join('categories', 'categories.id', '=', 'products.category_id')
		->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
		//->join('countries', 'countries.id', '=', 'products.country_id')
        ->select('products.id','products.product_name_en',
        DB::raw("CONCAT('$prefix','',products.product_thambnail) as product_thambnailnew"),
        'products.product_thambnail','products.points','products.special_deals','categories.categories_name_en','subcategories.subcategories_name_en')
		//->select('products.*')
		->where('products.special_deals', 1)
        ->whereRaw('find_in_set("'.$country.'",products.country_id)')
		->orderBy('products.id','desc')
		->orderBy('products.updated_at','desc')
        ->get();

    }
    else if($pro == 'fr'){
        $productspecial = DB::table('products')
		->join('categories', 'categories.id', '=', 'products.category_id')
		->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
		->join('countries', 'countries.id', '=', 'products.country_id')
        ->select('products.id','products.product_name_fr','products.product_thambnail','products.points','products.special_deals',
		'categories.categories_name_fr','subcategories.subcategories_name_fr','countries.country_name_fr')
        //->select('products.id','products.product_name_fr','products.product_thambnail','products.points','products.special_deals')
		//->select('products.*')
		->where('products.special_deals', 1)->orderBy('products.id','desc')->orderBy('products.updated_at','desc')
        ->get();


    }else{
		$productspecial = ['error', 400];
	}
	
	return response()->json($productspecial);

}

// search api

public function productsearch(Request $request, $search, $headers = 201){
    $search = $request->search;
	
	//dd(catid);
	
	 $productsearch=Product::orwhere('product_name_en','like','%'.$request->search.'%')
    ->orwhere('product_description_en','like','%'.$request->search.'%')
    ->orwhere('points','like','%'.$request->search.'%')
    ->orwhere('category_id','like','%'.$request->search.'%')
    ->orderBy('id','DESC')
    ->get();
	
	return response()->json($productsearch, $headers);

}



//-------------------------------------Revolving Image EN FR ------------------

public function revol_en(Request $request, $id, $headers = 201){
    $rev = $request->id;
    if($rev == 'en'){
        $rev_image = DB::table('revol_images')
        ->select('revol_images.id','revol_images.image','revol_images.title_en','revol_images.description_en','revol_images.revol_image_status')
        ->where('revol_images.revol_image_status', 1)
		->get();

    }
    else if($rev == 'fr'){
        $rev_image = DB::table('revol_images')
        ->select('revol_images.id','revol_images.image','revol_images.title_fr','revol_images.description_fr','revol_images.revol_image_status')
        ->where('revol_images.revol_image_status', 1)
		->get();


    } else{
		
		$rev_image = ['error', 400];
	}
	
	return response()->json($rev_image, $headers);

}

//-------------------------------------Slider ------------------

public function slider(Request $request, $headers = 201){

    $prefix="http://mygalrewards.com/galrewards/";
    $slider = DB::table('sliders')
    ->select('sliders.id',
    DB::raw("CONCAT('$prefix','',sliders.image) as image"),
    'sliders.slider_status')
	->where('sliders.slider_status', 1)
    ->get();

    return response()->json($slider, $headers);

}
// monthly balance


public function getmonthly_balance(Request $request, $guserid=NULL, $ac_date=NULL){

$guserid = $request->guserid;
//dd($guserid);
$date = $request->ac_date;
$get_date = Carbon::createFromFormat('Y-m', $date)->format('M-y');

$year = Carbon::createFromFormat('Y-m', $date)->format('Y');
$month = Carbon::createFromFormat('Y-m', $date)->format('m');



$user_data = DB::table('registers')
    ->where('registers.guserid', $guserid)
    ->select('registers.first_name','registers.email', )
    ->get();

    $user_email = $user_data[0]->email;

	
	$opening_balance = DB::table('registers')
	->where('registers.guserid', $guserid)
	->select('registers.closing_bal')
	->get();
	
	$bonus_point = DB::table('bonus_points')
	->where('bonus_points.guserid', $guserid)
	->where('bonus_points.bonus_date', '=', $get_date)
    //->select(DB::raw("SUM(bonus_points.bonus_point) as totalbonus") )
	->sum('bonus_points.bonus_point');
	
	$points = DB::table('points')
	->where('points.guserid', $guserid)
	->where('points.point_date', '=', $get_date)
    ->sum('points.points');
	
	$Order_point = DB::table('product_histories')
	->where('product_histories.email', $user_email)
	->whereMonth('product_histories.created_at', '=', date($month))
	->whereYear('product_histories.created_at', '=', date($year))
	->sum('product_histories.subtotal');
	
	$closing_bal = DB::table('registers')
	->where('registers.guserid', $guserid)
    ->select('registers.closing_bal')
	->get();
	$valll= $closing_bal[0]->closing_bal;
	
        return response()->json([
	
		'bonus_point' => $bonus_point,
		'points' => $points,
		'Order_point' => $Order_point,
		'closing_bal' => $valll
		]);

 
}



//-------------------------------------Account Balance ------------------

public function account_balance(Request $request, $guserid=NULL){

  
 $guserid = $request->guserid;
 $date = carbon::now();
 
$get_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M-y');

$year = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y');
$month = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m');



$user_data = DB::table('registers')
    ->where('registers.guserid', $guserid)
    ->select('registers.first_name','registers.email', )
    ->get();

    $user_email = $user_data[0]->email;

	$opening_balance = DB::table('registers')
	->where('registers.guserid', $guserid)
	->select('registers.closing_bal')
	->get();
	
	$bonus_point = DB::table('bonus_points')
	->where('bonus_points.guserid', $guserid)
	->where('bonus_points.bonus_date', '=', $get_date)
    //->select(DB::raw("SUM(bonus_points.bonus_point) as totalbonus") )
	->sum('bonus_points.bonus_point');
	
	$points = DB::table('points')
	->where('points.guserid', $guserid)
	->where('points.point_date', '=', $get_date)
    ->sum('points.points');
	
	$Order_point = DB::table('product_histories')
	->where('product_histories.email', $user_email)
	->whereMonth('product_histories.created_at', '=', date($month))
	->whereYear('product_histories.created_at', '=', date($year))
	->sum('product_histories.subtotal');
	
	$closing_bal = DB::table('registers')
	->where('registers.guserid', $guserid)
    ->select('registers.closing_bal')
	->get();
	$valll= $closing_bal[0]->closing_bal;
	
	
        return response()->json([
		//'opening_balance' => $opening_balance,
		'bonus_point' => $bonus_point,
		'points' => $points,
		'Order_point' => $Order_point,
		'closing_bal' => $valll
		]);




}

// //------------------------------- Forget Password----------------------------------------------

public function forgot_password(Request $request){
	
    // $request->validate([
    //     'email' => 'required',
    //     'password' => 'required_with:confirm_password|same:confirm_password',
    //     'confirm_password' => 'required'
    // ]);

    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required_with:confirm_password|same:confirm_password',
        'confirm_password' => 'required'
    ]);

    if ($validator->fails()) {


        return response()->json([
	 
            'error' => 'Password not match',
            ]);
        
    } else {
    
        DB::table('registers')
        ->where('email', $request->email)
        ->update(array('password' => $request->password));
        
        

        return response()->json([

        'success' => 'password change successfully',
            ]); 

    }
	

}

// cart add


public function cart(Request $request){
	
  
    $validator = Validator::make($request->all(), [
        'product_id' => 'required',
        'user_id' => 'required'
    ]);

    if ($validator->fails()) {


        return response()->json([
	 
            'error' => 'Please Login',
            ]);
        
    } else {

        $user_id= $request->user_id;
        $totalorderval= $request->total_order;

        $getval = "SELECT closing_bal  FROM `registers` WHERE id= '$user_id'";
        $getclosing_bal = DB::select($getval);
        $val = $getclosing_bal[0]->closing_bal;

        if($val > 0 && $totalorderval <= $val)
        { 

            Cart::insert([

                'product_id' => $request->product_id,
                'user_id' => $request->user_id ,
                'point' => $request->point,
                'quantity' => $request->quantity,
                'total_point' => $request->total_point,
                'created_at' => Carbon::now(),
        
            ]);
            
          
            return response()->json([
    
            'success' => 'Add cart successfully',
                ]); 



        }else{


            return response()->json([
    
                'success' => 'insufficient point balance',
                    ]);

        }


    
           

    }
	

}

// cart view

public function cart_view(Request $request, $user_id, $headers = 201){
    $user_id = $request->user_id;
    $prefix="http://mygalrewards.com/galrewards/";
	//dd(user_id);
	
	 $cart = DB::table('carts')
		->join('products', 'products.id', '=', 'carts.product_id')
		
        ->select('carts.*','products.product_name_en',
        DB::raw("CONCAT('$prefix','',products.product_thambnail) as product_thambnailnew"),

        'products.product_thambnail')
		//->select('products.*'), DB::raw('SUM(carts.total_point) AS grandtotal')
	
		->where('carts.user_id', $user_id)->orderBy('carts.id','desc')
        ->get();
	
//$grandtotal= DB::table('carts')->where('carts.user_id', $user_id)->get()->sum('total_point');
	
	return response()->json($cart, $headers);

}

//cart_total


public function cart_total(Request $request, $user_id, $headers = 201){
    $user_id = $request->user_id;

	//dd(user_id);
	
	 $cart = DB::table('carts')
        ->select('carts.*')
		//->select('products.*')
		->where('carts.user_id', $user_id)->orderBy('carts.id','desc')
        ->count();
	

	
	return response()->json($cart, $headers);

}

// for ticket list all userwise

  public function ticket_list(Request $request, $user_id, $headers = 201){
        $user = $request->user_id;
       $ticketlist = DB::table('tickets')
	   ->where('tickets.user_id', '=', $user)
       ->select('tickets.id','tickets.user_id','tickets.need_assistance','tickets.comment','tickets.ticket_date',
	    \DB::raw('(CASE 
                    WHEN tickets.status = "0" THEN "Open" 
                        ELSE "WIP" 
                        END) AS status'))->latest()->get();

        return response()->json($ticketlist, $headers);

    }


  public function ticket_view(Request $request, $id, $headers = 201){
        $id = $request->id;
       $ticketview = DB::table('tickets')
	   ->where('tickets.id', '=', $id)
       ->select('tickets.id','tickets.user_id','tickets.need_assistance','tickets.comment','tickets.ticket_date',
	    \DB::raw('(CASE 
                    WHEN tickets.status = "0" THEN "Open" 
                        ELSE "WIP" 
                        END) AS status'))->latest()->get();

        return response()->json($ticketview, $headers);

    }
	
	
	  public function ticket_status(Request $request, $ticket_id, $headers = 201){
        $ticket_id = $request->ticket_id;
       $ticketstatus = DB::table('ticket_statuses')
	   ->where('ticket_statuses.ticket_id', '=', $ticket_id)
       ->select('ticket_statuses.consultant_first_name','ticket_statuses.consultant_last_name','ticket_statuses.consultant_email',
	   'ticket_statuses.contact','ticket_statuses.support_actions','ticket_statuses.final_resolution',
	   'ticket_statuses.elaborate_problems','ticket_statuses.note','ticket_statuses.date_Of_closure','ticket_statuses.created_at',
	   
	    \DB::raw('(CASE 
                    WHEN ticket_statuses.status = "0" THEN "Open" 
                        ELSE "WIP" 
                        END) AS status'))->latest()->get();

        return response()->json($ticketstatus, $headers);

    }
	




}
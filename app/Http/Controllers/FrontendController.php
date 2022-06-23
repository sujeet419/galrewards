<?php

namespace App\Http\Controllers;
use App\Models\slider;
use App\Models\product;
use App\Models\category;
use App\Models\country;
use App\Models\Agencygroup;
use App\Models\subcategory;
use App\Models\ticket;
use App\Models\register;
use App\Models\product_history;
use App\Models\order;
use App\Models\Cart;
use App\Models\revol_image;
use Auth;
use Session;
use Cookie;
use DB;
use carbon\carbon;
use Mail; 
use Illuminate\Support\Str;
use App\Http\Requests; 
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Collection;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
// use Gloudemans\Shoppingcart\Facades\Cart;
class FrontendController extends Controller
{
   
  /****************************************************
  * @home Creates a home page
  Created BY: Sujeet Kumar
  Function: Home
 ****************************************************/

    public function home(){
		
        $data = session()->all(); 
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		$class = $country_name;
        }
		else{
			return view('frontend.pages.login')->with('success','Please Login Frist');
			$class = '';
		}

        $todatdate= Carbon::now();
        
        $newdate1= date('Y-m-d', strtotime(Carbon::now()));
			
        $featured=product::where('product_active','1')->where('product_start_date', '<=', $newdate1)
        ->where('product_end_date', '>=', $newdate1)
	    ->whereRaw('find_in_set("'.$class.'",country_id)')
	    ->where('special_deals',1)->limit(8)->latest()->get();
        $slider=slider::where('slider_status','1')->limit(4)->orderBy('id','DESC')->get();
		$revolimage=revol_image::where('revol_image_status','1')->limit(2)->orderBy('id','DESC')->get();
        $products=product:: where('product_start_date', '<=', $newdate1)
       ->where('product_end_date', '>=', $newdate1)
       ->where('product_active','1')
	   ->whereRaw('find_in_set("'.$class.'",country_id)')
	   ->orderBy('id','DESC')->limit(8)->get();

        $category=Category::where('categories_status','1')
        ->whereRaw('find_in_set("'.$class.'",country_id)')
        ->orderBy('id','ASC')->get();

        return view('frontend.index')
                ->with('featured',$featured)
                ->with('slider',$slider)
				 ->with('revolimage',$revolimage)
                ->with('products',$products)
                ->with('category',$category);
    }
	
	// for change langauge



public function setenlangauge(Request $request){
    $lang="en"; 
   //$lang = Request::segment(1); 
  // $request->session()->put('language', $lang);  
  // echo "langauge set in session";

   session()->get('language');
   session()->forget('language');
   Session::put('language', $lang);
   return redirect()->back();



}

public function setfrlangauge(Request $request){
   
    //$lang = Request::segment(1);
    $lang="fr"; 
    session()->get('language');
   session()->forget('language');
   Session::put('language', $lang);
   return redirect()->back();
 
 }
	
    
    public function login(){
        return view('frontend.pages.login')->with('success','Please Login First');
    }

    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']);
            request()->session()->flash('success','You are successfully logged in');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }


// forgot password


      
      public function showForgetPasswordForm()
      {
         return view('frontend.pages.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:registers',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('frontend.pages.email_forgetPassword', ['token' => $token], function($message) use($request){
              
              $message->from('help@galrewards.com','Galrewards');
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('frontend.pages.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:registers',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          
         $user =  DB::table('registers')
    ->where('email', $request->email)
    ->update(['password' => $request->password]);
          
  
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/flogin')->with('message', 'Your password has been changed!');
      }






//end forgot password



    public function shop() {

        $data = session()->all(); 
		
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		
		$class = $country_name;

		}
		else{
            return redirect("flogin")->withSuccess('You must login before view product','Access is not permitted');
			//return view('frontend.pages.login')->with('withSuccess','Please Login Frist');
			$class = '';
		}



        $category = Category::where('categories_status','1')
        ->whereRaw('find_in_set("'.$class.'",country_id)')->get();   
        $subcategory = subcategory::where('subcategories_status','1')->get();  
		//$product = Product::get()->paginate(5); 
		
		
		$data = session()->all(); 
		
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		
		$class = $country_name;

		}
		else{
			$class = '';
		}
		
        $todatdate= Carbon::now();
        
        $newdate1= date('Y-m-d', strtotime(Carbon::now()));


		$product = Product::where('product_active', '1')->where('product_start_date', '<=', $newdate1)
            ->where('product_end_date', '>=', $newdate1)
			->whereRaw('find_in_set("'.$class.'",country_id)')
                         ->orderBy('id', 'asc')
                          ->paginate(9);
		
		

        return view('frontend.pages.shop', compact('product','category', 'subcategory'));
    }
	
	
	 public function productCat(Request $request){
		
        
        $subcategory = subcategory::where('subcategories_status','1')->get(); 
		
		//$catproducts=Product::where('category_id',$request->id)->get();
		
		$data = session()->all(); 
		
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		
		$class = $country_name;

		}
		else{
			$class = '';
		}

        $todatdate= Carbon::now();
        
        $newdate1= date('Y-m-d', strtotime(Carbon::now()));
        
		//dd($newdate1);
        
        $category = Category::where('categories_status','1')
        ->whereRaw('find_in_set("'.$class.'",country_id)')->get(); 

        $catproducts = Product::where('category_id', $request->id)->where('product_active', '1')
		->where('product_start_date', '<=', $newdate1)
       ->where('product_end_date', '>=', $newdate1)
	   	->whereRaw('find_in_set("'.$class.'",country_id)')
                         ->orderBy('id', 'asc')
                          ->paginate(9);
		
   
       return view('frontend.pages.catproducts', compact('catproducts','category', 'subcategory'));

    }
    public function productSubCat(Request $request){
	
        $subcategory = subcategory::where('subcategories_status','1')->get(); 
		
       // $subcatproducts=Product::where('subcategory_id',$request->id)->get();
	   
	   	$data = session()->all(); 
		
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		
		$class = $country_name;

		}
		else{
			$class = '';
		}
	   
        $todatdate= Carbon::now();
        
        $newdate1= date('Y-m-d', strtotime(Carbon::now()));

        $category = Category::where('categories_status','1')
        ->whereRaw('find_in_set("'.$class.'",country_id)')->get(); 
       $subcatproducts = Product::where('subcategory_id', $request->id)->where('product_active', '1')
       ->where('product_start_date', '<=', $newdate1)
       ->where('product_end_date', '>=', $newdate1)
	   ->whereRaw('find_in_set("'.$class.'",country_id)')
       ->orderBy('id', 'asc')
      ->paginate(9);


     return view('frontend.pages.subcatproducts', compact('subcatproducts','category', 'subcategory'));

    }
	
	  public function productRange(Request $request){
		 
		$category = Category::where('categories_status','1')->get();   
        $subcategory = subcategory::where('subcategories_status','1')->get(); 
		$points=explode('-',$_POST['points']);
		$trimmed_array = array_map('trim', $points);
		$value1=$trimmed_array[0];
		$value2=$trimmed_array[1];
		
        $data = session()->all(); 
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		$class = $country_name;
          }
		else{
			$class = '';
		}

		 $rangeproducts = DB::select("SELECT  * FROM products WHERE find_in_set('$class', country_id) and points >= $value1 and points <= $value2 and product_end_date >= now()");
		
		//$rangeproducts = DB::table('products')
          // ->whereBetween('points', [$value1, $value2])
          // ->get();
						
			//dd($rangeproducts);			
						
		
		//dd(array_values($trimmed_array));
		 //DB::enableQueryLog(); 
		//$rangeproducts=Product::whereBetween('points',[40,100])->get();
		 //$quries = DB::getQueryLog($rangeproducts);

  
		//dd($rangeproducts);

       return view('frontend.pages.rangeproducts', compact('rangeproducts','category', 'subcategory','value1','value2'));

    }
	
	

    public function cart() {
        
        $data = session()->all(); 
        if(isset($data['userData'])){
            $allsesion= $data['userData'];
            $country_name= $allsesion['country_name']; 
            $class = $country_name;
            }
            else{
                return redirect("flogin")->withSuccess('You must login before view cart','Access is not permitted');
                $class = '';
            }

        
      
        $allsesion= $data['userData'];
        $user_id= $allsesion['user_id']; 

        $releted_product = Product::where('special_deals', 1)->limit(8)->get();
        $cart = Cart::where('user_id', $user_id)->count('id');
        return view('frontend.pages.cart', compact('releted_product','data','cart'));
    }

    public function checkout() {

        $data = session()->all(); 
       

    if(!isset($data['userData'])){

    $notification = array(
        'message' => 'Please Login',
        'alert-type' => 'error'
    );
request()->session()->flash('success','You must login before place any order');
    return redirect()->to('flogin')->with($notification);
}


$allsesion= $data['userData']; 
$email= $allsesion['email'];
$user_id= $allsesion['user_id'];   

   
$data =      register::select('closing_bal')
                    ->where('email','=', $email)
                    ->first();

        $point = $data->closing_bal;

        $cart_amount = 0;
        $cartTotal = Cart::where('user_id', $user_id)->get();
        foreach ($cartTotal as $key => $value) {
        $cart_amount += $value->total_point;
       
    }

        if ($cart_amount > $point) {

            request()->session()->flash('error','Insufficient point balance');
            return redirect()->back();

        }

        //if (Auth::check()) {
        if ($cart_amount > 0) {

        $data = session()->all(); 
        $allsesion= $data['userData']; 
        $user_id= $allsesion['user_id'];  

        $carts = Cart::where('user_id', $user_id)->get();
        $cartQty = Cart::where('user_id', $user_id)->count();
        $cart_val = 0;
        $cartTotal = Cart::where('user_id', $user_id)->get();
        foreach ($cartTotal as $key => $value) {
        $cart_val += $value->total_point;
        }
      
        $userdata = register::where('id',$user_id)->first();

        $special_deal = Product::where('special_deals', 1)->limit(8)->get();
        return view('frontend.pages.checkout',compact('carts','cartQty','cart_val','userdata','special_deal'));
                
            }else{
    
            $notification = array(
            'message' => 'Shopping At list One Product',
            'alert-type' => 'error'
        );
    
        return redirect()->to('frontend')->with($notification);
    
            }
    
            
            //}else{
        
            //     $notification = array(
            //    'message' => 'You Need to Login First',
            //    'alert-type' => 'error'
            //);
        
            return redirect()->route('flogin')->with($notification);
        
            //}
    }

    public function detail($id) {

        $data = session()->all(); 
		if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $country_name= $allsesion['country_name']; 
		$class = $country_name;
        }
		else{
			$class = '';
		}

        $todatdate= Carbon::now();
        
        $newdate1= date('Y-m-d', strtotime(Carbon::now()));
        
        $product_detail = Product::where('id', $id)->first();

        $category = DB::table('products')->where('id', $id)->first()->category_id;

        $releted_product = Product::where('category_id', $category)
        ->where('product_start_date', '<', $newdate1)
        ->where('product_end_date', '>', $newdate1)
        ->whereNotIn('id', [$id])
	    ->whereRaw('find_in_set("'.$class.'",country_id)')->limit(8)->get();


        $special_deal = Product::where('special_deals', 1)
        ->where('product_start_date', '<=', $newdate1)
       ->where('product_end_date', '>=', $newdate1)
	   ->whereRaw('find_in_set("'.$class.'",country_id)')->limit(8)->get();

       //  dd($category);

        return view('frontend.pages.detail')->with('data',$data)->with('product_detail',$product_detail)->with('releted_product',$releted_product)->with('special_deal',$special_deal);
    }


//order code

public function invoiceNumber()
{
    $orders = order::all();

    if($orders->isEmpty())
    {
        $invoice = 'ORDW0001';
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
          
            $invoice = 'ORDW000'.$val3;
           
            return $invoice;
        }
    }
}


public function orderplace(Request $request){


    $invoice_number = self::invoiceNumber(); 
   //dd($request->delivery_type);
    $subtotal = 0;
    $data = session()->all(); 
    $allsesion= $data['userData']; 
    $email= $allsesion['email'];  
    $user_id= $allsesion['user_id']; 
   
    $carts = Cart::where('user_id', $user_id)->get();
    $cartTotal = 0;
    $cart_amount = Cart::where('user_id', $user_id)->get();
    foreach ($cart_amount as $key => $value) {
    $cartTotal += $value->total_point;
   
}


    $subtotal=$cartTotal;
    $totalorderval = $subtotal;

    $getval = "SELECT closing_bal  FROM `registers` WHERE email= '$email'";
    $getclosing_bal = DB::select($getval);
    $val = $getclosing_bal[0]->closing_bal;
    
    
    if($val > 0 && $totalorderval <= $val)
    {
        
        $country = register::where('email', $email)->get();
        
        $country_name = $country[0]->country_name;
        $agency_group = $country[0]->agency_group;
        
        $office_address = country::where('country_name_en', $country_name)->value('address_en');

        $agency_address = Agencygroup::where('agency_name', $agency_group)->value('address');

        if ($request->delivery_type == 'agency_address') {

            order::create([

                'invoice_no' => $invoice_number,
                'points' => $subtotal,
                'email' => $email,
                'delivery_type' => $request->delivery_type,
                'address' => $agency_address,
                'date' => carbon::now()->format('d-m-Y'),
            
            ]);
            
        } else if($request->delivery_type == 'office_address') {

            order::create([

                'invoice_no' => $invoice_number, 
                'points' => $subtotal,
                'email' => $email,
                'delivery_type' => $request->delivery_type,
                'address' => $office_address,
                'date' => carbon::now()->format('d-m-Y'),
            
            ]);
            
        }else{

            request()->session()->flash('success','Please select address type');
            return back();

        }

   // $array = $request->all();
//dd($carts);
foreach($carts as $cart)
{

    product_history::create(['product_id'      => $cart->product_id,
        
        'invoice_no' => $invoice_number,
        'product_qty'   => $cart->quantity,
        'points'   => $cart->point,
        'email'   => $email,
        'subtotal'   => $cart->total_point,
        'status' => 1,
        'created_at' => Carbon::now(),

                       
    ]);
    
   // $point = $row["points"];
   // $email = $row["email"];
   // $quentity = $row["product_qty"];
   // $product_name = $row["product_id"];
    
    
}

    $getval = "SELECT closing_bal, guserid  FROM `registers` WHERE email= '$email'";
    $getclosing_bal = DB::select($getval);
    $val = $getclosing_bal[0]->closing_bal;
    $guserid = $getclosing_bal[0]->guserid;
    $balance = $val - $totalorderval;


    DB::table('registers')
    ->where('email', $email)
    ->update(array('closing_bal' => $balance));


// for transaction histroy
$date = carbon::now();
$trans_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');

DB::table('transaction_histories')->insert([
    'guserid' => $guserid, 
    'order_points' => $totalorderval,
    'transaction_date' => $trans_date,
    'closing_balance' => $balance,
    'created_at' => Carbon::now()
  ]);





        // \Mail::send('order_mail', array(
    
        
        // $message = 'product_name' => $input['product_name'],
        // $message = 'quentity' => $input['quentity'],
        // $message = 'point' => $input['point'],


     // ),
     // function($message) use ($input){
            // $message->from('system.engineer@gmail.com','Galrewards');
            // $message->to($input['email'], 'user')->subject('Galrewards Order Place');
        // });

Cart::where('user_id', $user_id)->delete();

$notification = array(
    'message' => 'Order Placed Successfully',
    'alert-type' => 'error'
);

return redirect()->to('thankyou')->with($notification);



    }
    
else{
    
    request()->session()->flash('success','You cannot place order as you have insufficient point balance');
    return back();

    
}

 
    
}

public function thankyou() {

    return view('frontend.pages.thankyou');

}


public function ticketNumber()
{
    $ticket = ticket::all();

    if($ticket->isEmpty())
    {
        $ticket = 'TICK0001';
        return $ticket;
    }

    foreach($ticket as $ticket)
    {
        $latest = ticket::latest()->first();

        if($latest->id == true)
        {
            $val1=1;
            $val2= $latest->id;
            $val3=$val1 + $val2;
          
            $ticket = 'TICK000'.$val3;


            return $ticket;
        }
    }
}




    public function ticket() {

    $data = session()->all(); 

	if(isset($data['userData'])){
        $allsesion= $data['userData'];
        $user_id= $allsesion['user_id'];   
        $userdata = register::where('id',$user_id)->first();
        $country_name= $allsesion['country_name']; 
		$class = $country_name;

        $ticketlist = ticket::where('user_id', $user_id)->orderBy('created_at', 'desc')->limit(5)->get();
        
        $todatdate= Carbon::now();
        
        $newdate1= date('Y-m-d', strtotime(Carbon::now()));
        $special_deal = Product::where('special_deals', 1)
        ->where('product_start_date', '<=', $newdate1)
       ->where('product_end_date', '>=', $newdate1)
	   ->whereRaw('find_in_set("'.$class.'",country_id)')->limit(8)->get();

        
        return view('frontend.pages.ticket',compact('special_deal','userdata','ticketlist','data'));
		 }
		return redirect("flogin")->withSuccess('You must login before raise new ticket','Access is not permitted');
		 
    }
	
	 public function ticket_store(Request $request){
		 
		 
		  $ticket_number = self::ticketNumber(); 
		 
		 $user_id= $request->user_id;

             ticket::insert([

            'user_id' => $user_id,
			'ticket_number' => $ticket_number,
            'need_assistance' => $request->need_assistance,
            'comment' => $request->comment,
            'ticket_date' => Carbon::now(),
            'created_at' => Carbon::now(),
    
        ]);
		
	
		
		\Mail::send('ticket_mail', array(
        
        'need_assistance' => $request->get('need_assistance'),
        'comment' => $request->get('comment'),
  
       
    ), function($message) use ($request){
		
	$data = session()->all(); 
    $allsesion= $data['userData']; 
    $email= $allsesion['email'];
        
        $message->from('system.engineer@gmail.com','Galrewards');
        $message->to($email)->subject('Galrewards Ticket ');
		
 });
	
        request()->session()->flash('success','Ticket raise successfully');
        
        return redirect("ticket_status")->withSuccess('Ticket raise successfully');   
        //return back();
    
      
    }
	

    public function aboutUs(){
        $data = session()->all(); 
        $title="About us";
        $keywords="About us , galrewards, travelport";
        $description="galrewards is a ticketing  reward";
        return view('frontend.pages.about-us', compact('title','keywords','description','data'));
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function account_details(){
        $data = session()->all(); 
        $allsesion= $data['userData'];
        $user_id= $allsesion['user_id'];   
        $userdata = register::where('id',$user_id)->first();
        $special_deal = Product::where('special_deals', 1)->limit(8)->get();

    return view('frontend.pages.account_details',compact('special_deal','userdata','data'));
   
}

    public function orders(){

        $data = session()->all(); 
        $allsesion= $data['userData'];
        $email= $allsesion['email'];  

        $orderlist = order::where('email', $email)->latest()->get();

        $special_deal = Product::where('special_deals', 1)->limit(8)->get();  
        return view('frontend.pages.orders', compact('orderlist','special_deal','data'));
    }

    public function order_detail(Request $request, $invoice_no){
        $data = session()->all(); 	
      $invoice_no=$request->invoice_no;	
        $orderdetail = DB::table('product_histories')
            ->leftjoin('registers', 'product_histories.email', '=', 'registers.email')
			->leftjoin('products', 'product_histories.product_id', '=', 'products.id')
            ->select('product_histories.*','registers.closing_bal', 'products.product_name_en')
            ->where('product_histories.invoice_no', $invoice_no)
            ->latest()->get();
       
        $special_deal = Product::where('special_deals', 1)->limit(8)->get();  
        return view('frontend.pages.order_detail', compact('orderdetail','special_deal','invoice_no','data'));


    }
	
	//for pdf
	
	public function generateorderPDF(Request $request)
    {
        $data = [
            'title' => 'Order',
			 'date' => date('m/d/Y')
            
        ];
		
	 $invoice_no=$request->invoice_no;	
	 
	 $dataval = order::select('points','email','date')
    ->where('invoice_no','=', $invoice_no)
    ->first();

     $points = $dataval->points;
	 $email = $dataval->email;
	 $invoicedate = $dataval->date;
	 $narration = $dataval->narration;
	 
	 
		
	 $orderdetail = DB::table('product_histories')
            ->leftjoin('registers', 'product_histories.email', '=', 'registers.email')
			->leftjoin('products', 'product_histories.product_id', '=', 'products.id')
            ->select('product_histories.*','registers.closing_bal', 'products.product_name_en','registers.first_name','registers.last_name','registers.pcc')
            ->where('product_histories.invoice_no', $invoice_no)
            ->latest()->get();
          
    
        $pdf = PDF::loadView('frontend.pages.myorderPDF', compact('orderdetail','data','invoice_no','points','email','invoicedate','narration'));
        return $pdf->download('orderinvoice.pdf');
    }

	
	

    public function change_password(){
        return view('frontend.pages.contact');
    }

    public function ticket_status(){
        
        $data = session()->all(); 
        $allsesion= $data['userData'];
        $user_id= $allsesion['user_id'];  

        $ticketlist = ticket::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $special_deal = Product::where('special_deals', 1)->limit(8)->get();
        
     
        return view('frontend.pages.ticket_status', compact('ticketlist','special_deal','data'));
    }

    public function ticket_detail($id){
        $data = session()->all(); 
     $ticket = DB::table('tickets')
        ->join('registers', 'tickets.user_id', '=', 'registers.id')
        ->where('tickets.id' , $id)
        ->select('tickets.*','registers.email','registers.contact','registers.sign_on','registers.pcc')
		->get();
		
	
		 $ticketview = DB::table('ticket_statuses')
        ->where('ticket_statuses.ticket_id' , $id)
        ->where('ticket_statuses.status' , 2)
		->select('ticket_statuses.*')->latest()->first();
		
		
		

        $special_deal = Product::where('special_deals', 1)->limit(8)->get();
        
     
        return view('frontend.pages.ticket_detail', compact('ticket','ticketview','special_deal','data'));


    }
    


    public function privacy_policy(){
        $data = session()->all(); 
        return view('frontend.pages.privacy_policy', compact('data'));
    }

    public function terms_conditions(){
        $data = session()->all(); 
        return view('frontend.pages.terms_conditions', compact('data'));
    }
    
    public function return_policy(){
        $data = session()->all(); 
        return view('frontend.pages.return_policy', compact('data'));
    }
	
//--------------------------------------------Login-------------------------------------------------------------//

 public function fristchange_password(Request $request){
    $data = session()->all(); 
        return view('frontend.pages.change-password', compact('data'));
    }

 
 public function update_password(Request $request){
	 
	 $email= $request->email;
	 $password= $request->password;
	$insertedid = DB::table('registers')
                 ->where('email', $email)
                 ->update(array('password' => $password,'password_change_at' => 'yes')); 
	 
        return redirect()->route('flogin')->with('success','Password Change Successfully.');
   

   }




  public function user_login(Request $request){
	  
    //$register = register::orwhere('end_date', '>=', Carbon::now())
	$register = register::where('email',$request->email)->where('password',$request->password)->first();

  if($register== null){
        request()->session()->flash('success', 'Explicit indication that something has gone wrong.');
		return redirect()->back();   
    }
	
	$password_change_at = $register->password_change_at;
	$end_date = $register->end_date;
	
	$newdate1= Carbon::now();
	$todaydate= date('Y-m-d', strtotime($newdate1));
	//dd($todaydate);
	
	if ($password_change_at == null) {
        
     $email= $request->email;

	return view('frontend.pages.change-password', compact('email'));	
	//return redirect(route('fristchange_password'));
	
	}
	
	if ($end_date != null) {
	if($end_date <= $todaydate){
        request()->session()->flash('success', 'You are not authorized to access.');
		return redirect()->back();   
    }
   }


    if (isset($register)) {

       
        Session::put('userdata', $register['first_name']);
        Session::put('userData', ['user_id' => $register->id,'country_name' => $register->country_name,'guserid' => $register->guserid, 'first_name' => $register->first_name, 'email' => $register->email,'closing_bal' => $register->closing_bal]);  
        
        request()->session()->flash('success', 'Welcome to galrewards');
		return redirect()->route('frontend');
      
    } else {
        
         request()->session()->flash('success', 'You are not authorized');
		return redirect()->back();
    }
  }
  
  
   
  
  


/*   public function user_login(Request $request)
  {
      $request->validate([
          'email' => 'required',
          'password' => 'required',
      ]);
      $credentials = $request->only('email', 'password');
      if (Auth::attempt($credentials)) {
          return redirect()->intended('home')
                      ->withSuccess('Logged-in');
      }
  
      return redirect("login")->with('success','Credentials are wrong.');
     // return redirect("login")->withSuccess('Credentials are wrong.');
  } */



  
   public function user_logout(Request $request){
        //Auth::logout();
        session()->forget('userdata');
        session()->forget('userData');
        //dd("fdg");
        //$request->session()->flush();
        return redirect()->route('flogin');
    }

//---------------------------------------------------------------------------------------------------------------//


public function addtocart(Request $request, $id){
    if (Session::has('coupon')) {
        Session::forget('coupon');
    }

    $data = session()->all(); 
    $allsesion= $data['userData'];
    $user_id= $allsesion['user_id'];  
    $userdata = register::where('id',$user_id)->value('closing_bal');

    $product = product::findOrFail($id);

    $total = $request->quantity * $product->points;
    $cart_total = 0;
    $cartTotal = Cart::where('user_id', $user_id)->get();
    foreach ($cartTotal as $key => $value) {
       $cart_total += $value->total_point;
    }

    $amount = $cart_total + $total;

    if ($amount > $userdata) {

        return response()->json(['error'=>' Insuficent Point']);

    } else {

        Cart::insert([
            'product_id' => $id, 
            'user_id' => $user_id,
            'product_name' => $request->product_name,
            'product_thambnail' => $product->product_thambnail,
            'point' => $product->points,
            'status' => 1,
            'quantity' => $request->quantity,
            'total_point' => $total,
                ]);
                return response()->json(['success'=>' Successfully add in cart']);
    }

}

public function addminicart(){

    $data = session()->all(); 
    $allsesion= $data['userData'];
    $user_id= $allsesion['user_id']; 
    $total = 0;
    $cartTotal = Cart::where('user_id', $user_id)->get();
    foreach ($cartTotal as $key => $value) {
       $total += $value->total_point;
       //dd($total);
    }
    
    $cartqty = Cart::where('user_id', $user_id)->count('id');

    return response()->json(array(

        'cartqty' => $cartqty,
        'cartTotal' => round($total),
    ));
}

public function getcartproduct(){

    $data = session()->all(); 
    $allsesion= $data['userData'];
    $user_id= $allsesion['user_id']; 

    $total = 0;
    $carts = Cart::where('user_id', $user_id)->get();
    $cartQty = Cart::where('user_id', $user_id)->count('id');
    $cartTotal = Cart::where('user_id', $user_id)->get();
    foreach ($cartTotal as $key => $value) {
       $total += $value->total_point;
    }

    return response()->json(array(
        'carts' => $carts,
        'cartQty' => $cartQty,
        'cartTotal' => round($total),

    ));

}

public function removecart($id){
 
    Cart::find($id)->delete();

    return response()->json(['success' => 'Successfully Remove From Cart']);
}

public function cartincrement($id){

    $row = cart::where('id',$id)->get();
    $qty = $row[0]->quantity + 1;
    $total_point = $row[0]->total_point;

    $update_point = $total_point + $row[0]->point;
 
    $subtotal = $row[0]->point;
    $data = session()->all(); 
    $allsesion= $data['userData'];
    $user_id= $allsesion['user_id']; 
    $total = 0;
    $cartTotal = Cart::where('user_id', $user_id)->get();
    foreach ($cartTotal as $key => $value) {
       $total += $value->total_point;
       
    }
    $grand_total = $total + $subtotal;
    //dd($grand_total);

    $user = cart::where('id',$id)->value('user_id');
    $closing_bal = register::where('id',$user)->value('closing_bal');
    if ($grand_total > $closing_bal) {
        return response()->json(['success' => 'Insuficient Point']);
    } else {
        $row = cart::findorfail($id)->update([
            'quantity' => $qty,
            'total_point' => $update_point,
        ]);

        return response()->json('increment');
    }

}


public function cartdecrement($id){

    $row = cart::where('id',$id)->get();
    $qty = $row[0]->quantity - 1;
 
    $total = $row[0]->point * $qty;

    $row = cart::findorfail($id)->update([
        'quantity' => $qty,
        'total_point' => $total,
    ]);

    return response()->json('increment');

}

public function getaccountsummary(Request $request)
{
 $title="Account Summary";
 $data = session()->all();
    $from_date =$request->from_date;
	//dd($from_date);
    $to_date=$request->to_date;

    $data = session()->all(); 
    $allsesion= $data['userData']; 
    $email= $allsesion['email']; 

    $newdate1= date('Y-m-d', strtotime($from_date));
    $newdate2= date('Y-m-d', strtotime($to_date));

    $dataval = register::select('closing_bal','guserid')
    ->where('email','=', $email)
    ->first();

     $closingbal = $dataval->closing_bal;
	 $guserid = $dataval->guserid;

    //SELECT * FROM `bonus_points` WHERE (created_at BETWEEN '2022-11-15 00:00:00' AND '2022-10-15 00:00:00');
    //2022-11-15 00:00:00
  if(isset($from_date)){

    $getalldetail = DB::table('transaction_histories')
    ->select('transaction_histories.*')
    ->where('transaction_date','>=', $newdate1)
    ->where('transaction_date','<=', $newdate2)
    ->where('guserid','=', $guserid)
    ->get();
    
    
    //$pointsummary = DB::select("SELECT  * FROM points WHERE created_at >= '$newdate1' and created_at <= '$newdate2' and guserid = '$guserid' ");  

	//$bonuspointssummary = DB::select("SELECT  * FROM bonus_points WHERE created_at >= '$newdate1' and created_at <= '$newdate2' and guserid = '$guserid' "); 

    //$pointusedsummary = DB::select("SELECT  * FROM orders WHERE date >= '$from_date' and date <= '$to_date' and email = '$email' ");
	

  return view('frontend.pages.getaccountsummary', compact('getalldetail','from_date','to_date','title','closingbal','data'));

  }else{

    $accountsummary[]="";
    return view('frontend.pages.accountsummary',compact('accountsummary','title','data'));

  }

    

}


public function accountsummary(Request $request)
{
    $title="Account Summary";
    $data = session()->all();
    return view('frontend.pages.accountsummary', compact('title','data'));

}


 public function generatePDF(Request $request)
    {
        $data = [
            'title' => 'Account Summary',
			 'date' => date('m/d/Y')
            
        ];
		
	$from_date =$request->from_date;
    $to_date=$request->to_date;
    $data = session()->all(); 
    $allsesion= $data['userData']; 
    $email= $allsesion['email']; 

    $newdate1= date('Y-m-d', strtotime($from_date));
    $newdate2= date('Y-m-d', strtotime($to_date));


   $dataval =      register::select('closing_bal','guserid')
    ->where('email','=', $email)
    ->first();

     $closingbal = $dataval->closing_bal;
     $username = $dataval->first_name;	 
	$guserid = $dataval->guserid;	
    
    $getalldetail = DB::table('transaction_histories')
    ->select('transaction_histories.*')
    ->where('transaction_date','>=', $newdate1)
    ->where('transaction_date','<=', $newdate2)
    ->where('guserid','=', $guserid)
    ->get();

		
	// $pointsummary = DB::select("SELECT  * FROM points WHERE created_at >= '$newdate1' and created_at <= '$newdate2' and guserid = '$guserid' ");  
    //$bonuspointssummary = DB::select("SELECT  * FROM bonus_points WHERE created_at >= '$newdate1' and created_at <= '$newdate2' and guserid = '$guserid' "); 
    
    //$pointusedsummary = DB::select("SELECT  * FROM orders WHERE created_at >= '$newdate1' and created_at <= '$newdate2' and email = '$email' ");
     //$pointusedsummary = DB::select("SELECT  * FROM orders WHERE date >= '$from_date' and date <= '$to_date' and email = '$email' ");     
        //$pdf = PDF::loadView('frontend.pages.accountsummary', $data);
         $pdf = PDF::loadView('frontend.pages.myPDF', compact('getalldetail','from_date','to_date','closingbal','data','email','username'));
        return $pdf->download('accountsummary.pdf');
    }



   

  



public function SearchProduct(Request $request){

    $request->validate(["search" => "required"]);
    $data = session()->all(); 
    $allsesion= $data['userData'];
    $user_id= $allsesion['user_id'];   
    $userdata = register::where('id',$user_id)->first();
    $country_name= $allsesion['country_name']; 
    $class = $country_name;

    $item = $request->search;
    
    $products=Product::where('product_start_date', '<=', Carbon::now())
    ->where('product_end_date', '>=', Carbon::now())
    ->whereRaw('find_in_set("'.$class.'",country_id)')
    ->where('product_name_en','like','%'.$request->search.'%')
   // ->orwhere('product_description_en','like','%'.$request->search.'%')
   // ->orwhere('points','like','%'.$request->search.'%')
    //->orwhere('category_id','like','%'.$request->search.'%')
   
    ->orderBy('id','DESC')
    //->get();
    ->limit(8)->get();
    return view('frontend.pages.search_product',compact('products'));



}


 
    


    
}
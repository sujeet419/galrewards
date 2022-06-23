<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }


    public function view_ad_profile(){
        $id = Auth::user()->id;
        $user = user::find($id);
        return view('admin.admin_profile',compact('user'));
    }

    // public function user_profile_update(Request $req){
    //     $data =  user::find(Auth::user()->id);
    //     $data->name = $req->name;
    //     $data->email = $req->email;
    //     $data->save();

    //     $notification = array(
    //         'message' => 'user profile updated successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('dashboard')->with($notification);
    // }

    public function user_password_store(Request $req){

        $validatedata = $req->validate([

            'oldpassword' => 'required',
            'password' => 'required|confirmed'

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($req->oldpassword,$hashedPassword)) {
           $user = user::find(Auth::id());
           $user->password =  Hash::make($req->password);
           $user->save();
           

           $notification = array(
               'message' => 'Password Change successfully',
               'alert-type' => 'success'
           );

           Auth::logout();
           return redirect()->route('logout')->with($notification);
        }else{
            return redirect()->back();
        }
    }
   
    public function add_admin_view(){
        $admin = user::latest()->get();
        return view('admin.add_admin', compact('admin'));
    }


    public function admin_register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required'
        ]);

        $admin = user::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        \Mail::send('add_admin_email', array(
        
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
           
        ), function($message) use ($request){
            //$message->$request->get('first_name');
            //$message->from($request->first_name);
            $message->from('system.engineer@gmail.com','Galrewards');
            $message->to( $request->email, $request->name)->subject('Galrewards Registration ');
        });


        $notification = array(
            'message' => 'Admin Add Successfully',
            'alert-type' => 'Success'
        );

        return redirect()->back()->with($notification);
    }
	
	
	public function admin_edit($id){
    $picbrand = user::find($id);
        if($picbrand){
        return response()->json([
            'picbrand' => $picbrand,
        ]);
    }
        else{
            return response()->json([
                'error' => 'brandid not found',
            ]); 
        
    }

}

	public function admin_update(Request $req){
		$user_id =  $req->id;
		
		
		 DB::table('users')
                 ->where('id', $user_id)
                 ->update(array('end_date' => $req->end_date));

			$notification = array(
				'message' => 'Admin end date updated successfully',
				'alert-type' => 'success'
			);
			
			return redirect()->back()->with($notification);
	   
	 }
    
}

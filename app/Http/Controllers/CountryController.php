<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use carbon\carbon;
use Auth;

class CountryController extends Controller
{
//country view //

public function country_view(){
    $con = country::latest()->get();
    return view('country', compact('con'));

}

//category store //
public function place_store(Request $req){
    $req->validate([
        'country_name_en' => 'required',
        'country_name_fr' => 'required'
    ]);
	
	$users = country::where('country_name_fr', '=', $req->input('country_name_fr'))->orwhere('country_name_en', '=', $req->input('country_name_en'))->first();
	
	if ($users === null) {

    country::insert([

        'country_name_en' => $req->country_name_en,
        'country_name_fr' => $req->country_name_fr,
        'address_en' => $req->address_en,
        'address_fr' => $req->address_fr,
        'contact_no' => $req->contact_no,
        'email_address' => $req->email_address,
        'country_status' => 1,
        'created_at' => carbon::now(),
        
    ]);

    $notification = array(
        'message' => 'Country Successfully Added',
        'alert-type' => 'success'
    );

        
        return redirect()->route('view_country')->with($notification);
		
	}else{
		
	$notification = array(
        'message' => 'Country already added',
        'alert-type' => 'error'
    );

        
        return redirect()->route('view_country')->with($notification);	
		
	}

}
// category edit with ajax
public function con_edit($id){
    $picbrand = country::find($id);
        if($picbrand){
        return response()->json([
            'picbrand' => $picbrand,
        ]);
    }
        else{
            return response()->json([
                'error' => 'country id not found',
            ]); 
        
    }

}

//category update
public function country_update(Request $req){
    $category_id =  $req->id;

    country::findOrFail($category_id)->update([

        'country_name_en' => $req->country_name_en,
        'country_name_fr' => $req->country_name_fr,
        'address_en' => $req->address_en,
        'address_fr' => $req->address_fr,
        'contact_no' => $req->contact_no,
        'email_address' => $req->email_address,

    ]);
        $notification = array(
            'message' => 'Country Updated Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
   
 }

// category delete 

 public function con_delete($id){

    country::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Country Deleted Successfully',
        'alert-type' => 'info'
    );
     return redirect()->back()->with($notification);

}
// categories active 

public function con_active($id){

    country::findOrFail($id)->update(['country_status' => 1]);

    $notification = array(
        'message' => 'Country Successfully Active',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

// categories inactive

    public function con_inactive($id){

        country::findOrFail($id)->update(['country_status' => 0]);

        $notification = array(
            'message' => 'Country Successfully Inactive',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);


        }
}

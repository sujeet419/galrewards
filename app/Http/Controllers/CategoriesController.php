<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\country;
use carbon\carbon;
use Auth;
use Image;

class CategoriesController extends Controller
{

//Api //

public function apiview(Request $request, $id=null, $headers = 201){

    //$cat = $request->id;
    //$fr = 'fr';
    //if ($cat == $fr) {
        $caten = category::orderBy('categories_name_fr' ,'ASC')->get();
        $value =  $caten->categories_name_fr;
                    //'id' => $caten->id,
                //];
        return response()->json([$caten, $headers]);
   // } else  {
       // $catfr = category::orderBy('categories_name_en','ASC')->get();
        //return response()->json([$catfr, $headers]);
   //s }
    
    //$category = category::where(['cat_lang' => $cat])->get(); 
   //return response()->json([$category, $headers]);
}

//category view //

    public function view(){
        $cat = category::latest()->get();
        $country = country::where('country_status','1')->groupBy('country_name_en')->get();
        return view('category', compact('cat','country'));
    
}
//category store //
public function categorystore(Request $req){
    $req->validate([
        'categories_name_en' => 'required',
        'categories_name_fr' => 'required',
        'image' => 'required'
    ]);
	
    $input = $req->all();
    $country = $input['country_id'];
    $input['country_id'] = implode(',', $country);

	$users = category::where('categories_name_en', '=', $req->input('categories_name_en'))->orwhere('categories_name_fr', '=', $req->input('categories_name_fr'))->first();
	
	if ($users === null) {

        $image = $req->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('public/upload/category/'.$name_gen);
        $save_url = 'public/upload/category/'.$name_gen;

    category::insert([

        'categories_name_en' => $req->categories_name_en,
        'categories_name_fr' => $req->categories_name_fr,
        'country_id' => $input['country_id'],
        'image' => $save_url,
        'categories_status' => 1,
        'created_at' => carbon::now(),
        
    ]);

    $notification = array(
        'message' => 'Category Successfully Added',
        'alert-type' => 'success'
    );

        
        return redirect()->back()->with($notification);
		
	}else{
		
	
    $notification = array(
        'message' => 'Category already added',
        'alert-type' => 'error'
    );

        
        return redirect()->back()->with($notification);	
		
	}

}
// category edit with ajax
public function cat_edit($id){
    $picbrand = category::find($id);
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

//category update
public function category_update(Request $req){
    $category_id =  $req->id;
    $old_image = $req->old_image;

    $input = $req->all();
    $country = $input['country_id'];
    $input['country_id'] = implode(',', $country);

    if ($req->file('image')) {
        
        //unlink($old_image);
        $image = $req->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600,550)->save('public/upload/category/'.$name_gen);
        $save_url = 'public/upload/category/'.$name_gen;

        category::findOrFail($category_id)->update([

            'categories_name_en' => $req->categories_name_en,
            'categories_name_fr' => $req->categories_name_fr,
            'country_id' => $input['country_id'],
            'image' => $save_url,
    
        ]);
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
            
        }else{

            category::findOrFail($category_id)->update([

                'categories_name_en' => $req->categories_name_en,
                'categories_name_fr' => $req->categories_name_fr,
        
            ]);
                $notification = array(
                    'message' => 'Category Updated Successfully',
                    'alert-type' => 'success'
                );
                
                return redirect()->back()->with($notification);

        }


   
 }

// categories active 

public function cat_active($id){

    category::findOrFail($id)->update(['categories_status' => 1]);

    $notification = array(
        'message' => 'Category Successfully Active',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

// categories inactive

    public function cat_inactive($id){

        category::findOrFail($id)->update(['categories_status' => 0]);

        $notification = array(
            'message' => 'Category Successfully Inactive',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);


        }
}

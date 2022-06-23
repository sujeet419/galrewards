<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\country;
use carbon\carbon;
use Auth;
use Illuminate\Support\Facades\DB;

class SubcategoriesController extends Controller
{
//category view //

public function subcatview(){
    $categories = category::orderBy('categories_name_en','ASC')->get();
    $subcat = subcategory::latest()->get();
    $country = country::where('country_status','1')->groupBy('country_name_en')->get();
    return view('subcategory', compact('categories','subcat','country'));

}
//category store //
public function subcategorystore(Request $req){
$req->validate([
    'category_id' => 'required',
    'subcategories_name_en' => 'required',
    'subcategories_name_fr' => 'required'
]);

	$users = subcategory::where('subcategories_name_en', '=', $req->input('subcategories_name_en'))->orwhere('subcategories_name_fr', '=', $req->input('subcategories_name_fr'))->first();
	
    $input = $req->all();
    $country = $input['country_id'];
    $input['country_id'] = implode(',', $country);
    
    if ($users === null) {

subcategory::insert([

    'category_id' => $req->category_id,
    'subcategories_name_en' => $req->subcategories_name_en,
    'subcategories_name_fr' => $req->subcategories_name_fr,
    'country_id' => $input['country_id'],
    'subcategories_status' => 1,
    'created_at' => carbon::now(),
    
]);

$notification = array(
    'message' => 'subCategory Successfully Added',
    'alert-type' => 'success'
);

    
    return redirect()->back()->with($notification);
	
	}else{
		
	$notification = array(
    'message' => 'subCategory already exist',
    'alert-type' => 'error'
	);

    
    return redirect()->back()->with($notification);	
		
	}

}
// category edit with ajax
public function subcat_edit($id){
    //$category = DB::table('categories')
    //->select('categories.categories_name_en')
    //->get();
$category =  category::OrderBy('categories_name_en')->get();

$subcat = subcategory::find($id);
    if($subcat){
    return response()->json([
        'category' => $category,
        'subcat' => $subcat,
    ]);
}
    else{
        return response()->json([
            'error' => 'Sub Category id not found',
        ]); 
    
}

}

//category update
public function subcategory_update(Request $req){
$subcategory_id =  $req->id;

$input = $req->all();
    $country = $input['country_id'];
    $input['country_id'] = implode(',', $country);

subcategory::findOrFail($subcategory_id)->update([

    'subcategories_name_en' => $req->subcategories_name_en,
    'subcategories_name_fr' => $req->subcategories_name_fr,
    'country_id' => $input['country_id'],

]);
    $notification = array(
        'message' => 'SubCategory Updated Successfully',
        'alert-type' => 'success'
    );
    
    return redirect()->back()->with($notification);

}

// categories active 

public function subcat_active($id){

    subcategory::findOrFail($id)->update(['subcategories_status' => 1]);

$notification = array(
    'message' => 'Category Successfully Active',
    'alert-type' => 'success'
);

return redirect()->back()->with($notification);

}

// categories inactive

public function subcat_inactive($id){

    subcategory::findOrFail($id)->update(['subcategories_status' => 0]);

    $notification = array(
        'message' => 'Category Successfully Inactive',
        'alert-type' => 'warning'
    );

    return redirect()->back()->with($notification);


    }
}

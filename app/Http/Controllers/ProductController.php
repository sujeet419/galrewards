<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\subcategory;
use App\Models\country;
use App\Models\multi_image;
use carbon\carbon;
use DB;
use Image;

class ProductController extends Controller
{
// product View //
    public function pr_view(){
        $category = category::where('categories_status', 1)->orderBy('categories_name_en', 'ASC')->get();
        $Subcategory = subcategory::orderBy('subcategories_name_en', 'ASC')->get();
        $country = country::where('country_status', 1)->orderBy('country_name_en', 'ASC')->get();
        $product = product::latest()->get();
        return view('product', compact('product','category','Subcategory','country'));
    }

//product store //
public function productstore(Request $request){
	
	$input = $request->all();
    $country = $input['country_id'];
    $input['country_id'] = implode(',', $country);

$start_dat= Carbon::now();
	
$product_start_date = Carbon::createFromFormat('Y-m-d H:i:s', $start_dat)->format('Y-m-d');

    $request->validate([
      'product_thambnail' => 'required|mimes:jpg,png,jpeg',
      'category_id' => 'required',
      'subcategory_id' => 'required',
      'product_name_en' => 'required',
      'product_name_fr' => 'required',
      'points' => 'required',
    ]);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600,550)->save('public/upload/products/thambnail/'.$name_gen);
        $save_url = 'public/upload/products/thambnail/'.$name_gen;

      $product_id = product::insertGetId([
          'category_id' => $request->category_id,
          'subcategory_id' => $request->subcategory_id,
          'country_id' => $input['country_id'],
          'product_name_en' => $request->product_name_en,
          'product_name_fr' => $request->product_name_fr,
          'points' => $request->points,
          'product_start_date' => $product_start_date,
          'product_thambnail' => $save_url,
          'special_deals' => $request->special_deals,
          'product_active' => 1,
          'created_at' => Carbon::now(),   

      ]);

        // Multi Image Upload 

        $images = $request->file('image_name');
        foreach ($images as $img) {
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(600,550)->save('public/upload/products/multi-image/'.$make_name);
            $uploadPath = 'public/upload/products/multi-image/'.$make_name;

            multi_image::insert([

                'product_id' => $product_id,
                'image_name' => $uploadPath,
                'created_at' => Carbon::now(), 

            ]);

            }


       $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function productview($id){
        $pr_view = product::find($id);
		$Selectedcountry = explode(',', $pr_view->country_id);
        return view('product_view', compact('pr_view','Selectedcountry'));

    }

// product edit 

public function product_edit($id){

    $categories = category::latest()->get();
   $country = country::where('country_status','1')->groupBy('country_name_en')->get();
   

	 //$country = country::select("*", DB::raw("count(*) as user_count"))
                     
                        //->groupBy('country_name_en')->get();
						
						
	$multi_image = multi_image::where('product_id',$id)->get();
    $subcategory = subcategory::latest()->get();
    $product = product::findOrFail($id);
	$Selectedcountry = explode(',', $product->country_id);

    return view('product_edit',compact('categories','country','subcategory','product','Selectedcountry','multi_image'));

}


//product update 

public function product_update(Request $request){
	
	$input = $request->all();
    $country = $input['country_id'];
    $input['country_id'] = implode(',', $country);

    $request->validate([
      'product_thambnail' => 'mimes:jpeg,png,jpg',
    ]);

    // if ($files = $request->file('file')) {
    //   $destinationPath = 'upload/pdf'; // upload path
    //   $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
    //   $files->move($destinationPath,$digitalItem);
    // }
    $product_id = $request->id;
    $old_image = $request->old_img;



    if ($request->file('product_thambnail')) {
        
        unlink($old_image);
        $image = $request->file('product_thambnail');
        $img_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600,550)->save('public/upload/products/thambnail/'.$img_gen);
        $save_url = 'public/upload/products/thambnail/'.$img_gen;

        Product::findOrFail($product_id)->update([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'country_id' => $input['country_id'],
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'points' => $request->points,
            //'product_start_date' => $request->product_start_date,
            'product_end_date' => $request->product_end_date,
            'product_thambnail' => $save_url,
            'special_deals' => $request->special_deals,
            'product_active' => 1,
        ]);
            $notification = array(
                'message' => 'Product updated Successfully with image',
                'alert-type' => 'success'
            );
            
            return redirect()->route('view_product')->with($notification);
            
        }else{

            Product::findOrFail($product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'country_id' => $input['country_id'],
                'product_name_en' => $request->product_name_en,
                'product_name_fr' => $request->product_name_fr,
                'points' => $request->points,
                'special_deals' => $request->special_deals,
                //'product_start_date' => $request->product_start_date,
                'product_end_date' => $request->product_end_date,
                'product_active' => 1,
                
            ]);
                $notification = array(
                    'message' => 'Product updated Successfully',
                    'alert-type' => 'success'
                );
                
                return redirect()->route('view_product')->with($notification);

        }

    }

    // delete multi image on edit

public function delete_multi($id){
	  
    $images = multi_image::where('id',$id)->get();
    foreach ($images as $img) {
      //unlink($img->image_name);
     multi_image::where('id',$id)->delete();
    }  
    
//  multi_image::findOrFail($id)->delete();

$notification = array(
    'message' => 'Image Delete Successfully',
    'alert-type' => 'success'
);

return redirect()->back()->with($notification); 
   
        
}


public function update_multitimage(Request $request){

    $product_id = $request->product_id;
   $images = $request->multi_imag;

   foreach ($images as $id => $img) {
       $imgdelete = multi_image::findOrFail($id);
       //unlink($imgdelete->image_name);
       $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
       Image::make($img)->resize(600,550)->save('public/upload/products/multi-image/'.$make_name);
       $uploadPath = 'public/upload/products/multi-image/'.$make_name;

     /* multi_image::where('id', $id)->update([
           'image_name' => $uploadPath,
           'updated_at' => carbon::now(),

       ]); */
       
         multi_image::insert([

       'product_id' => $product_id,
       'image_name' => $uploadPath,
       'created_at' => Carbon::now(), 

   ]);
       
       
   }
   $notification = array(
       'message' => 'Product Image Update Successfully',
       'alert-type' => 'info'
   );

   return redirect()->back()->with($notification);


}

//get subcategory with ajax /////////////////////

public function getsubcategory($category_id){
    $subcat = subcategory::where('category_id',$category_id)->orderBy('subcategories_name_en','ASC')->get();

    return json_encode($subcat);

}
/// 





// product active 

public function product_active($id){

    product::findOrFail($id)->update(['product_active' => 1]);

    $notification = array(
        'message' => 'product Successfully Active',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

// categories inactive

    public function product_inactive($id){

        product::findOrFail($id)->update(['product_active' => 0]);

        $notification = array(
            'message' => 'product Successfully Inactive',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);


        }
}

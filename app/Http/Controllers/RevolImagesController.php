<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\revol_image;
use carbon\carbon;
use Image;

class RevolImagesController extends Controller
{
// view revolving image //
    public function rview(){
        $rimage = revol_image::latest()->get();
        return view('revol_image', compact('rimage'));
    }

// store revolving image //

public function store_rimage(Request $request){
    $request->validate([
        'image' => 'required|mimes:jpeg,png,jpg',
        'title_en' => 'required',
        'title_fr' => 'required',
        'description_en' => 'required',
        'description_fr' => 'required',
      ]);

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(780,200)->save('public/upload/revolving_image/'.$name_gen);
    $save_url = 'public/upload/revolving_image/'.$name_gen;

    revol_image::insertGetId([
      'title_en' => $request->title_en,
      'title_fr' => $request->title_fr,
      'description_en' => $request->description_en,
      'description_fr' => $request->description_fr,
      'image' => $save_url,
      'revol_image_status' => 1,
      'created_at' => Carbon::now(),   

  ]);


   $notification = array(
        'message' => 'Revolving Image Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}

//edit rimage with ajax 

public function edit_rimage($id){

    $rimage = revol_image::find($id);
    if($rimage){
    return response()->json([
        'rimage' => $rimage,
    ]);
}
    else{
        return response()->json([
            'error' => 'brandid not found',
        ]); 
    
}

}

//update rimage 

public function update_rev_image(Request $request){
	
	$request->validate([
        'image' => 'mimes:jpeg,png,jpg',
	]);

    $id = $request->id;
    $old_image = $request->rimage_id;
	
    
    if ($request->file('image')) {
            
        unlink($old_image);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,200)->save('public/upload/revolving_image/'.$name_gen);
        $save_url = 'public/upload/revolving_image/'.$name_gen;
    
        revol_image::findOrFail($id)->update([

            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'description_en' => $request->description_en,
            'description_fr' => $request->description_fr,
            'image' => $save_url,
            'revol_image_status' => 1,
        ]);
            $notification = array(
                'message' => 'Slider updated Successfully',
                'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
            
        }else{

            revol_image::findOrFail($id)->update([

                'title_en' => $request->title_en,
                'title_fr' => $request->title_fr,
                'description_en' => $request->description_en,
                'description_fr' => $request->description_fr,
                'revol_image_status' => 1,
            ]);
                $notification = array(
                    'message' => 'Slider updated Successfully Without Image',
                    'alert-type' => 'success'
                );
                
                return redirect()->back()->with($notification);

        }
    
    }


    // R_image active 

public function rimage_active($id){

    revol_image::findOrFail($id)->update(['revol_image_status' => 1]);

    $notification = array(
        'message' => 'Revolving Image Successfully Active',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

// R_image inactive

    public function rimage_inactive($id){

        revol_image::findOrFail($id)->update(['revol_image_status' => 0]);

        $notification = array(
            'message' => 'Revolving Image Successfully Inactive',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);


        }
}

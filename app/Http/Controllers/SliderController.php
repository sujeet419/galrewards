<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use carbon\carbon;
use Image;

class SliderController extends Controller
{
// view Slider //
public function viewslider(){
    $slider = slider::latest()->get();
    return view('slider', compact('slider'));
}
public function addslider(Request $request){

    $request->validate([
      'image' => 'required|mimes:jpeg,png,jpg',
    ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1490,400)->save('public/upload/slider/'.$name_gen);
        $save_url = 'public/upload/slider/'.$name_gen;

      $product_id = slider::insertGetId([
          'image' => $save_url,
          'slider_status' => 1,
          'created_at' => Carbon::now(),

      ]);


       $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
//edit slider

public function edit_slider($id){

    $slider = slider::find($id);
    if($slider){
    return response()->json([
        'slider' => $slider,
    ]);
}
    else{
        return response()->json([
            'error' => 'brandid not found',
        ]); 
    
}
}

// update slider

public function update_slider(Request $request){
	
	$request->validate([
      'image' => 'mimes:jpeg,png,jpg',
    ]);

$id = $request->id;
$old_image = $request->image_id;

if ($request->file('image')) {
        
    unlink($old_image);
    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(1490,400)->save('public/upload/slider/'.$name_gen);
    $save_url = 'public/upload/slider/'.$name_gen;

    slider::findOrFail($id)->update([

        'image' => $save_url,
        'slider_status' => 1,
    ]);
        $notification = array(
            'message' => 'Slider updated Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
        
    }

}

// Slider active 

public function slider_active($id){

    slider::findOrFail($id)->update(['slider_status' => 1]);

    $notification = array(
        'message' => 'Slider Successfully Active',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

// Slider inactive

    public function slider_inactive($id){

        slider::findOrFail($id)->update(['slider_status' => 0]);

        $notification = array(
            'message' => 'Slider Successfully Inactive',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);


        }
}

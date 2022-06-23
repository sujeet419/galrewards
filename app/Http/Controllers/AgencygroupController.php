<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agencygroup;
use App\Models\country;
use Session;

class AgencygroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        if(Auth::check()){
			
            $agencygroup = Agencygroup::latest()->get();
		    
            return view('agencygroup.index', compact('agencygroup'));
    
            }
            return redirect("login")->withSuccess('Access is not permitted');
    }
	
	


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = country::where('country_status', 1)->orderBy('country_name_en', 'ASC')->get();   
		return view('agencygroup.create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'agency_name' => 'required',
        ]);

        Agencygroup::insert([

            'agency_name' => $request->agency_name,
            'country' => $request->country,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
			'address' => $request->address,
            'status' => 1,
            
        ]);


     return redirect()->route('agencygroup')->with('success','Agencygroup Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agencygroup = Agencygroup::findOrFail($id);
		
        return view('agencygroup.show', compact('agencygroup'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agencygroup = Agencygroup::findOrFail($id);
        $country = country::where('country_status', 1)->orderBy('country_name_en', 'ASC')->get();   
        return view('agencygroup.edit', compact('agencygroup','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Agencygroup::findOrFail($id)->update([

            'agency_name' => $request->agency_name,
            'country' => $request->country,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
			'address' => $request->address,
           
             
        ]);
        //
        return redirect()->route('agencygroup')->with('success','Agencygroup Edit Successfully ');
    }


 ////////////Agencygroup active /////////////////

 public function status_active($id){

    Agencygroup::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Agencygroup Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////Agencygroup inactive /////////////////

    public function status_inactive($id){

        Agencygroup::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Agencygroup Inactive Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);


        }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
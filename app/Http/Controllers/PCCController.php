<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PCC;
use App\Models\country;
use App\Models\Agencygroup;
use Session;


class PCCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
			
            $pcc = PCC::latest()->get();
		$country = country::where('country_status', 1)->orderBy('country_name_en', 'ASC')->get(); 
            return view('pcc.index', compact('pcc','country'));
    
            }
            return redirect("login")->withSuccess('Access is not permitted');
    }
	
	
	public function getpcc($agency_name){
    $subcat = PCC::where('agency_name',$agency_name)->orderBy('agency_name','ASC')->get();

    return json_encode($subcat);

}

public function getagencygroup($country){
    $agencygroup = Agencygroup::where('country',$country)->orderBy('id','ASC')->get();

    return json_encode($agencygroup);

}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $country = country::where('country_status', 1)->orderBy('country_name_en', 'ASC')->get(); 
       $agencygroup = Agencygroup::where('status', 1)->orderBy('id', 'ASC')->get();   
		return view('pcc.create', compact('country','agencygroup'));
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
            'pcc_number' => 'required',
            'agency_name' => 'required',
        ]);

        PCC::insert([

            'pcc_number' => $request->pcc_number,
            'agency_name' => $request->agency_name,
            'country' => $request->country,
            'status' => 1,
            
        ]);


     return redirect()->route('pcc')->with('success','PCC Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pcc = PCC::findOrFail($id);
		
        return view('pcc.show', compact('pcc'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pcc = PCC::findOrFail($id);
		$country = country::where('country_status', 1)->orderBy('country_name_en', 'ASC')->get(); 
        $agencygroup = Agencygroup::where('status', 1)->orderBy('id', 'ASC')->get();   
        return view('pcc.edit', compact('pcc','country','agencygroup'));
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
        PCC::findOrFail($id)->update([

            'pcc_number' => $request->pcc_number,
            'agency_name' => $request->agency_name,
            'country' => $request->country,
           
             
        ]);
        //
        return redirect()->route('pcc')->with('success','PCC Edit Successfully ');
    }


 ////////////PCC active /////////////////

 public function status_active($id){

    PCC::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'PCC Active Successfully',
        'alert-type' => 'success'
    );

return redirect()->back()->with($notification);

    }

////////////PCC inactive /////////////////

    public function status_inactive($id){

        PCC::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'PCC Inactive Successfully',
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
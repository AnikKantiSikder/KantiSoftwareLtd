<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Mission;

class MissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //View missions-----------------------------------------------------------------------
    public function view(){

    	$data['countMission']= Mission::count();

    	$data['allData']= Mission::all();

    	return view('Backend.Mission.view_mission', $data);
    }

    //Add missions-------------------------------------------------------------------------
    public function add(){
    	return view('Backend.Mission.add_mission');
    }

    //Store missions
    public function store(Request $request){

    	$data= new Mission();

    	$data->title= $request->title;
        $data->created_by= Auth::user()->id;

    	if($request->file('image')){
    		$file= $request->file('image');
    		$filename= date('YmdHi').$file->getClientOriginalName();
    		$file-> move(public_path('Upload/Mission_images'), $filename);
    		$data['image']= $filename;
    	}

    	// return response()->json($data);
    	$data->save();

    	return redirect()->route('missions.view')->with('success','Data added successfully');

    }

    //Edit mission----------------------------------------------------------------------------
    public function edit($id){

       $editMissionData= Mission:: find($id);
       
       return view('Backend.Mission.edit_mission', compact('editMissionData'));
    }


    //Update mission--------------------------------------------------------------------------
    public function update(Request $request, $id){

    	$data= Mission:: find($id);

    	$data->updated_by= Auth::user()->id;
        $data->title= $request->title;

    	if($request->file('image')){
    		$file= $request->file('image');
    		@unlink(public_path('Upload/Mission_images/'.$data->image));
    		$filename= date('YmdHi').$file->getClientOriginalName();
    		$file-> move(public_path('Upload/Mission_images'), $filename);
    		$data['image']= $filename;
    	}
       
    	$data->save();

    	return redirect()->route('missions.view')->with('success', 'Data updated successfully');
    }

    //Delete mission-------------------------------------------------------------------------------
    public function delete($id){

    	$mission= Mission:: find($id);

    		if(file_exists('public/Upload/Mission_images/'. $mission->image) AND ! empty($mission->image) ){

    			unlink('public/Upload/Mission_images/'.$mission->image);
    		}

    	$mission->delete(); 

    	return redirect()->route('missions.view')->with('success', 'Slider deleted successfully');
    }
}

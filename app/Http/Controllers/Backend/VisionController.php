<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Vision;

class VisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //View vision-----------------------------------------------------------------------
    public function view(){

    	$data['countVision']= Vision::count();

    	$data['allData']= Vision::all();

    	return view('Backend.Vision.view_vision', $data);
    }

    //Add visions-------------------------------------------------------------------------
    public function add(){
    	return view('Backend.Vision.add_vision');
    }

    //Store visions
    public function store(Request $request){

    	$data= new Vision();

    	$data->title= $request->title;
        $data->created_by= Auth::user()->id;

    	if($request->file('image')){
    		$file= $request->file('image');
    		$filename= date('YmdHi').$file->getClientOriginalName();
    		$file-> move(public_path('Upload/Vision_images'), $filename);
    		$data['image']= $filename;
    	}

    	// return response()->json($data);
    	$data->save();

    	return redirect()->route('visions.view')->with('success','Data added successfully');

    }

    //Edit Vision----------------------------------------------------------------------------
    public function edit($id){

       $editVisionData= Vision:: find($id);
       
       return view('Backend.Vision.edit_vision', compact('editVisionData'));
    }


    //Update vision--------------------------------------------------------------------------
    public function update(Request $request, $id){

    	$data= Vision:: find($id);

    	$data->updated_by= Auth::user()->id;
        $data->title= $request->title;

    	if($request->file('image')){
    		$file= $request->file('image');
    		@unlink(public_path('Upload/Vision_images/'.$data->image));
    		$filename= date('YmdHi').$file->getClientOriginalName();
    		$file-> move(public_path('Upload/Vision_images'), $filename);
    		$data['image']= $filename;
    	}
       
    	$data->save();

    	return redirect()->route('visions.view')->with('success', 'Data updated successfully');
    }

    //Delete vision-------------------------------------------------------------------------------
    public function delete($id){

    	$vision= Vision:: find($id);

    		if(file_exists('public/Upload/Vision_images/'. $vision->image) AND ! empty($vision->image) ){

    			unlink('public/Upload/Vision_images/'.$vision->image);
    		}

    	$vision->delete(); 

    	return redirect()->route('visions.view')->with('success', 'Slider deleted successfully');
    }
}

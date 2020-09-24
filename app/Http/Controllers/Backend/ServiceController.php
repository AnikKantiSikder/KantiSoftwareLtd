<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Service;

class ServiceController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

    //View service-----------------------------------------------------------------------
    public function view(){

    	$data['allData']= Service::all();

    	return view('Backend.Service.view_service', $data);
    }

    //Add service-------------------------------------------------------------------------
    public function add(){
    	return view('Backend.Service.add_service');
    }

    //Store service
    public function store(Request $request){

    	$data= new Service();

        $data->short_title= $request->short_title;
    	$data->long_title= $request->long_title;
        $data->created_by= Auth::user()->id;

    	// return response()->json($data);
    	$data->save();

    	return redirect()->route('service.view')->with('success','Data added successfully');

    }

    //Edit service----------------------------------------------------------------------------
    public function edit($id){

       $editServiceData= Service:: find($id);
       
       return view('Backend.Service.edit_service', compact('editServiceData'));
    }


    //Update service--------------------------------------------------------------------------
    public function update(Request $request, $id){

    	$data= Service:: find($id);


        $data->short_title= $request->short_title;
    	$data->long_title= $request->long_title;
    	$data->updated_by= Auth::user()->id;

       
    	$data->save();

    	return redirect()->route('service.view')->with('success', 'Data updated successfully');
    }

    //Delete service-------------------------------------------------------------------------------
    public function delete($id){

    	$newsEvent= Service:: find($id);

    	$newsEvent->delete(); 

    	return redirect()->route('service.view')->with('success', 'Slider deleted successfully');
    }
}

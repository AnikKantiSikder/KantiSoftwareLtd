<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\NewsEvent;

class NewsEventController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

    //View news and event-----------------------------------------------------------------------
    public function view(){

    	$data['allData']= NewsEvent::all();

    	return view('Backend.NewsEvent.view_news_event', $data);
    }

    //Add news and event-------------------------------------------------------------------------
    public function add(){
    	return view('Backend.NewsEvent.add_news_event');
    }

    //Store news and event
    public function store(Request $request){

    	$data= new NewsEvent();

        $data->date= date('Y-m-d', strtotime($request->date));
        $data->short_title= $request->short_title;
    	$data->long_title= $request->long_title;
        $data->created_by= Auth::user()->id;

    	if($request->file('image')){
    		$file= $request->file('image');
    		$filename= date('YmdHi').$file->getClientOriginalName();
    		$file-> move(public_path('Upload/NewsEvent_images'), $filename);
    		$data['image']= $filename;
    	}

    	// return response()->json($data);
    	$data->save();

    	return redirect()->route('news_events.view')->with('success','Data added successfully');

    }

    //Edit news and event----------------------------------------------------------------------------
    public function edit($id){

       $editNewsEventData= NewsEvent:: find($id);
       
       return view('Backend.NewsEvent.edit_news_event', compact('editNewsEventData'));
    }


    //Update news and event--------------------------------------------------------------------------
    public function update(Request $request, $id){

    	$data= NewsEvent:: find($id);


        $data->date= date('Y-m-d', strtotime($request->date));
        $data->short_title= $request->short_title;
    	$data->long_title= $request->long_title;
    	$data->updated_by= Auth::user()->id;

    	if($request->file('image')){
    		$file= $request->file('image');
    		@unlink(public_path('Upload/NewsEvent_images/'.$data->image));
    		$filename= date('YmdHi').$file->getClientOriginalName();
    		$file-> move(public_path('Upload/NewsEvent_images'), $filename);
    		$data['image']= $filename;
    	}
       
    	$data->save();

    	return redirect()->route('news_events.view')->with('success', 'Data updated successfully');
    }

    //Delete news and event-------------------------------------------------------------------------------
    public function delete($id){

    	$newsEvent= NewsEvent:: find($id);

    		if(file_exists('public/Upload/NewsEvent_images/'. $newsEvent->image) AND ! empty($newsEvent->image)){

    			unlink('public/Upload/NewsEvent_images/'.$newsEvent->image);
    		}

    	$newsEvent->delete(); 

    	return redirect()->route('news_events.view')->with('success', 'Slider deleted successfully');
    }
}

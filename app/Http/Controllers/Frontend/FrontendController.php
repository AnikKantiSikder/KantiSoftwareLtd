<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

	public function index(){
		
		return view('Frontend.Layouts.home');
	}

	//About us
	public function aboutUs(){
	
		return view('Frontend.SinglePages.about_us');
	}

	//Contact us
	public function contactUs(){
		
		return view('Frontend.SinglePages.contact_us');
	}
}

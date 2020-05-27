<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{	
		$name = "Home Page";
		return view('home',compact('name'));
	}

	public function phpPage()
	{
			$data = array(
		    	"lesson1" => "This PHP is Lesson1",
	    		"lesson2" => "This PHP is Lesson2",
	    		"lesson3" => "This PHP is Lesson3"
    	);
			return view('php',compact('data'));
	}

	public function jsPage()
	{
		$data = array(
				"lesson1" => "This JS is Lesson1",
	    		"lesson2" => "This JS is Lesson2",
	    		"lesson3" => "This JS is Lesson3"
    	);
			return view('js',compact('data'));

	}


    
}

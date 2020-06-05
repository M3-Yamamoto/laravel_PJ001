<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class PublicController extends Controller
{
    public function index()
    {	
    	$recipes = Recipe::paginate(9);
    	return view('publicviews.public_welcome',compact('recipes'));
    }

    public function detail($id)
    {
    	$recipe = Recipe::find($id);
    	return view('publicviews.detail',compact('recipe'));
    }
}

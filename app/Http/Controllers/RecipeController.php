<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
    	$data = Recipe::all();

    	return view('home',compact('data'));
    }
}

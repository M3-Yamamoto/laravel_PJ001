<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Category;
use App\test;
use App\User;
use App\Mail\RecipeStored;
use App\Events\RecipeCreatedEvent;
use App\Notifications\RecipeStoredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RecipeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $user = User::find(3);
        // $user->notify(new RecipeStoredNotification());
        // echo "sent notification";
        // exit();

        $data = Recipe::paginate(5);
        // where('author_id', auth()->id())->get()

        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
          $validatedData =  request()->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'category' => 'required',
            'rimage' => 'required|image',
          
        ]);
        
        $imageName = date('YmdHis') . "." . request()->rimage->getClientOriginalExtension();
        request()->rimage->move(public_path('images'), $imageName);

        $recipe = Recipe::create($validatedData + ['author_id' => auth()->id(),'image'=>$imageName]);

        // $recipe = Recipe::create($validatedData + ['author_id' => auth()->id()]);

        return redirect("recipe");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {   
        $this->authorize('view',$recipe);
        return view('show',compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {   
        $this->authorize('view',$recipe);
        $category = Category::all();
        return view('edit',compact('recipe','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Recipe $recipe)
    { 
        $this->authorize('view',$recipe);
          
        $validatedData = request()->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'category' => 'required',
            'rimage' => 'image',
    ]);

  $recipe->update($validatedData);
    if (request()->rimage) {
      //upload image
      $imageName = date('YmdHis') . "." . request()->rimage->getClientOriginalExtension();
      request()->rimage->move(public_path('images'), $imageName);
    }
    $recipe->update($validatedData + ['image'=> empty($imageName) ? null : $imageName]);

      return redirect("recipe");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {   
        $this->authorize('view',$recipe);
        $recipe->delete();
        return redirect("recipe");

    }
}

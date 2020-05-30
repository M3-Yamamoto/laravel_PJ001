<?php

namespace App;

use App\Mail\RecipeStored;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name','ingredients','category','author_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }

    protected static function boot()
    {
    	parent::boot();

    	static::created(function ($recipe){

        session()->flash("message",'Recipe has created successfully!');

        \Mail::to('maxmk978@gmail.com')->send(new RecipeStored ($recipe));

    	});
    }
}

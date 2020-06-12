<?php

namespace App;

use App\Mail\RecipeStored;
use App\Category;
use App\Events\RecipeCreatedEvent;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = ['name','ingredients','category','author_id','image'];


    public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }

    public $dispatchesEvents = [

        'created' => RecipeCreatedEvent::class, 
    ];

    protected static function boot()
    {
    	parent::boot();

    	static::created(function ($recipe){

        session()->flash("message",'Recipe has created successfully!');

    	});
    }
}

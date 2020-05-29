<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name','ingredients','category','author_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }
}

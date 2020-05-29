<?php

namespace App;

use App\Recipe;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
}

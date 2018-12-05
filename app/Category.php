<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slideshow;

class Category extends Model
{
    public function slideshow()
    {
        return $this -> belongsToMany(Slideshow::class);
    }
}

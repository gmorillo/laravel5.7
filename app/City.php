<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slideshow;

class City extends Model
{
    public function slideshow()
    {
        return $this -> belongsToMany(Slideshow::class);
    }
}

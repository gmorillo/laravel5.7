<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slideshow;

class Country extends Model
{
    public function slideshow()
    {
        return $this -> belongsToMany(Slideshow::class);
    }
}

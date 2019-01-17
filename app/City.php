<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slideshow;
use App\Country;

class City extends Model
{
    public function slideshow()
    {
        return $this -> belongsToMany(Slideshow::class);
    }

    public function country()
    {
        return $this -> belongsToMany(Country::class);
    }
}

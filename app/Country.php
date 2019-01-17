<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slideshow;
use App\City;

class Country extends Model
{
    public function slideshow()
    {
        return $this -> belongsToMany(Slideshow::class);
    }

    public function city()
    {
        return $this -> belongsToMany(City::class);
    }
}

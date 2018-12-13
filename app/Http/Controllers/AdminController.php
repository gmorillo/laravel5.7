<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;
use App\City;
use App\Country;
use App\Category;

class AdminController extends Controller
{

    public function getNewPublishData()
    {
        $city = City::get();
        $country = Country::get();
        $category = Category::get();
        $slideshow = Slideshow::where('status', 0)->get();
        
        return view('sections.profile.administracion.nuevas-publicaciones.main-nuevas-publicaciones',compact('city','country', 'category', 'slideshow'));
    }
}

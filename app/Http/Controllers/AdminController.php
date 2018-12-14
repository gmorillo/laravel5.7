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
        $inactive_slideshow = Slideshow::where('status', 0)->orderBy('id', 'desc')->paginate(10);
        $active_slideshow = Slideshow::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        $inactive_count_slideshow = Slideshow::where('status', 0)->count();
        $active_count_slideshow = Slideshow::where('status', 1)->count();

        return view('sections.profile.administracion.main-administracion',compact('city','country', 'category', 'inactive_slideshow', 'inactive_count_slideshow', 'active_slideshow', 'active_count_slideshow'));
    }
}

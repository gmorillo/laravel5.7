<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;
use App\Photo;
use App\City;
use App\Country;
use App\Category;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function getNewPublishData()
    {
        $city = City::get();
        $country = Country::get();
        $category = Category::get();
        $inactive_slideshow = Slideshow::where('status', 0)->where('publicity_type', 1)->orderBy('id', 'desc')->paginate(10);
        $inactive_publicities = Slideshow::where('status', 0)->orderBy('id', 'desc')->paginate(10);
        $new_premium_slideshow = Slideshow::where('status', 0)->where('publicity_type', 2)->orderBy('id', 'desc')->paginate(10);
        $active_slideshow = Slideshow::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        $inactive_count_slideshow = Slideshow::where('status', 0)->where('publicity_type', 1)->count();
        $inactive_count_publicities = Slideshow::where('status', 0)->count();
        $inactive_premium_count_slideshow = Slideshow::where('status', 0)->where('publicity_type', 2)->count();
        $active_count_slideshow = Slideshow::where('status', 1)->count();

        $new_basic_publicity = Slideshow::where('status', 0)->where('publicity_type', 3)->orderBy('id', 'desc')->paginate(10);
        $inactive_basic_count_slideshow = Slideshow::where('status', 0)->where('publicity_type', 3)->count();

        return view('sections.profile.administracion.main-administracion',compact('city','country', 'category', 'inactive_slideshow', 'new_premium_slideshow', 'inactive_count_slideshow', 'active_slideshow', 'inactive_premium_count_slideshow', 'active_count_slideshow', 'inactive_publicities', 'inactive_count_publicities', 'new_basic_publicity', 'inactive_basic_count_slideshow'));
    }

    public function getRotadorData($id)
    {
    	$city = City::get();
        $country = Country::get();
        $category = Category::get();
        $active_slideshow = Slideshow::where('id', $id)->orderBy('id', 'desc')->paginate(10);
        $photos_slideshow = Photo::where('slideshow_id', $id)->get();
        $list_per_user_slider = Slideshow::where('user_id', Auth::getUser()->id)->paginate(15);
    	return view('sections.profile.administracion.editar-anuncios.editar-rotador-principal',compact('city','country', 'category', 'active_slideshow', 'photos_slideshow', 'list_per_user_slider'));
    }
}

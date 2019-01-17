<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;
use App\Photo;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sections.home.main-home');
    }

    public function getSliders()
    {
        
        $sliders = Slideshow::where('status', 1)->where('publicity_type', 1)->select('principal_img', 'id', 'created_at')->take(5)->orderBy('id', 'desc')->get();
        $premium = Slideshow::where('status', 1)->where('publicity_type', 2)->select('principal_img', 'id', 'created_at')->take(18)->orderBy('id', 'desc')->get();
        $basic = Slideshow::where('status', 1)->where('publicity_type', 3)->select('principal_img', 'id', 'created_at')->orderBy('id', 'desc')->paginate(50);
        $photo = Photo::get();
        return view('sections.home.main-home',compact('sliders', 'premium', 'basic', 'photo'));
    }

    public function getAnuncioPorCategoria($id){
        $sliders = Slideshow::where('category_id', $id)->where('status', 1)->select('principal_img', 'id')->orderBy('id', 'desc')->paginate(50);
        $photo = Photo::get();
        return view('sections.listado-por-categoria.main-listado-por-categoria',compact('sliders', 'photo'));

    }

    public function getAnuncioPorCiudad($id){
        $sliders = Slideshow::where('city_id', $id)->where('status', 1)->select('principal_img', 'id')->orderBy('id', 'desc')->paginate(50);
        $photo = Photo::get();
        return view('sections.listado-por-ciudad.main-listado-por-ciudad',compact('sliders', 'photo'));

    }
}

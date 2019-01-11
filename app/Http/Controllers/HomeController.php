<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;
use App\Photo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $sliders = Slideshow::where('status', 1)->where('publicity_type', 1)->select('principal_img', 'id')->take(5)->orderBy('id', 'desc')->get();
        $premium = Slideshow::where('status', 1)->where('publicity_type', 2)->select('principal_img', 'id')->take(18)->orderBy('id', 'desc')->get();
        $basic = Slideshow::where('status', 1)->where('publicity_type', 3)->orderBy('id', 'desc')->paginate(35);
        $photo = Photo::get();
        return view('sections.home.main-home',compact('sliders', 'premium', 'basic', 'photo'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;

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
        $sliders = Slideshow::where('status', 0)->select('principal_img', 'id')->take(5)->orderBy('id', 'desc')->get();
        return view('sections.home.main-home',compact('sliders'));
    }
}

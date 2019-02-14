<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;
use App\Photo;
use App\User;
use App\City;
use App\Category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('America/Panama');
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
        
        $sliders = Slideshow::where('status', 1)
        ->where('publicity_type', 1)
        ->whereRaw('"'.date("Y-m-d H:i:s").'" between `publish_date` and `unpublish_date`')
        ->select('principal_img', 'id', 'created_at', 'schedule')
        ->take(5)->orderBy('id', 'desc')
        ->get();

        $sliders = !empty($sliders[0]) ? $this->filterSchudeleAds($sliders) : $sliders;

        $premium = Slideshow::where('status', 1)
        ->where('publicity_type', 2)
        ->whereRaw('"'.date("Y-m-d H:i:s").'" between `publish_date` and `unpublish_date`')
        ->select('principal_img', 'id', 'created_at', 'schedule')
        ->take(18)
        ->orderBy('id', 'desc')
        ->get();

        $premium = !empty($premium[0]) ? $this->filterSchudeleAds($premium) : $premium;

        $basic = Slideshow::where('status', 1)
        ->where('publicity_type', 3)
        ->whereRaw('"'.date("Y-m-d H:i:s").'" between `publish_date` and `unpublish_date`')
        ->orderBy('id', 'desc')
        ->paginate(50);

        $basic = !empty($basic[0]) ? $this->filterSchudeleAds($basic) : $basic;

        $photo = Photo::get();
        $category = Category::get();
        $city = City::get();
        return view('sections.home.main-home',compact('sliders', 'premium', 'basic', 'photo', 'city', 'category'));
    }

    public function getAnuncioPorCategoria($id){
        $sliders = Slideshow::where('category_id', $id)->where('status', 1)->select('principal_img', 'id', 'created_at', 'city_id', 'category_id')->orderBy('id', 'desc')->paginate(50);
        $photo = Photo::get();
        $category = Category::get();
        $city = City::get();
        return view('sections.listado-por-categoria.main-listado-por-categoria',compact('sliders', 'photo', 'category', 'city'));

    }

    public function getAnuncioPorCiudad($id){
        $sliders = Slideshow::where('city_id', $id)->where('status', 1)->whereRaw('"'.date("Y-m-d H:i:s").'" between `publish_date` and `unpublish_date`')->select('principal_img', 'id', 'created_at', 'city_id', 'category_id')->orderBy('id', 'desc')->paginate(50);
        $photo = Photo::get();
        $city = City::get();
         $category = Category::get();
        return view('sections.listado-por-ciudad.main-listado-por-ciudad',compact('sliders', 'photo', 'city','category'));

    }

    public function filterSchudeleAds ($ad)
    {
        //Recorro el Array de todos los Anuncios que tiene la BD
        foreach ($ad as $key => $value) {
            $id_ad = $ad[$key]->id;
            //Selecciono que franjas horaria tiene el anuncio para su publicacion
            $schedule = json_decode($ad[$key]->schedule);
            // Recorro cada una de las franja horarias y las comparo con la hora desde y hasta que corresponda, en caso de encontrar una coicidencia rompo el recorrido y paso al siguiente
            foreach ($schedule as $key2 => $value2) {
                $a = false;
                $desde = $this->scheduleFilter($value2)[0]->desde;
                $hasta = $this->scheduleFilter($value2)[0]->hasta;
                $hora = date('H:i:s');
                if ($hora >= $desde && $hora <= $hasta) {
                    $a = true;
                    break;
                }
            }
            // Elimino aquellos anuncios que no correspondan con la franja horaria en curso
            if ($a === false) {
                unset($ad[$key]);
            }
        }
        return $ad;
    }

    private function scheduleFilter ($id)
    {
        $profile = DB::table('schedule')
                ->select('schedule.*')
                ->where('id', '=', $id)
                ->get();

        return $profile;
    }
}

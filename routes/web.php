<?php
use App\Slideshow;
use App\Category;
use App\City;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Input;

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/', 'HomeController@getSliders')->name('sliderinfo');
Route::resource('/task', 'TaskController')->middleware('verified');


Route::prefix('profile')->group(
    function () {
        Route::get('/', 'UserController@profile_img')->middleware('verified');
        Route::post('/', 'UserController@updateProfileImg')->middleware('verified');
        Route::get('/', 'FormsController@getFormsInfo')->middleware('verified');
        Route::post('/create-slider', 'SliderController@create')->middleware('verified');
        Route::get('/anuncios-activos', 'SliderController@getListSliderActive')->middleware('verified');
        Route::get('/anuncios-caducados', 'SliderController@getListSliderInactive')->middleware('verified');
        Route::get('/editar-rotador-principal/{id}', 'SliderController@getRotadorData')->middleware('verified');
        Route::get('/rebuy/{id}', 'SliderController@volverAcomprar')->middleware('verified');
        Route::prefix('/administracion')->group(
            function () {
                Route::get('/', 'AdminController@getNewPublishData')->middleware('verified');
                Route::get('/editar-rotador-principal/{id}', 'AdminController@getRotadorData')->middleware('verified');
                Route::post('/edit-slider/{id}', 'SliderController@edit')->middleware('verified');
                Route::get('/activar-publicacion/{id}', 'SliderController@activarPublicacion')->middleware('verified');
                Route::get('/eliminar-publicidad/{id}', 'SliderController@delete')->middleware('verified');
            }
        );
    }
);

Route::prefix('detalle')->group(
    function () {
        Route::get('/anuncios/{id}', 'SliderController@detalleRotadorPrincipal');
    }
);



Route::any('/search', function () {
    $q = Input::get('q');
    $city_id = Input::get('city_id');
    $category_id = Input::get('category_id');

    $search = Slideshow::where('status', 1)
                        ->whereRaw('"'.date("Y-m-d H:i:s").'" between `publish_date` and `unpublish_date`');

    if (!empty($city_id)) {
        $search = $search->where('city_id', $city_id);
    }

    if (!empty($category_id)) {
        $search = $search->where('category_id', $category_id);
    }

    if (!empty($q)) {
        $search = $search->orWhere('description', 'LIKE', '%'.$q.'%')
                    ->orWhere('title', 'LIKE', '%'.$q.'%')
                    ->orWhere('categories.name', 'LIKE', '%'.$q.'%')
                    ->orWhere('cities.name', 'LIKE', '%'.$q.'%')
                    ->orWhere('langues', 'LIKE', '%'.$q.'%');
    }
   
    $search = $search->paginate(50);

    $filter = new HomeController();
    $searh = $filter->filterSchudeleAds($search);

    $city = City::get();
    $category = Category::get();

    if (count($search) > 0) {
        return view('sections.home.filterbar.resultado',compact('city', 'category'))->withDetails($search)->withQuery($q);
    } else {
        return view('sections.home.filterbar.resultado',compact('city', 'category'))->withDetails($search)->withQuery($q)->withMessage('No existe ningun elemento que coincida con tu búsqueda, porfavor realiza una nueva búsqueda!');
    }
});

/*Route::any('/search',function(){
    $city = City::get();
    $category = Category::get();
    $q = Input::get ( 'q' );
    $search = Slideshow::where('title','LIKE','%'.$q.'%')
                        ->where('status',1)
                        ->orWhere('description','LIKE','%'.$q.'%')
                        ->orWhere('langues','LIKE','%'.$q.'%')
                        ->paginate(50);
    if (count($search) > 0) {
        return view('sections.home.filterbar.resultado',compact('city', 'category'))->withDetails($search)->withQuery($q);
    } else {
        return view('sections.home.filterbar.resultado',compact('city', 'category'))->withDetails($search)->withQuery($q)->withMessage('No existe ningun elemento que coincida con tu búsqueda, porfavor realiza una nueva búsqueda!');
    }
});*/


Route::get('/listado-por-categoria/{id}', 'HomeController@getAnuncioPorCategoria')->name('anunciosPorCategoria');
Route::get('/listado-por-ciudad/{id}', 'HomeController@getAnuncioPorCiudad')->name('anunciosPorCiudad');
